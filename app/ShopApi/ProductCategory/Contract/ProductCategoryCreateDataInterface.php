<?php

namespace App\ShopApi\ProductCategory\Contract;

interface ProductCategoryCreateDataInterface
{
    public function getTitle(): string;
    public function getDescription(): ?string;
    public function getAlias(): string;
}
