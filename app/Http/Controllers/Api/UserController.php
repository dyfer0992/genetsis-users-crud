<?php

namespace App\Http\Controllers\Api;

use App\Domain\Users\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAll(Request $request)
    {
        return UserResource::collection(User::query()->paginate($request->perPage ?? 30));
    }
}
