<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserAllResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return UserAllResource::collection($user);
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());
        return new UserAllResource($user);
    }
}