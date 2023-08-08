<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function dashboard() {
        $countData = $this->dashboardService->countSystemData();
        return view('admin.dashboard', ['countData' => $countData]);
    }
     
    public function statistical() {
        return $this->dashboardService->statistical();
    }
}
