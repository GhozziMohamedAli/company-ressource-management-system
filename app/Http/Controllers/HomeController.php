<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branche;
use App\Models\Employee;
use App\Models\Store;
use App\Models\Computer;
use App\Models\Car;
use App\Models\Extinguisher;
use App\Models\Institution;

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
        $branche=  Branche::all()->count();
        $employee= Employee::where('status',2)->count();
        $store=   Store::all()->count();
        $computer=  Computer::where('status',2)->count();
        $car= Car::where('car_meter','disabled')->count();
        $extinguisher= Extinguisher::all()->count();
        $institution= Institution::all()->count();
        return view('dashboard.dashboard',[
        "branche"=>$branche,
        'employee'=>$employee,
        'store'=>$store,
        'computer'=>$computer,
        'car'=>$car,
        'extinguisher'=>$extinguisher,
        'institution'=>$institution
    ]);
    }
}
