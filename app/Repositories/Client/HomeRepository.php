<?php

namespace App\Repositories\Client;

use App\Models\Ticket;
use App\Repositories\AbstractRepository;
class HomeRepository extends AbstractRepository
{
    public function model()
    {
        return Ticket::class;
    }

    public function search($user, $keyWord) {
        $ticket = $this->builder()->select(
            'questions.content as question',
            'tickets.title as title',
            'tickets.content as content',
            'tickets.image as image',
        )
        ->leftJoin('questions', 'questions.id', '=', 'tickets.question_id')
        ->where('tickets.user_id', $user->id)
        ->where(function($query) use ($keyWord) {
            $query->where('tickets.title', 'LIKE', "%{$keyWord}%")
            ->orWhere('tickets.content', 'LIKE', "%{$keyWord}%")
            ->orWhere('questions.content', 'LIKE', "%{$keyWord}%");
        })->orderBy('tickets.created_at', 'ASC')->get();
        return $ticket;
    }
}
