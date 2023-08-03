<?php
namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

class AuthService 
{
    public function postLogin($request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.users.list');
        }
        return redirect()->back();
    }

    public function logout($request) {
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('form.getLogin');
    }
}