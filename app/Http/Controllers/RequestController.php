<?php

namespace App\Http\Controllers;
use App\ClassEquipment;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function requests()
    {
        $classes = ClassEquipment::with('category')->get();
        $header = "Requests";
        $subheader = "";
        return view('requests', 
        array(
            'header' => $header,
            'subheader' => $subheader,
            'classes' => $classes,
        )
        );
    }
    public function for_approval()
    {
        $header = "For Approval";
        $subheader = "";
        return view('for_approval', 
        array(
            'header' => $header,
            'subheader' => $subheader,
        )
        );
    }
    public function for_dispatch()
    {
        $header = "For Dispatch";
        $subheader = "";
        return view('for_dispatch', 
        array(
            'header' => $header,
            'subheader' => $subheader,
        )
        );
    }
}
