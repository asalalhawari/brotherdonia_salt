<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\RegisterUserRequest;
use App\Services\auth\RegisterUserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request){

        //create user
        $user = RegisterUserService::register($request->validated());

        return redirect()->route('login');
       

    }
}
