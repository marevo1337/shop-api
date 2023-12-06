<?php

namespace App\ShopApi\Detail\Contract;

interface DetailCreateDataInterface
{
    public function getTitle(): string;
    public function getDescription(): ?string;
    public function getUnit(): ?string;
}
