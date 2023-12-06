<?php

namespace App\Repository;

use App\Models\ProductDetail;
use App\ShopApi\Detail\Storage\ProductDetailStorageInterface;

class ProductDetailRepository implements ProductDetailStorageInterface
{

    public function get(int $productId, int $detailId): ?object
    {
        return ProductDetail::query()
            ->where('product_id', '=', $productId)
            ->where('detail_id', '=', $detailId)
            ->first();
    }
}
