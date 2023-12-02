<?php

namespace App\Http\Controllers\API\v1\ProductCategory\Create\Dto;

use App\ShopApi\ProductCategory\Contract\ProductCategoryCreateDataInterface;

class ProductCategoryCreateData implements ProductCategoryCreateDataInterface
{
    private string  $title;
    private ?string $description = null;
    private string  $alias;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
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
}
