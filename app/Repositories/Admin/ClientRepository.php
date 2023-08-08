<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ClientRepository extends AbstractRepository
{
    protected function model(): string
    {
        return User::class;
    }

    public function list() 
    {
        $users = $this->all();
        return DataTables::of($users)->addColumn('role', function($arrUser){
            if ($arrUser['role'] === config('constants.status.one')) {
                return "Người dùng";
            }else if($arrUser['role'] === config('constants.status.two')){
                return "Quản trị viên";
            }else{
                return "Quản trị viên cấp cao";
            }
        })
        ->addColumn('status', function($arrUser){
            if ($arrUser['status'] === config('constants.status.one')) {
                return "Mở";
            }else if($arrUser['status'] === config('constants.status.two')){
                return "Khóa";
            }
        })
        ->addColumn('action', function($arrUser){
            if (Auth::user()->role === config('constants.role.three')) {
                return ' <a href="'.route('admin.users.edit', ['id' => $arrUser['id']]).'" class="btn btn-success"><i class="fas fa-edit"></i></a> ' . ' <button id="'.$arrUser['id'].'" class="btn btn-danger delete-user"><i class="fas fa-trash-alt"></i></button> ';
            }else{
                return 'Trống';
            }
        })
        ->make(true);
    }

    public function store($dataUserNew) 
    {
        return $this->create($dataUserNew);
    }   
    
    public function edit($id) 
    {
        $user = $this->find($id);
        return $user;
    }

    public function updateUser($id, $dataUserEdit) 
    {
        return $this->update($id, $dataUserEdit);
    } 

    public function destroy($request) 
    {
        $this->delete($request->id);
        return response()->json(['error' => 'Xóa thành công !']);
    }

    public function listUserOption($user)
    {
        if ($user->role === config('constants.role.two')) {
            $userHandler = $this->builder()->where('role', $user->role)->get();
        } elseif ($user->role === config('constants.role.three')) {
            $userHandler = $this->builder()->where('role', $user->role)->orWhere('role', config('constants.role.two'))->get();
        }

        if ($user->role === config('constants.role.two')) {
            $userSend = $this->builder()->where('role', $user->role)->orWhere('role', config('constants.role.one'))->get();
        } elseif ($user->role === config('constants.role.three')) {
            $userSend = $this->all();
        }
        $userSend = $userSend->map(function ($user) {
            return collect($user->toArray())->only(['username', 'id', 'email'])->all();
        });

        $userHandler = $userHandler->map(function ($user) {
            return collect($user->toArray())->only(['username', 'id', 'email'])->all();
        });
        
        return [
            'userSend' => $userSend,
            'userHandler' => $userHandler
        ];
    }
}
