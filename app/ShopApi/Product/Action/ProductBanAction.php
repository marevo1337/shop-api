<?php

namespace App\ShopApi\Product\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Contract\ProductIdentificationDataInterface;
use App\ShopApi\Product\Enum\ProductStatusEnum;
use App\ShopApi\Product\Storage\ProductStorageInterface;

class ProductBanAction
{
    public function __construct(
        private readonly ProductStorageInterface $productStorage
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(ProductIdentificationDataInterface $data): void
    {
        $product = $this->productStorage->findByAlias($data->getAlias());
        if (is_null($product)) {
            throw new RuntimeException('Товар не найден');
        }

        if ($product->status === ProductStatusEnum::Banned->value) {
            throw new RuntimeException('Товар уже заблокирован');
        }

        $product->status = ProductStatusEnum::Banned->value;
        $product->save();
    }
}
