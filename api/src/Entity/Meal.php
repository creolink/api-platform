<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;


/**
 *
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "get"={"security"="is_granted('ROLE_ADMIN') or object.owner == user"}
 *     },
 *     itemOperations={
 *         "get"={"security"="is_granted('ROLE_ADMIN') or object.owner == user"},
 *         "put"={"security"="is_granted('ROLE_ADMIN') or object.owner == user"}
 *     }
 * )
 * @ORM\Entity
 */
class Meal
{
    /**
     * @var Uuid The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public string $title = '';

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public string $type = '';

    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=4)
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\Type("numeric")
     */
    public int $calories = 0;

    /**
     * @var User The owner
     *
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    public $owner;

    public function getId(): string
    {
        return $this->id;
    }
}
