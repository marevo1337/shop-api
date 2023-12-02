<?php

namespace App\ShopApi\ProductCategory\Action;

use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\ProductCategory\Storage\ProductCategoryStorageInterface;
use App\ShopApi\Security\Permission\Service\PermissionChecker;
use Illuminate\Database\Eloquent\Collection;

class ProductCategoryListAction
{
    private const ACTION = 'ProductCategoryList';

    public function __construct(
        private readonly ProductCategoryStorageInterface $productCategoryStorage,
        private readonly PermissionChecker               $permissionChecker
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(): Collection
    {
        $this->permissionChecker->check(self::ACTION);

        return $this->productCategoryStorage->getAll();
    }
}
