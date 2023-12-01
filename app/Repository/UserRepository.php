<?php

namespace App\Repository;

use App\Models\User;
use App\ShopApi\User\Contract\UserSearchDataInterface;
use App\ShopApi\User\Storage\UserStorageInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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

    public function search(UserSearchDataInterface $data): LengthAwarePaginator
    {
        $queryBuilder = User::query();

        if ($data->getFirstName()) {
            $queryBuilder->where('first_name', 'like', '%' . $data->getFirstName() . '%');
        }

        if ($data->getLastName()) {
            $queryBuilder->where('last_name', 'like', '%' . $data->getLastName() . '%');
        }

        if ($data->getEmail()) {
            $queryBuilder->where('email', 'like', '%' . $data->getEmail() . '%');
        }

        if ($data->getStatuses()) {
            $queryBuilder->whereIn('status', $data->getStatuses());
        }

        if ($data->getPermissionIds()) {
            $queryBuilder->whereIn('permission_id', $data->getPermissionIds());
        }

        return $queryBuilder->paginate($data->getPageSize());
    }
}
