<?php
namespace App\Services\Client;

use App\Repositories\Admin\ClientRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientService 
{
    protected ClientRepository $clientRepository;
    public $storePath = 'public/images/user_images/';
    public $imagePath = 'storage/images/user_images/';

    public function __construct(ClientRepository $clientRepository){
        $this->clientRepository = $clientRepository;
    }

    public function updateProfile($request)
    {
        $dataUserEdit = $request->input();
        $user = $this->clientRepository->edit(Auth::user()->id);
        if (empty($request->file('avatar'))) {
            if (empty($dataUserEdit['imageBefore'])) {
                if (!empty($user->avatar)) {
                    Storage::delete(str_replace("storage", "public", $user->avatar));
                }
                $dataUserEdit['avatar'] = config('constants.value.null');
            }else{
                $dataUserEdit['avatar'] = $dataUserEdit['imageBefore'];
            }
        }else{
            $imageName = $request->file('avatar')->hashName();
            $dataUserEdit['avatar'] = $this->imagePath . $imageName;
            $request->avatar->storeAs($this->storePath, $imageName);
            if (!empty($user->avatar)) {
                Storage::delete(str_replace("storage", "public", $user->avatar));
            }
        }
        return $this->clientRepository->updateUser(Auth::user()->id, $dataUserEdit);
    }

    public function changePassword($request)
    {
        $passwordNew['password'] = Hash::make($request->passwordAfter);
        return $this->clientRepository->updateUser(Auth::user()->id, $passwordNew);
    }
}