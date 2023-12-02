<?php

namespace App\ShopApi\Security\Auth\Contract;

interface JwtDataInterface
{
    public function getToken(): string;
    public function getExpiredAt(): int;
}
