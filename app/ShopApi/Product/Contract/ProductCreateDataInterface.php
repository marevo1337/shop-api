<?php

namespace App\ShopApi\Product\Contract;

interface ProductCreateDataInterface
{
    public function getTitle(): string;
    public function getDescription(): string;
    public function getAlias(): string;
    public function getProductCategoryId(): int;
    public function getPrice(): float;
}
