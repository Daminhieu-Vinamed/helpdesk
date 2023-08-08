<?php
namespace App\Services\Admin;

use App\Repositories\Admin\DashboardRepository;

class DashboardService 
{
    protected DashboardRepository $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository){
        $this->dashboardRepository = $dashboardRepository;
    }

    public function countSystemData() {
        return $this->dashboardRepository->countSystemData();
    }

    public function statistical() {
        return $this->dashboardRepository->statistical();
    }
}