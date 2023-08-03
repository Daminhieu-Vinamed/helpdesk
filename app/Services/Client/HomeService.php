<?php
namespace App\Services\Client;

use App\Repositories\Client\HomeRepository;
use Illuminate\Support\Facades\Auth;

class HomeService 
{
    protected HomeRepository $homeRepository;

    public function __construct(HomeRepository $homeRepository) {
        $this->homeRepository = $homeRepository;
    }

    public function search($request)
    {
        $user = Auth::user();
        $keyWord = $request->keyword;
        return $this->homeRepository->search($user, $keyWord);
    }

}