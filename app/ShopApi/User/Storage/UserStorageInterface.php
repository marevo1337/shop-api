<?php

namespace App\ShopApi\User\Storage;

use App\Models\User;
use App\ShopApi\User\Contract\UserSearchDataInterface;

interface UserStorageInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?object;

    public function search(UserSearchDataInterface $data);
}
