<?php

namespace App\ShopApi\Security\Auth\Action;

use App\ShopApi\Security\Auth\Contract\JwtDataInterface;
use App\ShopApi\Security\Auth\Exception\AuthError;
use App\ShopApi\Security\Auth\Service\AuthServiceInterface;

class UserRefreshAction
{
    public function __construct(
        private readonly AuthServiceInterface $authService
    ) {}

    /**
     * @throws AuthError
     */
    public function run(): JwtDataInterface
    {
        return $this->authService->refresh();
    }
}
