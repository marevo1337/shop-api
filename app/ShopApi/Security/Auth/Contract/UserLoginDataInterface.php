<?php

namespace App\ShopApi\Security\Auth\Contract;

interface UserLoginDataInterface
{
    public function getEmail(): string;
    public function getPassword(): string;
}
