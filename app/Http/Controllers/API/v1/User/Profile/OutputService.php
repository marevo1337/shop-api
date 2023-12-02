<?php

namespace App\Http\Controllers\API\v1\User\Profile;

use App\Models\User;
use App\ShopApi\User\Enum\UserStatusEnum;

class OutputService
{
    public function build(User $user): array
    {
        return [
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'email'      => $user->email,
            'avatar'     => $user->avatar,
            'active'     => $user->status === UserStatusEnum::Active->value,
        ];
    }
}
