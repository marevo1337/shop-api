<?php

namespace App\Http\Controllers\API\v1\Detail\Create\Dto;

use App\ShopApi\Detail\Contract\DetailCreateDataInterface;

class DetailCreateData implements DetailCreateDataInterface
{
    private string  $title;
    private ?string $description;
    private ?string $unit;

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

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
