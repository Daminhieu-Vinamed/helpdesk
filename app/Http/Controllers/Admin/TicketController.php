<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\Admin\TicketRequest;
use App\Services\Admin\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function layout()
    {
        return view('admin.ticket.list');
    }

    public function list()
    {
        return $this->ticketService->list();
    }

    public function create()
    {
        $arrOption = $this->ticketService->arrOption();
        return view('admin.ticket.create',['userHandler' => $arrOption['userHandler'], 'userSend' => $arrOption['userSend'], 'questions' => $arrOption['questions']]);
    }

    public function store(TicketRequest $request)
    {
        $this->ticketService->store($request);
        return redirect()->route('admin.tickets.list');
    }

    public function edit(Request $request)
    {
        $ticket = $this->ticketService->edit($request->id);
        $arrOption = $this->ticketService->arrOption();
        return view('admin.ticket.update',['userHandler' => $arrOption['userHandler'], 'userSend' => $arrOption['userSend'], 'questions' => $arrOption['questions'], 'ticket' => $ticket]);
    }

    public function update(TicketRequest $request)
    {
        $this->ticketService->update($request);
        return redirect()->route('admin.tickets.list');
    }

    public function delete(Request $request)
    {
        return $this->ticketService->delete($request);
    }
}
