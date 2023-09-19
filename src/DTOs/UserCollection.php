<?php

namespace Plentific\UserApiHandler\DTOs;

use Illuminate\Support\Collection;
use JsonSerializable;

class UserCollection implements JsonSerializable
{
    protected $users;

    public function __construct(array $userData)
    {
        $this->users = collect($userData)->map(function ($user) {
            return new User($user);
        });
    }

    public function jsonSerialize()
    {
        return $this->users->map(function (User $user) {
            return $user->jsonSerialize();
        })->toArray();
    }

    public function toArray()
    {
        return $this->jsonSerialize();
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }
}
