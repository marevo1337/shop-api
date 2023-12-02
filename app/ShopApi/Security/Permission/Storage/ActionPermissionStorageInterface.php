<?php

namespace App\ShopApi\Security\Permission\Storage;

use Illuminate\Database\Eloquent\Collection;

interface ActionPermissionStorageInterface
{
    /**
     * @param int $permissionId
     * @return Collection
     */
    public function getByPermissionId(int $permissionId): Collection;
}
