<?php

use App\Http\Controllers\SearchUsersController;
use Illuminate\Support\Facades\Route;

Route::resource('search-users', SearchUsersController::class)->names('search_users');
