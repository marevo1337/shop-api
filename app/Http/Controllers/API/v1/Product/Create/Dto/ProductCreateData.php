<?php

namespace App\Http\Controllers\API\v1\Product\Create\Dto;

use App\ShopApi\Product\Contract\ProductCreateDataInterface;

class ProductCreateData implements ProductCreateDataInterface
{
    private string $title;
    private string $description;
    private string $alias;
    private int    $productCategoryId;
    private float  $price;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function getProductCategoryId(): int
    {
        return $this->productCategoryId;
    }

    public function setProductCategoryId(int $productCategoryId): self
    {
        $this->productCategoryId = $productCategoryId;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
