<?php

namespace App\ShopApi\Security\Permission\Service;

use App\Models\ActionPermission;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Auth\Service\AuthServiceInterface;
use App\ShopApi\Security\Permission\Exception\AccessDenied;
use App\ShopApi\Security\Permission\Storage\ActionPermissionStorageInterface;

class PermissionChecker
{
    public function __construct(
        private readonly AuthServiceInterface             $authService,
        private readonly ActionPermissionStorageInterface $actionPermissionStorage
    ) {}

    /**
     * @throws RuntimeException
     */
    public function check(string $key): void
    {
        $user = $this->authService->getUser();

        /** @var ActionPermission[] $actions */
        $actions = $this->actionPermissionStorage->getByPermissionId($user->permission_id);

        $allowed = false;
        foreach ($actions as $action) {
            if ($action->action->key === $key) {
                $allowed = true;
                break;
            }
        }

        if (!$allowed) {
            throw new AccessDenied();
        }
    }
}
