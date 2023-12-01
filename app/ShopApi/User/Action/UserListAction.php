<?php

namespace App\ShopApi\User\Action;

use App\Models\User;
use App\ShopApi\User\Contract\UserSearchDataInterface;
use App\ShopApi\User\Storage\UserStorageInterface;

class UserListAction
{
    public function __construct(
        private readonly UserStorageInterface $userStorage
    ) {}

    /**
     * @param UserSearchDataInterface $data
     * @return User[]
     */
    public function run(UserSearchDataInterface $data): array
    {
        /** @var User[] $users */
        $users = $this->userStorage->search($data);

        return $users;
    }
}
