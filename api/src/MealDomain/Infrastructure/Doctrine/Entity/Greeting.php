<?php

namespace App\MealDomain\Infrastructure\Doctrine\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;

/**
 * @ApiResource
 * @ORM\Entity
 */
class Greeting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private Uuid $id;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    public string $name = '';

    public function getId(): Uuid
    {
        return $this->id;
    }
}
