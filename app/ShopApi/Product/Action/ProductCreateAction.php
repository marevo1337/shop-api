<?php

namespace App\ShopApi\Product\Action;

use App\Models\Product;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Product\Contract\ProductCreateDataInterface;
use App\ShopApi\Product\Enum\ProductStatusEnum;
use App\ShopApi\Product\Storage\ProductStorageInterface;
use App\ShopApi\ProductCategory\Storage\ProductCategoryStorageInterface;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class ProductCreateAction
{
    private const ACTION = 'ProductCreate';

    public function __construct(
        private readonly ProductStorageInterface         $productStorage,
        private readonly ProductCategoryStorageInterface $productCategoryStorage,
        private readonly PermissionChecker               $permissionChecker
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(ProductCreateDataInterface $data): void
    {
        $this->permissionChecker->check(self::ACTION);

        $product = $this->productStorage->findByAlias($data->getAlias());
        if (!is_null($product)) {
            throw new RuntimeException('Товар с данным псевдонимом уже существует');
        }

        $productCategory = $this->productCategoryStorage->getById($data->getProductCategoryId());
        if (is_null($productCategory)) {
            throw new RuntimeException('Продуктовая категория не найдена');
        }

        if ($data->getPrice() < 0) {
            throw new RuntimeException('Недопустимая цена товара');
        }

        $product                      = new Product();
        $product->title               = $data->getTitle();
        $product->description         = $data->getDescription();
        $product->product_category_id = $data->getProductCategoryId();
        $product->alias               = $data->getAlias();
        $product->price               = $data->getPrice();
        $product->status              = ProductStatusEnum::Archived->value;
        $product->save();
    }
}
