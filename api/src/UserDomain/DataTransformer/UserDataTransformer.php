<?php

namespace App\UserDomain\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\UserDomain\Infrastructure\Doctrine\Entity\User;

class UserDataTransformer implements DataTransformerInterface
{
    public function transform($data, string $to, array $context = [])
    {
        $user = new User();
        //$user->isbn = $data->isbn;
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ($data instanceof User) {
            return false;
        }

        return User::class === $to && null !== ($context['input']['class'] ?? null);
    }
}
