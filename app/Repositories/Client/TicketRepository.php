<?php

namespace App\Repositories\Client;

use App\Models\Ticket;
use App\Repositories\AbstractRepository;

class TicketRepository extends AbstractRepository
{
    public function model()
    {
        return Ticket::class;
    }

    public function list($id) {
        $tickets = $this->builder()->select(
            'tickets.id as id',
            'tickets.title as title',
            'users.username as username',
            'users.email as email',
            'tickets.status as status',
        )
        ->leftJoin('users', 'users.id', '=', 'tickets.problem_handler_user_id')
        ->where('tickets.user_id', $id)
        ->paginate(config('constants.number.three')); 
        return $tickets;
    }

    public function detail($id) {
        $ticket = $this->find($id);
        return $ticket;
    }
}
