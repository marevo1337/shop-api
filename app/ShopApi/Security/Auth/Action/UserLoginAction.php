<?php

namespace App\ShopApi\Security\Auth\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Auth\Contract\JwtDataInterface;
use App\ShopApi\Security\Auth\Contract\UserLoginDataInterface;
use App\ShopApi\Security\Auth\Service\AuthServiceInterface;
use App\ShopApi\User\Storage\UserStorageInterface;
use Illuminate\Support\Facades\Hash;

class UserLoginAction
{
    public function __construct(
        private readonly AuthServiceInterface $authService,
        private readonly UserStorageInterface $userStorage
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(UserLoginDataInterface $data): JwtDataInterface
    {
        $user = $this->userStorage->findByEmail($data->getEmail());
        if (is_null($user)) {
            throw new RuntimeException('Invalid email or password');
        }

        if (!Hash::check($data->getPassword(), $user->password)) {
            throw new RuntimeException('Invalid email or password');
        }

        return $this->authService->login($user);
    }
}
