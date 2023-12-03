<?php

namespace App\ShopApi\Product\Storage;

use App\Models\Product;

interface ProductStorageInterface
{
    /**
     * @param string $alias
     * @return Product|null
     */
    public function findByAlias(string $alias): ?object;
}
