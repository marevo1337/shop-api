<?php

namespace App\Http\Controllers\API\v1\User\List\Dto;

use App\ShopApi\User\Contract\UserSearchDataInterface;

class UserSearchData implements UserSearchDataInterface
{
    private ?string $firstName     = null;
    private ?string $lastName      = null;
    private ?string $email         = null;
    private ?array  $statuses      = null;
    private ?array  $permissionIds = null;
    private int     $pageSize      = 30;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStatuses(): ?array
    {
        return $this->statuses;
    }

    public function setStatuses(?array $statuses): self
    {
        $this->statuses = $statuses;

        return $this;
    }

    public function getPermissionIds(): ?array
    {
        return $this->permissionIds;
    }

    public function setPermissionIds(?array $permissionIds): self
    {
        $this->permissionIds = $permissionIds;

        return $this;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }
}
