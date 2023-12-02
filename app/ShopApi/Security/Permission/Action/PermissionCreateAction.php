<?php

namespace App\ShopApi\Security\Permission\Action;

use App\Models\Permission;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Contract\PermissionCreateDataInterface;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class PermissionCreateAction
{
    private const ACTION = 'PermissionCreate';

    public function __construct(
        private readonly PermissionChecker $permissionChecker
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(PermissionCreateDataInterface $data): void
    {
        $this->permissionChecker->check(self::ACTION);

        $permission              = new Permission();
        $permission->name        = $data->getName();
        $permission->description = $data->getDescription();
        $permission->save();
    }
}
