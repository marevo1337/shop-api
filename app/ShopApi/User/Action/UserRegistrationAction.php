<?php

namespace App\ShopApi\User\Action;

use App\Models\User;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Storage\PermissionStorageInterface;
use App\ShopApi\User\Contract\UserRegistrationDataInterface;
use App\ShopApi\User\Enum\UserStatusEnum;
use App\ShopApi\User\Storage\UserStorageInterface;
use Illuminate\Support\Facades\Hash;

class UserRegistrationAction
{
    public function __construct(
        private readonly UserStorageInterface       $userStorage,
        private readonly PermissionStorageInterface $permissionStorage
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(UserRegistrationDataInterface $data): void
    {
        $user = $this->userStorage->findByEmail($data->getEmail());
        if (!is_null($user)) {
            throw new RuntimeException(
                sprintf('Почта %s уже занята', $data->getEmail())
            );
        }

        $permission = $this->permissionStorage->getById($data->getPermissionId());
        if (is_null($permission)) {
            throw new RuntimeException('Доступ не найден');
        }

        $user                = new User();
        $user->first_name    = $data->getFirstName();
        $user->last_name     = $data->getLastName();
        $user->email         = $data->getEmail();
        $user->password      = Hash::make($data->getPassword());
        $user->avatar        = '/uploads/users/default.png';
        $user->status        = UserStatusEnum::NotActive->value;
        $user->permission_id = $permission->id;
        $user->save();
    }
}
