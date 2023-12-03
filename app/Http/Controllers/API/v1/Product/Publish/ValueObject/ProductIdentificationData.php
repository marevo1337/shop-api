<?php

namespace App\Http\Controllers\API\v1\Product\Publish\ValueObject;

use App\ShopApi\Product\Contract\ProductIdentificationDataInterface;

class ProductIdentificationData implements ProductIdentificationDataInterface
{
    public function __construct(
        private readonly string $alias
    ) {}

    public function getAlias(): string
    {
        return $this->alias;
    }
}
