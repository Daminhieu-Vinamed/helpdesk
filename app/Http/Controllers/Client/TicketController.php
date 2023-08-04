<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\Client\TicketRequest;
use App\Services\Client\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService) {
        $this->ticketService = $ticketService;
    }

    public function list() {
        $tickets = $this->ticketService->list();
        return view('client.list', ['tickets' => $tickets]);
    }

    public function detail(Request $request) {
        $ticket = $this->ticketService->detail($request->id);
        return view('client.detail', ['ticket' => $ticket]);
    }

    public function create() {
        $questions = $this->ticketService->listQuestionOption();
        return view('client.create', ['questions' => $questions]);
    }

    public function store(TicketRequest $request) {
        $this->ticketService->store($request);
        return redirect()->back();
    }
}
