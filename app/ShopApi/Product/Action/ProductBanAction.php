<?php

namespace App\ShopApi\Product\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Contract\ProductIdentificationDataInterface;
use App\ShopApi\Product\Enum\ProductStatusEnum;
use App\ShopApi\Product\Storage\ProductStorageInterface;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class ProductBanAction
{
    private const ACTION = 'ProductBan';

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

        if ($product->status === ProductStatusEnum::Banned->value) {
            throw new RuntimeException('Товар уже заблокирован');
        }

        $product->status = ProductStatusEnum::Banned->value;
        $product->save();
    }
}
