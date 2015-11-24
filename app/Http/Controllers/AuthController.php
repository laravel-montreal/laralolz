<?php

namespace App\Http\Controllers;

use App\AuthenticateUser;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;

class AuthController extends Controller
{
    public function login(AuthenticateUser $authenticateUser, Request $request)
    {
        return $authenticateUser->execute($request->has('oauth_token'));
    }

    public function logout(Guard $auth)
    {
        $auth->logout();
    }
}
