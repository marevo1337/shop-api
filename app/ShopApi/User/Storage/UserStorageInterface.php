<?php

namespace App\ShopApi\User\Storage;

use App\Models\User;

interface UserStorageInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?object;
}
