<?php

namespace App\ShopApi\Detail\Storage;

use App\Models\ProductDetail;

interface ProductDetailStorageInterface
{
    /**
     * @return ProductDetail|null
     */
    public function get(int $productId, int $detailId): ?object;
}
