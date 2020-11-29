<?php

namespace App\UserDomain\Infrastructure\Doctrine\Entity;

use App\UserDomain\Infrastructure\Doctrine\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private Uuid $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     */
    private string $email = '';

    /**
     * @ORM\Column(type="json")
     */
    private array $roles = [];

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private string $password = '';

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private string $countryOfOrigin;

    public function getId(): UUid
    {
        return $this->id;
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

    /**
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setCountryOfOrigin(string $countryOfOrigin): self
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    public function getCountryOfOrigin(): string
    {
        return (string) $this->countryOfOrigin;
    }

    public function getSalt(): ?string
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    public function eraseCredentials(): ?string
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
