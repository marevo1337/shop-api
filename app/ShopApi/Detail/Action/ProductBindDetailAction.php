<?php

namespace App\ShopApi\Detail\Action;

use App\Models\ProductDetail;
use App\ShopApi\Detail\Contract\ProductBindDetailDataInterface;
use App\ShopApi\Detail\Storage\ProductDetailStorageInterface;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class ProductBindDetailAction
{
    private const ACTION = 'ProductBindDetail';

    public function __construct(
        private readonly ProductDetailStorageInterface $productDetailStorage,
        private readonly PermissionChecker             $permissionChecker
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(ProductBindDetailDataInterface $data): void
    {
        $this->permissionChecker->check(self::ACTION);

        $productDetail = $this->productDetailStorage->get($data->getProductId(), $data->getDetailId());
        if (!is_null($productDetail)) {
            throw new RuntimeException('Данная связка характеристики и товара уже существует');
        }

        $productDetail             = new ProductDetail();
        $productDetail->product_id = $data->getProductId();
        $productDetail->detail_id  = $data->getDetailId();
        $productDetail->value      = $data->getValue();
        $productDetail->save();
    }
}
