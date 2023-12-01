<?php

namespace App\ShopApi\User\Contract;

interface UserSearchDataInterface
{
    public function getFirstName(): ?string;
    public function getLastName(): ?string;
    public function getEmail(): ?string;
    /**
     * @return string[]|null
     */
    public function getStatuses(): ?array;
    /**
     * @return int[]|null
     */
    public function getPermissionIds(): ?array;
    public function getPageSize(): int;
}
