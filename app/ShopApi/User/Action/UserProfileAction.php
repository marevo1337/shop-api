<?php

namespace App\ShopApi\User\Action;

use App\Models\User;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Auth\Service\AuthServiceInterface;

class UserProfileAction
{
    public function __construct(
        private readonly AuthServiceInterface $authService
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(): User
    {
        return $this->authService->getUser();
    }
}
