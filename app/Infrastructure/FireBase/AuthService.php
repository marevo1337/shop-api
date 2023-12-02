<?php

namespace App\Infrastructure\FireBase;

use App\Infrastructure\FireBase\ValueObject\JwtData;
use App\Models\User;
use App\ShopApi\Security\Auth\Contract\CredentialsDataInterface;
use App\ShopApi\Security\Auth\Contract\JwtDataInterface;
use App\ShopApi\Security\Auth\Exception\AuthError;
use App\ShopApi\Security\Auth\Service\AuthServiceInterface;
use App\ShopApi\User\Storage\UserStorageInterface;
use DateTime;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

class AuthService implements AuthServiceInterface
{
    private string $key;
    private string $issuer;
    private int    $jwtTtl;

    public function __construct(
        private readonly UserStorageInterface $userStorage
    )
    {
        $this->key    = Config::get('fire-base.key');
        $this->issuer = Config::get('app.url');
        $this->jwtTtl = Config::get('fire-base.jwt_ttl');
    }

    public function login(CredentialsDataInterface $data): JwtDataInterface
    {
        $now = new DateTime();

        $payload = [
            'iss' => $this->issuer,
            'aud' => $this->issuer,
            'iat' => $now->getTimestamp(),
            'nbf' => $now->getTimestamp(),
            'id'  => $data->getId(),
        ];

        $jwt = JWT::encode($payload, $this->key, 'HS256');

        $expiredAt = $now->modify(sprintf('%s seconds', $this->jwtTtl));

        return new JwtData($jwt, $expiredAt->getTimestamp());
    }

    /**
     * @throws AuthError
     */
    public function getUser(): User
    {
        $jwt = Request::header('Authorization');
        if (is_null($jwt)) {
            throw new AuthError('Invalid token');
        }

        $payload = JWT::decode($jwt, new Key($this->key, 'HS256'));

        $tokenCreatedAt = DateTime::createFromFormat('U', $payload->iat);
        $tokenExpireAt  = $tokenCreatedAt->modify(sprintf('%s seconds', $this->jwtTtl));
        $now            = new DateTime();

        if ($now > $tokenExpireAt) {
            throw new AuthError('Token expired');
        }

        $user = $this->userStorage->getById($payload->id);
        if (is_null($user)) {
            throw new AuthError('Invalid token - user not found');
        }

        return $user;
    }

    /**
     * @throws AuthError
     */
    public function refresh(): JwtDataInterface
    {
        $jwt     = Request::header('Authorization');
        $payload = JWT::decode($jwt, new Key($this->key, 'HS256'));

        $user = $this->userStorage->getById($payload->id);
        if (is_null($user)) {
            throw new AuthError('Invalid token - user not found');
        }

        return $this->login($user);
    }
}
