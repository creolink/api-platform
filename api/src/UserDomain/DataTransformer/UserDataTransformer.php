<?php

namespace App\UserDomain\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\MealDomain\Adapter\User;

class UserDataTransformer implements DataTransformerInterface
{
    public function transform($data, string $to, array $context = [])
    {
        $user = new UserAdapter();
        //$user->isbn = $data->isbn;
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ($data instanceof UserAdapter) {
            return false;
        }

        return User::class === $to && null !== ($context['input']['class'] ?? null);
    }
}
