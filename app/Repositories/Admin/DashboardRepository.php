<?php

namespace App\Repositories\Admin;

use App\Models\Question;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;

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
        $ticketMcount = [];
        $ticketArr = [];
        foreach ($tickets as $key => $value) {
            $ticketMcount[(int)$key] = count($value);
        }
        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($ticketMcount[$i])) {
                $ticketArr[$i]['count'] = $ticketMcount[$i];
            } else {
                $ticketArr[$i]['count'] = 0;
            }
            $ticketArr[$i]['month'] = $month[$i - 1];
        }
        return response()->json(array_values($ticketArr));
    }
}