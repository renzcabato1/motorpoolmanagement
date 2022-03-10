<?php

namespace App\Http\Controllers;
use App\Fuel;
use PDF;
use App\EquipmentData;
use App\Location;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    //
    public function view_fuel()
    {
        $fuels = Fuel::where('user_id',auth()->user()->id)->with('equipment','user')->get();
        $locations = Location::where('status',"Active")->get();
        $equipments = EquipmentData::with('category','class','company','brand','insurance','fuel')->get();
        return view('fuels',
        array(
            'subheader' => '',
            'header' => "Fuels",
            'fuels' => $fuels,
            'equipments' => $equipments,
            'locations' => $locations,
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
        if($request->starting_odometer != "No previous data")
        {
            $fuel->previous_odometer = $request->starting_odometer;
        }
        $fuel->user_id = auth()->user()->id;
        $fuel->save();
        $request->session()->flash('status','Successfully created');
        return back();
    }
    public function fuel_report (Request $request)
    {
        $fuels = Fuel::where('equipment_id',$request->equipment_category)->whereBetween('date_fuel',[$request->date_from,$request->date_to])->with('equipment','user')->get();
        $equipments = EquipmentData::with('category','class','company','brand','insurance','fuel')->get();
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $equipment_id = $request->equipment_category;
        return view('fuel_report',
        array(
            'subheader' => '',
            'header' => "Fuel Monitoring Report",
            // 'fuels' => $fuels,
            'fuels' => $fuels,
            'equipments' => $equipments,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'equipment_id' => $equipment_id,
        ));
    }
    public function export_report(Request $request)
    {
        $equipment = EquipmentData::where('id',$request->equipment_category)->with('category','class','company','brand','insurance','fuel')->first();
        $fuels = Fuel::where('equipment_id',$request->equipment_category)->whereBetween('date_fuel',[$request->date_from,$request->date_to])->with('equipment','user')->get();
       
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $equipment_id = $request->equipment_category;
        $pdf = PDF::loadView('fuel_monitoring_report',array(
            'date_from' => $date_from,
            'date_to' => $date_to,
            'equipment_id' => $equipment_id,
            'equipment' => $equipment,
            'fuels' => $fuels,
            
        ));
        return $pdf->stream('fuel_monitoring_report.pdf');
    }
}
