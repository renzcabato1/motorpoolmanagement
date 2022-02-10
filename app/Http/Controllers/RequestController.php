<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function requests()
    {
        $header = "Requests";
        $subheader = "";
        return view('requests', 
        array(
            'header' => $header,
            'subheader' => $subheader,
        )
        );
    }
}
