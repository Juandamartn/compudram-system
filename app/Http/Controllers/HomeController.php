<?php

namespace App\Http\Controllers;

use App\License;
use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('America/Chihuahua');
        $todayDate = date("d/m/Y", time());

        $today = date("Y-m-d", time());
        $aWeek = date("Y-m-d", strtotime($today . '+ 1 week'));
        $aWeekAgo = date("Y-m-d", strtotime($today . '- 2 week'));
        $aMonth = date("Y-m-d", strtotime($today . '+ 1 month'));

        $licensesWeek = License::whereBetween('due_date', [$today, $aWeek])
            ->get();
        $licensesMonth = License::whereBetween('due_date', [$today, $aMonth])
            ->get();
        $licensesExpired = License::whereBetween('due_date', [$aWeekAgo, $today])
            ->get();

        $servicesWeek = Service::whereBetween('delivery_date', [$today, $aWeek])
            ->get();
        $servicesMonth = Service::whereBetween('delivery_date', [$today, $aMonth])
            ->get();


        return view('dashboard', compact('todayDate', 'licensesWeek', 'licensesMonth', 'servicesWeek', 'servicesMonth', 'licensesExpired'));
    }
}
