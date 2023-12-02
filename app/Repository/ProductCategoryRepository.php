<?php

namespace App\Repository;

use App\Models\ProductCategory;
use App\ShopApi\ProductCategory\Storage\ProductCategoryStorageInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductCategoryRepository implements ProductCategoryStorageInterface
{
    /**
     * @return ProductCategory|null
     */
    public function getById(int $id): ?object
    {
        return ProductCategory::query()->find($id);
    }

    /**
     * @return ProductCategory|null
     */
    public function getByAlias(string $alias): ?object
    {
        return ProductCategory::query()
            ->where('alias', '=', $alias)
            ->first();
    }

    public function getAll(): Collection
    {
        return ProductCategory::query()
            ->get();
    }
}
