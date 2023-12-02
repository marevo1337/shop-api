<?php

namespace App\Repository;

use App\Models\Permission;
use App\ShopApi\Security\Permission\Storage\PermissionStorageInterface;
use Illuminate\Database\Eloquent\Collection;

class PermissionRepository implements PermissionStorageInterface
{
    /**
     * @param int $id
     * @return Permission|null
     */
    public function getById(int $id): ?object
    {
        return Permission::query()->find($id);
    }

    public function getAll(): Collection
    {
        return Permission::query()->get();
    }
}
