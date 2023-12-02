<?php

namespace App\Infrastructure\FireBase\ValueObject;

use App\ShopApi\Security\Auth\Contract\JwtDataInterface;

class JwtData implements JwtDataInterface
{
    public function __construct(
        private readonly string $token,
        private readonly int    $expiredAt
    ) {}

    public function getToken(): string
    {
        return $this->token;
    }

    public function getExpiredAt(): int
    {
        return $this->expiredAt;
    }
}
