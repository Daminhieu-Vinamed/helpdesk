<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Services\Mail\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    protected MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function sendOnlyAdmin(Request $request) 
    {
        $this->mailService->sendOnlyAdmin($request->id);
        return redirect()->back();
    }
}
