<?php

namespace App\ShopApi\Product\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Contract\ProductIdentificationDataInterface;
use App\ShopApi\Product\Enum\ProductStatusEnum;
use App\ShopApi\Product\Storage\ProductStorageInterface;

class ProductPublishAction
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

        if ($product->status === ProductStatusEnum::Published->value) {
            throw new RuntimeException('Товар уже опубликован');
        }

        $product->status = ProductStatusEnum::Published->value;
        $product->save();
    }
}
