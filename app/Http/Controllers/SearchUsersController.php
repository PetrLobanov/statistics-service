<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchUsersRequest;
use App\Http\Resources\SearchUsersResource;
use App\Models\User;
use App\Services\Filter\SearchUsers;

class SearchUsersController extends Controller
{
    public function index(SearchUsersRequest $request): SearchUsersResource
    {
        $response = (new SearchUsers(User::query(), $request))->apply();
        return SearchUsersResource::make($response);
    }
}
