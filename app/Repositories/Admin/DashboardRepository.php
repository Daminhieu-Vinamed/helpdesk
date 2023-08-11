<?php

namespace App\Repositories\Admin;

use App\Models\Question;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardRepository extends AbstractRepository
{
    protected function model(): string
    {
        return Ticket::class;
    }

    public function countSystemData() {
        $ticketCount = $this->builder()->count();
        $clientCount = User::where('role', config('constants.role.one'))->count();
        $adminCount = User::where('role', config('constants.role.two'))->count();
        $questionCount = Question::count();
        return [
            'ticketCount' => $ticketCount,
            'clientCount' => $clientCount,
            'adminCount' => $adminCount,
            'questionCount' => $questionCount,
        ];
    }
    
    public function statistical() {
        $tickets = $this->builder()->select('id', 'created_at')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });
        $statisticalQuestion = DB::table('questions')
        ->select('questions.content as content', DB::raw("count(tickets.question_id) as count"))
        ->join('tickets', 'tickets.question_id', 'questions.id')
        ->groupBy('questions.content')->limit(config('constants.number.three'))->get();
        $ticketMcount = [];
        $ticketArr = [];
        $questionArr = [];
        foreach ($tickets as $key => $value) {
            $ticketMcount[(int)$key] = count($value);
        }
        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        for ($i = config('constants.number.one'); $i <= config('constants.number.twelve'); $i++) {
            if (!empty($ticketMcount[$i])) {
                $ticketArr[$i]['count'] = $ticketMcount[$i];
            } else {
                $ticketArr[$i]['count'] = config('constants.number.zero');
            }
            $ticketArr[$i]['month'] = $month[$i - config('constants.number.one')];
        }
        for ($i=0; $i < count($statisticalQuestion) ; $i++) { 
            $questionArr[$i]['question'] = $statisticalQuestion[$i]->content;
            $questionArr[$i]['countTicket'] = $statisticalQuestion[$i]->count;
        }
        return response()->json(['ticketStatistical' => array_values($ticketArr), 'questionStatistical' => array_values($questionArr)]);
    }
}