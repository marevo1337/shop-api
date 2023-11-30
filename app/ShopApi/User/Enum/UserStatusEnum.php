<?php

namespace App\ShopApi\User\Enum;

enum UserStatusEnum: string
{
    case NotActive = 'NotActive';
    case Active    = 'Active';
    case Banned    = 'Banned';
}
