<?php

namespace App\ShopApi\Security\Auth\Service;

use App\Models\User;
use App\ShopApi\Security\Auth\Contract\CredentialsDataInterface;
use App\ShopApi\Security\Auth\Contract\JwtDataInterface;
use App\ShopApi\Security\Auth\Exception\AuthError;

interface AuthServiceInterface
{
    public function login(CredentialsDataInterface $data): JwtDataInterface;
    /**
     * @throws AuthError
     */
    public function getUser(): User;
    /**
     * @throws AuthError
     */
    public function refresh(): JwtDataInterface;
}
