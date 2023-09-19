<?php

namespace Plentific\UserApiHandler\Services;


class UserService
{
    protected $reqres;

    public function __construct(ReqresService $reqres)
    {
        $this->reqres = $reqres;
    }

    public function getUserById($id)
    {
        $uri = "/users/{$id}";
        return $this->reqres->getIterableFromProvider($uri, 'data');
    }

    public function getPaginatedUsers($page)
    {
        $uri = "/users?page={$page}";
        return $this->reqres->getIterableFromProvider($uri, 'data');
    }

    public function createUser($name, $job)
    {
        $uri = "/users";
        $data = ['name' => $name, 'job' => $job];
        return $this->reqres->postParamsToProvider($uri, '', $data);
    }
}
