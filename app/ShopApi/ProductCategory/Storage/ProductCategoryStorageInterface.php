<?php

namespace App\ShopApi\ProductCategory\Storage;

use App\Models\ProductCategory;

interface ProductCategoryStorageInterface
{
    /**
     * @param string $alias
     * @return ProductCategory|null
     */
    public function getByAlias(string $alias): ?object;
}
