<?php

namespace App\ShopApi\Security\Permission\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Service\PermissionChecker;
use App\ShopApi\Security\Permission\Storage\PermissionStorageInterface;
use Illuminate\Database\Eloquent\Collection;

class PermissionListAction
{
    private const ACTION = 'PermissionList';

    public function __construct(
        private readonly PermissionStorageInterface $permissionStorage,
        private readonly PermissionChecker          $permissionChecker
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(): Collection
    {
        $this->permissionChecker->check(self::ACTION);

        return $this->permissionStorage->getAll();
    }
}
