<?php

namespace App\Repository;

use App\Models\Product;
use App\ShopApi\Product\Storage\ProductStorageInterface;

class ProductRepository implements ProductStorageInterface
{
    /**
     * @return Product|null
     */
    public function findByAlias(string $alias): ?object
    {
        return Product::query()
            ->where('alias', '=', $alias)
            ->first();
    }
}
