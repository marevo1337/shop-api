<?php

namespace App\ShopApi\User\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Service\PermissionChecker;
use App\ShopApi\User\Contract\UserSearchDataInterface;
use App\ShopApi\User\Storage\UserStorageInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserListAction
{
    private const ACTION = 'UserList';

    public function __construct(
        private readonly PermissionChecker    $permissionChecker,
        private readonly UserStorageInterface $userStorage
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(UserSearchDataInterface $data): LengthAwarePaginator
    {
        $this->permissionChecker->check(self::ACTION);

        return $this->userStorage->search($data);
    }
}
