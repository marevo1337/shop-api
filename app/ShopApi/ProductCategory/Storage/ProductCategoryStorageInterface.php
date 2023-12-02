<?php

namespace App\ShopApi\ProductCategory\Storage;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;

interface ProductCategoryStorageInterface
{
    /**
     * @param int $id
     * @return ProductCategory|null
     */
    public function getById(int $id): ?object;

    /**
     * @param string $alias
     * @return ProductCategory|null
     */
    public function getByAlias(string $alias): ?object;

    public function getAll(): Collection;
}
