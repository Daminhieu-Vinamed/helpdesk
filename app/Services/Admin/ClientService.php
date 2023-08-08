<?php
namespace App\Services\Admin;

use App\Repositories\Admin\ClientRepository;
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

    public function list()
    {
        return $this->clientRepository->list();
    }

    public function store($request)
    {
        $dataUserNew = $request->input();
        if (empty($request->file('avatar'))) {
            $dataUserNew['avatar'] = config('constants.value.null');
        } else {
            $imageName = $request->file('avatar')->hashName();
            $dataUserNew['avatar'] = $this->imagePath . $imageName;
            $request->avatar->storeAs($this->storePath, $imageName);
        }
        $dataUserNew['password'] = Hash::make($request->password);
        return $this->clientRepository->store($dataUserNew);
    }

    public function edit($id)
    {
        return $this->clientRepository->edit($id);
    }

    public function update($request)
    {
        $dataUserEdit = $request->input();
        $user = $this->clientRepository->edit($dataUserEdit['id']);
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
        $dataUserEdit['password'] = Hash::make($request->password);
        return $this->clientRepository->updateUser($request->id, $dataUserEdit);
    }

    public function delete($request)
    {
        $user = $this->clientRepository->edit($request->id);
        Storage::delete(str_replace("storage", "public", $user->avatar));
        return $this->clientRepository->destroy($request);
    }
}