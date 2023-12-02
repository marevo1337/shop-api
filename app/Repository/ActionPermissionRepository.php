<?php

namespace App\Repository;

use App\Models\ActionPermission;
use App\ShopApi\Security\Permission\Storage\ActionPermissionStorageInterface;
use Illuminate\Database\Eloquent\Collection;

class ActionPermissionRepository implements ActionPermissionStorageInterface
{
    /**
     * @param int $permissionId
     * @return Collection
     */
    public function getByPermissionId(int $permissionId): Collection
    {
        return ActionPermission::query()
            ->where('permission_id', '=', $permissionId)
            ->with('action')
            ->get();
    }
}
