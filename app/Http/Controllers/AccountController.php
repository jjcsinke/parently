<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account(Request $request): UserResource
    {
        return UserResource::make($request->user());
    }
}
