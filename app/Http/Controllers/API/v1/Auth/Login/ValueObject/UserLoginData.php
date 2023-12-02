<?php

namespace App\Http\Controllers\API\v1\Auth\Login\ValueObject;

use App\ShopApi\Security\Auth\Contract\UserLoginDataInterface;

class UserLoginData implements UserLoginDataInterface
{
    public function __construct(
        private readonly string $email,
        private readonly string $password
    ) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
