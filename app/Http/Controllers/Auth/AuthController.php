<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Client\UserRequest;
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

    public function postRegister(UserRequest $request) {
        $this->authService->postRegister($request);
        return redirect()->back()->with('success', 'Bạn đã đăng ký tài khoản thành công, vui lòng kiểm tra email !');
    }

    public function logout(Request $request) {
        return $this->authService->logout($request);
    }

    public function activeUser(Request $request) {
        $this->authService->activeUser($request->id);
        return redirect()->route('form.getLogin')->with('success', 'Bạn đã kích hoạt tài khoản thành công!');
    }
}
