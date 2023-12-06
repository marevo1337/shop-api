<?php

namespace App\ShopApi\Detail\Contract;

interface ProductBindDetailDataInterface
{
    public function getDetailId(): int;
    public function getProductId(): int;
    public function getValue(): string;
}
