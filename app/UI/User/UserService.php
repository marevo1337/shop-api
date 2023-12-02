<?php

namespace App\UI\User;

use App\ShopApi\User\Enum\UserStatusEnum;

class UserService
{
    public function getStatusLabel(string $status): string
    {
        return match ($status) {
            UserStatusEnum::NotActive->value => 'Не активен',
            UserStatusEnum::Active->value    => 'Активен',
            UserStatusEnum::Banned->value    => 'Заблокирован',
        };
    }
}
