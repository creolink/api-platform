<?php

namespace App\UserDomain\Dto;

use App\UserDomain\Exception\InvalidRepeatedPasswordException;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Ramsey\Uuid\UuidInterface;
use App\UserDomain\Controller\RegisterUserController;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource(itemOperations={
 *     "get",
 *     "post_publication"={
 *         "method"="POST",
 *         "path"="/register",
 *         "controller"=RegisterUserController::class,
 *         "read"=false
 *     }
 * })
 */
class NewUser
{
    /**
     * @ApiProperty(identifier=true)
     */
    private UuidInterface $id;

    /**
     * @Assert\NotBlank
     */
    private string $email = '';

    /**
     * @Assert\NotBlank
     */
    private string $password = '';

    /**
     * @Assert\NotBlank
     */
    private string $repeatedPassword = '';

    /**
     * @Assert\NotBlank
     */
    private string $country = '';

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRepeatedPassword(): string
    {
        return $this->repeatedPassword;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setRepeatedPassword(string $repeatedPassword): self
    {
        $this->repeatedPassword = $repeatedPassword;

        $this->validatePasswords();

        return $this;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    private function validatePasswords(): void
    {
        if ($this->password !== $this->repeatedPassword) {
            throw new InvalidRepeatedPasswordException();
        }
    }
}
