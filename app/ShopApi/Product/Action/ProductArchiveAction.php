<?php

namespace App\ShopApi\Product\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Contract\ProductIdentificationDataInterface;
use App\ShopApi\Product\Enum\ProductStatusEnum;
use App\ShopApi\Product\Storage\ProductStorageInterface;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class ProductArchiveAction
{
    private const ACTION = 'ProductArchive';

    public function __construct(
        private readonly ProductStorageInterface $productStorage,
        private readonly PermissionChecker       $permissionChecker
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(ProductIdentificationDataInterface $data): void
    {
        $this->permissionChecker->check(self::ACTION);

        $product = $this->productStorage->findByAlias($data->getAlias());
        if (is_null($product)) {
            throw new RuntimeException('Товар не найден');
        }

        if ($product->status === ProductStatusEnum::Archived->value) {
            throw new RuntimeException('Товар уже архивирован');
        }

        $product->status = ProductStatusEnum::Archived->value;
        $product->save();
    }
}
