<?php

namespace App\Repository;

use App\Models\ProductCategory;
use App\ShopApi\ProductCategory\Storage\ProductCategoryStorageInterface;

class ProductCategoryRepository implements ProductCategoryStorageInterface
{
    /**
     * @param string $alias
     * @return ProductCategory|null
     */
    public function getByAlias(string $alias): ?object
    {
        return ProductCategory::query()
            ->where('alias', '=', $alias)
            ->first();
    }
}
