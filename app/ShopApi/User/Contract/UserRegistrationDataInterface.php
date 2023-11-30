<?php

namespace App\ShopApi\User\Contract;

interface UserRegistrationDataInterface
{
    public function getFirstName(): string;
    public function getLastName(): ?string;
    public function getEmail(): string;
    public function getPassword(): string;
    public function getPermissionId(): int;
}
