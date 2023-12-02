<?php

namespace App\Http\Controllers\API\v1\Permission\Create\ValueObject;

use App\ShopApi\Security\Permission\Contract\PermissionCreateDataInterface;

class PermissionCreateData implements PermissionCreateDataInterface
{
    public function __construct(
        private readonly string  $name,
        private readonly ?string $description = null
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
