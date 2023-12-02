<?php

namespace App\ShopApi\ProductCategory\Action;

use App\Models\ProductCategory;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\ProductCategory\Contract\ProductCategoryCreateDataInterface;
use App\ShopApi\ProductCategory\Storage\ProductCategoryStorageInterface;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class ProductCategoryCreateAction
{
    private const ACTION = 'ProductCategoryCreate';

    public function __construct(
        private readonly PermissionChecker               $permissionChecker,
        private readonly ProductCategoryStorageInterface $productCategoryStorage
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(ProductCategoryCreateDataInterface $data): void
    {
        $this->permissionChecker->check(self::ACTION);

        $productCategory = $this->productCategoryStorage->getByAlias($data->getAlias());
        if (!is_null($productCategory)) {
            throw new RuntimeException(
                sprintf('Псевдоним %s уже существует', $data->getAlias())
            );
        }

        $productCategory              = new ProductCategory();
        $productCategory->title       = $data->getTitle();
        $productCategory->description = $data->getDescription();
        $productCategory->alias       = $data->getAlias();
        $productCategory->save();
    }
}
