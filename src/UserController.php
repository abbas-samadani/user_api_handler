<?php


namespace Plentific\UserApiHandler;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Plentific\UserApiHandler\DTOs\User;
use Plentific\UserApiHandler\DTOs\UserCollection;
use Plentific\UserApiHandler\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show($id): User
    {
        $user = $this->userService->getUserById($id);
        return new User($user);
    }

    public function index($page = 1): UserCollection
    {
        $users = $this->userService->getPaginatedUsers($page);
        return new UserCollection($users);
    }

    public function store($name , $job)
    {
        $user = $this->userService->createUser($name, $job);
        return $user['id'];
    }
}
