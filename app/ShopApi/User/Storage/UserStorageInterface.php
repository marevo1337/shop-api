<?php

namespace App\ShopApi\User\Storage;

use App\Models\User;
use App\ShopApi\User\Contract\UserSearchDataInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserStorageInterface
{
    /**
     * @param int $id
     * @return User|null
     */
    public function getById(int $id): ?object;

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?object;

    public function search(UserSearchDataInterface $data): LengthAwarePaginator;
}
