<?php

namespace App\ShopApi\Security\Permission\Storage;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

interface PermissionStorageInterface
{
    /**
     * @param int $id
     * @return Permission|null
     */
    public function getById(int $id): ?object;
    public function getAll(): Collection;
}
