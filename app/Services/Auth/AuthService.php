<?php
namespace App\Services\Auth;

use App\Repositories\Admin\ClientRepository;
use Illuminate\Support\Facades\Auth;

class AuthService 
{
    protected ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository){
        $this->clientRepository = $clientRepository;
    }
    
    public function postLogin($request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.users.list');
        }else{
            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout($request) {
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('form.getLogin');
    }
}