<?php

namespace App\Http\Controllers\API\v1\Detail\ProductBinder\Dto;

use App\ShopApi\Detail\Contract\ProductBindDetailDataInterface;

class ProductBindDetailData implements ProductBindDetailDataInterface
{
    private int    $detailId;
    private int    $productId;
    private string $value;

    public function getDetailId(): int
    {
        return $this->detailId;
    }

    public function setDetailId(int $detailId): self
    {
        $this->detailId = $detailId;

        return $this;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
