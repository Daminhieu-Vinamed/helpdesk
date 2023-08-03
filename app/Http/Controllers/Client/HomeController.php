<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected HomeService $homeService;

    public function __construct(HomeService $homeService) {
        $this->homeService = $homeService;
    }

    public function layout() {
        return view('client.home');
    }

    public function search(Request $request) {
        $tickets = $this->homeService->search($request);
        return view('client.home', ['tickets' => $tickets]);
    }
}
