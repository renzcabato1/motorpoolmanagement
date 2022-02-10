<?php

namespace App\Http\Controllers;
use App\EquipmentData;
use App\Company;
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
        $header = "Dashboard";
        $subheader = "";

        $equipments = EquipmentData::get();
        $companies = Company::get();
        $active_equipment = EquipmentData::where('status','OPERATIONAL')->count();
        $for_repair_equipment = EquipmentData::where('status','Breakdown')->count();
        $inactive_equipment = EquipmentData::where('status','Disposal')->count();
        return view('home', 
        array(
            'header' => $header,
            'companies' => $companies,
            'subheader' => $subheader,
            'equipments' => $equipments,
            'active_equipment' => $active_equipment,
            'inactive_equipment' => $inactive_equipment,
            'for_repair_equipment' => $for_repair_equipment,
        )
        );
    }
}
