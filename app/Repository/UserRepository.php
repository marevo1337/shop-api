<?php

namespace App\Repository;

use App\Models\User;
use App\ShopApi\User\Storage\UserStorageInterface;

class UserRepository implements UserStorageInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?object
    {
        return User::query()
            ->where('email', '=', $email)
            ->first();
    }
}
