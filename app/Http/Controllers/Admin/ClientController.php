<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Admin\ClientRequest;
use App\Http\Requests\User\Admin\UserRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Services\Admin\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function layout()
    {
        return view('admin.user.list');
    }

    public function list()
    {
        return $this->clientService->list();
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(ClientRequest $request)
    {
        $this->clientService->store($request);
        return redirect()->route('admin.users.list');
    }

    public function edit(Request $request)
    {
        $user = $this->clientService->edit($request->id);
        return view('admin.user.update',['user' => $user]);
    }

    public function update(ClientRequest $request)
    {
        $this->clientService->update($request);
        return redirect()->route('admin.users.list');
    }

    public function delete(Request $request)
    {
        return $this->clientService->delete($request);
    }

    public function updateProfile(UserRequest $request) {
        return $this->clientService->updateProfile($request);
    }

    public function changePassword(PasswordRequest $request) {
        return $this->clientService->changePassword($request);
    }
}

