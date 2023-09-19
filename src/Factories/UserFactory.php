<?php
namespace Plentific\UserApiHandler\Factories;

use Plentific\UserApiHandler\DTOs\User;
use Plentific\UserApiHandler\DTOs\UserCollection;

class UserFactory
{
    public static function createUser(array $data): User
    {
        return new User($data);
    }

    public static function createUserCollection(array $userData): UserCollection
    {
        return new UserCollection($userData);
    }
}
