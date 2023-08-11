<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Client\UserRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Services\Client\ClientService;

class ClientController extends Controller
{
    protected ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    
    public function updateProfile(UserRequest $request) {
        return $this->clientService->updateProfile($request);
    }

    public function changePassword(PasswordRequest $request) {
        return $this->clientService->changePassword($request);
    }
}
