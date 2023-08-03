<?php

namespace App\Repositories\Admin;

use App\Models\Ticket;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TicketRepository extends AbstractRepository
{
    protected function model(): string
    {
        return Ticket::class;
    }

    public function list() 
    {
        $tickets = $this->builder()->select(
            'tickets.id as id',
            'questions.content as question',
            'tickets.title as title',
            DB::raw('(CASE WHEN u.username IS NULL THEN u.email ELSE u.username END) AS user_send'),
            DB::raw('(CASE WHEN p.username IS NULL THEN p.email ELSE p.username END) AS user_handler'),
            'tickets.status as checkStatus',
            'tickets.is_send_mail as is_send_mail',
        )
        ->leftJoin('users as u', 'u.id', '=', 'tickets.user_id')
        ->leftJoin('users as p', 'p.id', '=', 'tickets.problem_handler_user_id')
        ->leftJoin('questions', 'questions.id', '=', 'tickets.question_id')->get();
        return DataTables::of($tickets)->addColumn('status', function($arrTicket){
            if ($arrTicket['checkStatus'] === config('constants.status.one')) {
                return "Chưa xử lý";
            }else if($arrTicket['checkStatus'] === config('constants.status.two')){
                return "Đang xử lý";
            }else if($arrTicket['checkStatus'] === config('constants.status.three')){
                return "Đã xử lý";
            }
        })
        ->addColumn('action', function($arrTicket){
            $link = $arrTicket['is_send_mail'] === config('constants.status.one') ? route('admin.mail.sendOnlyAdmin', ['id' => $arrTicket['id']]) : '#';
            $statusButton = $arrTicket['is_send_mail'] === config('constants.status.one') ? 'info' : 'secondary';
           return ' <a href="'.$link.'" class="btn btn-'.$statusButton.'"><i class="fas fa-paper-plane"></i></a> ' . ' <a href="'.route('admin.tickets.edit', ['id' => $arrTicket['id']]).'" class="btn btn-success"><i class="fas fa-edit"></i></a> ' . ' <button id="'.$arrTicket['id'].'" class="btn btn-danger delete-ticket"><i class="fas fa-trash-alt"></i></button> ';
        })
        ->make(true);
    }

    public function store($dataTicketNew) {
        return $this->create($dataTicketNew);
    }

    public function edit($id) {
        $ticket = $this->find($id);
        return $ticket;
    }

    public function updateTicket($id, $dataTicketUpdate) {
        return $this->update($id, $dataTicketUpdate);
    }

    public function destroy($request) 
    {
        $this->delete($request->id);
        return response()->json(['error' => 'Xóa thành công !']);
    }

    public function ticketSendMail($id) {
        $ticketSendMail = $this->builder()->select(
            'questions.content as question',
            'users.email as email',
            'tickets.title as title',
            'tickets.content as content',
            'tickets.image as image'
        )
        ->leftJoin('users', 'users.id', '=', 'tickets.user_id')
        ->leftJoin('questions', 'questions.id', '=', 'tickets.question_id')->where('tickets.id', $id)->first();
        return $ticketSendMail;
    }
}
