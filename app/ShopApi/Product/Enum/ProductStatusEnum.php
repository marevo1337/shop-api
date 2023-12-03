<?php

namespace App\ShopApi\Product\Enum;

enum ProductStatusEnum: string
{
    case Published = 'Published';
    case Archived  = 'Archived';
    case Banned    = 'Banned';
}
