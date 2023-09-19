<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Plentific\UserApiHandler\Services\UserService;
use Plentific\UserApiHandler\Services\ReqresService;
use Mockery;

class UserServiceTest extends TestCase
{
    protected $reqresService;
    protected $userService;

    public function setUp(): void
    {
        $this->reqresService = Mockery::mock(ReqresService::class);
        $this->userService = new UserService($this->reqresService);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }


    public function testGetUserById()
    {
        $id = 1;
        $expectedUser = [
            'id' => $id,
            'email' => 'test@user.com',
            'first_name' => 'Test',
            'last_name' => 'User',
            'avatar' => 'https://reqres.in/img/faces/2-image.jpg'
        ];

        $this->reqresService
            ->shouldReceive('getIterableFromProvider')
            ->with("/users/{$id}", 'data')
            ->andReturn($expectedUser);

        $user = $this->userService->getUserById($id);
        $this->assertEquals($expectedUser, $user);
    }

    public function testGetPaginatedUsers()
    {
        $page = 1;
        $expectedUsers = [
            [
                'id' => 1,
                'email' => 'test1@user.com',
                'first_name' => 'Test1',
                'last_name' => 'User1',
                'avatar' => 'https://reqres.in/img/faces/2-image.jpg'
            ],
            [
                'id' => 2,
                'email' => 'test2@user.com',
                'first_name' => 'Test2',
                'last_name' => 'User2',
                'avatar' => 'https://reqres.in/img/faces/3-image.jpg'
            ]
        ];

        $this->reqresService
            ->shouldReceive('getIterableFromProvider')
            ->with("/users?page={$page}", 'data')
            ->andReturn($expectedUsers);

        $users = $this->userService->getPaginatedUsers($page);

        $this->assertEquals($expectedUsers, $users);
    }

    public function testCreateUser()
    {
        $name = 'Test';
        $job = 'Tester';
        $expectedUser = [
            'name' => $name,
            'job' => $job,
            'id' => '123',
            'createdAt' => '2023-09-19T21:58:36.641Z'
        ];

        $this->reqresService
            ->shouldReceive('postParamsToProvider')
            ->with("/users", '', ['name' => $name, 'job' => $job])
            ->andReturn($expectedUser);

        $user = $this->userService->createUser($name, $job);

        $this->assertEquals($expectedUser, $user);
    }
}
