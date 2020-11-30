<?php

namespace App\Infrastructure\Doctrine\MealDomain\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Infrastructure\Doctrine\UserDomain\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;

/**
 *
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     itemOperations={
 *         "get"={"security"="is_granted('ROLE_ADMIN') or object.owner == user", "security_message"="Only owner and admin can get the this data."},
 *         "put"={"security"="is_granted('ROLE_ADMIN') or object.owner == user", "security_message"="Only owner and admin can change data."}
 *     }
 * )
 * @ORM\Entity
 */
class Meal
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
    public string $title = '';

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    public string $type = '';

    /**
     * @ORM\Column(type="integer", length=4)
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\Type("numeric")
     */
    public int $calories = 0;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    public User $owner;

    public function getId(): Uuid
    {
        return $this->id;
    }
}
