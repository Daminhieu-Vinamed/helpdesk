<?php
namespace App\Services\Auth;

use App\Mail\ActiveUserMail;
use App\Repositories\Admin\ClientRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthService 
{
    protected ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository){
        $this->clientRepository = $clientRepository;
    }
    
    public function postLogin($request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function postRegister($request) {
        $dataUserNew = $request->input();
        $dataUserNew['role'] = config('constants.role.one');
        $dataUserNew['status'] = config('constants.status.two');
        $user = $this->clientRepository->store($dataUserNew);
        return Mail::to($user->email)->send(new ActiveUserMail($user->id));
    }

    public function logout($request) {
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('form.getLogin');
    }

    public function activeUser($id) {
        $updateStatus['status'] = config('constants.status.one');
        $this->clientRepository->updateUser($id, $updateStatus);
    }
}