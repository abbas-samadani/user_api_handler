<?php

use Illuminate\Support\Facades\Route;
use Plentific\UserApiHandler\UserController;

Route::get('users', [UserController::class, 'show']);
