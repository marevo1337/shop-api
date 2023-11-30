<?php

namespace App\ShopApi\Security\Permission\Storage;

use App\Models\Permission;

interface PermissionStorageInterface
{
    /**
     * @param int $id
     * @return Permission|null
     */
    public function getById(int $id): ?object;
}
