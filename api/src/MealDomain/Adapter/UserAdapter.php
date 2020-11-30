<?php

namespace App\MealDomain\Adapter;

use Ramsey\Uuid\Uuid;

interface UserAdapter
{
    public function getId(): UUid;

    public function getEmail(): string;

    public function setEmail(string $email): self;

    public function getUsername(): string;

    public function getRoles(): array;

    public function setRoles(array $roles): self;

    public function getPassword(): string;

    public function setPassword(string $password): self;

    public function setCountryOfOrigin(string $countryOfOrigin): self;

    public function getCountryOfOrigin(): string;

    public function getSalt(): ?string;

    public function eraseCredentials(): ?string;
}
