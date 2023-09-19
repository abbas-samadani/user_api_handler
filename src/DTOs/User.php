<?php
namespace Plentific\UserApiHandler\DTOs;

use JsonSerializable;

class User implements JsonSerializable
{
    protected $id;
    protected $email;
    protected $first_name;
    protected $last_name;
    protected $avatar;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->first_name = $data['first_name'] ?? null;
        $this->last_name = $data['last_name'] ?? null;
        $this->avatar = $data['avatar'] ?? null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function toArray()
    {
        return $this->jsonSerialize();
    }
}
