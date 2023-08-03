<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        return $this->authService->postLogin($request);
    }

    public function getRegister() {
        return view('auth.register');
    }

    public function logout(Request $request) {
        return $this->authService->logout($request);
    }
}
