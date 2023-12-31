<?php

namespace App\Http\Controllers\API\v1\User\Registration\Dto;

use App\ShopApi\User\Contract\UserRegistrationDataInterface;

class UserRegistrationData implements UserRegistrationDataInterface
{
    private string  $firstName;
    private ?string $lastName;
    private string  $email;
    private string  $password;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPermissionId(): int
    {
        return 1;
    }
}
