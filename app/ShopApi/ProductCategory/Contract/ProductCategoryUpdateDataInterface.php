<?php

namespace App\ShopApi\ProductCategory\Contract;

interface ProductCategoryUpdateDataInterface extends ProductCategoryIdentificationDataInterface
{
    public function getTitle(): string;
    public function getDescription(): ?string;
}
