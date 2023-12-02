<?php

namespace App\ShopApi\Security\Permission\Contract;

interface PermissionCreateDataInterface
{
    public function getName(): string;
    public function getDescription(): ?string;
}
