<?php

namespace App\Http\Controllers;
use App\Fuel;
use App\EquipmentData;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    //
    public function view_fuel()
    {
        $fuels = Fuel::get();
        $equipments = EquipmentData::with('category','class','company','brand','insurance')->get();
        return view('fuels',
        array(
            'subheader' => '',
            'header' => "Fuel",
            'fuels' => $fuels,
            'equipments' => $equipments,
        ));
    }
}
