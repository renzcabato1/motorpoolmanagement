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
        $fuels = Fuel::with('equipment','user')->get();
        $equipments = EquipmentData::with('category','class','company','brand','insurance','fuel')->get();
        return view('fuels',
        array(
            'subheader' => '',
            'header' => "Fuels",
            'fuels' => $fuels,
            'equipments' => $equipments,
        ));
    }
    public function new_fuel(Request $request)
    {
        
        $equipment = explode("-",$request->equipment_category);
        $fuel = new Fuel;
        $fuel->equipment_id = $equipment[0];
        $fuel->date_fuel = $request->date_fuel;
        $fuel->location = $request->location;
        $fuel->driver_name = $request->driver_name;
        $fuel->liters = $request->total_liters;
        $fuel->ending_odometer = $request->ending_odometer;
        $fuel->user_id = auth()->user()->id;
        $fuel->save();
        $request->session()->flash('status','Successfully created');
        return back();
    }
}
