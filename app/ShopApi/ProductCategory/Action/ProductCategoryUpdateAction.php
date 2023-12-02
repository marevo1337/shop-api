<?php

namespace App\ShopApi\ProductCategory\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\ProductCategory\Contract\ProductCategoryUpdateDataInterface;
use App\ShopApi\ProductCategory\Storage\ProductCategoryStorageInterface;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class ProductCategoryUpdateAction
{
    private const ACTION = 'ProductCategoryUpdate';

    public function __construct(
        private readonly PermissionChecker               $permissionChecker,
        private readonly ProductCategoryStorageInterface $productCategoryStorage
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(ProductCategoryUpdateDataInterface $data): void
    {
        $this->permissionChecker->check(self::ACTION);

        $productCategory = $this->productCategoryStorage->getById($data->getId());
        if (is_null($productCategory)) {
            throw new RuntimeException('Категория продукта не найдена');
        }

        $productCategory->title       = $data->getTitle();
        $productCategory->description = $data->getDescription();
        $productCategory->save();
    }
}
