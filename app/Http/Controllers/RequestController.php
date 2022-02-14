<?php

namespace App\Http\Controllers;
use App\ClassEquipment;
use App\User;
use App\RequestData;
use App\RequestHistory;
use App\Notifications\RequestAction;
use App\Notifications\ApproveAction;
use App\Notifications\DeclineAction;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function requests()
    {
        $classes = ClassEquipment::with('category')->get();
        $requests = RequestData::with('user','company','department','class')
        ->where('user_id',auth()->user()->id)
        ->where('status','Pending')
        ->orderBy('id','desc')
        ->get();
        // dd($requests)
        $header = "Requests";
        $subheader = "";
        return view('requests', 
        array(
            'header' => $header,
            'subheader' => $subheader,
            'classes' => $classes,
            'requests' => $requests,
        )
        );
    }
    public function for_approval()
    {
        $requests = RequestData::with('user','company','department','class')
        ->where('approver_id',auth()->user()->id)
        ->where('status','Pending')
        ->orderBy('id','desc')
        ->get();
        $header = "For Approval";
        $subheader = "";
        return view('for_approval', 
        array(
            'header' => $header,
            'subheader' => $subheader,
            'requests' => $requests,
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

    public function new_request(Request $request)
    {
        // dd($request->date_start);
        $date_start_array = explode("-",$request->date_start);
        $date_start = $date_start_array[2]."-".$date_start_array[0]."-".$date_start_array[1];
        $date_end_array = explode("-",$request->date_end);
        $date_end = $date_end_array[2]."-".$date_end_array[0]."-".$date_end_array[1];
        // $reque = ;
        $data_final_array = explode("*",$request->equipment_category);
        $data_final = $data_final_array[0];
        $data_final_data = $data_final_array[1];
        // dd($data_final_data);
        $req = new RequestData;
        $req->user_id = auth()->user()->id;
        $req->company_id = auth()->user()->company->id;
        $req->department_id = auth()->user()->department->id;
        $req->approver_id = $request->approver_id;
        $req->class_id = $data_final;
        $req->is_project = $request->project;
        $req->project_id = $request->project_id;
        $req->date_from_needed = $date_start;
        $req->date_to_needed = $date_end;
        $req->time_from_needed = $request->time_from;
        $req->time_to_needed = $request->time_to;
        $req->location = $request->location;
        $req->area = $request->area;
        $req->remarks = $request->remarks;
        $req->status = "Pending";
        $req->save();

        $history = new RequestHistory;
        $history->request_data_id = $req->id;
        $history->action = "Create Request";
        $history->user_id = auth()->user()->id;
        $history->save();

        $approver = User::where('id',$request->approver_id)->first();
        $requestor = User::where('id',auth()->user()->id)->first();
        $approver->notify(new RequestAction($req,$requestor,$data_final_data));

        $request->session()->flash('status','Successfully created');
        return back();
        // dd($req);
        // $req->
        
    }

    public function cancel_request(Request $request)
    {
        $req = RequestData::where('id',$request->id)->first();
        $req->status = "Cancelled";
        $req->save();

        $history = new RequestHistory;
        $history->request_data_id = $request->id;
        $history->action = "Cancelled Request";
        $history->user_id = auth()->user()->id;
        $history->save();

        return "success";
    }

    public function edit_request(Request $request,$id)
    {
        
         // dd($request->date_start);
         $date_start_array = explode("-",$request->date_start);
         $date_start = $date_start_array[2]."-".$date_start_array[0]."-".$date_start_array[1];
         $date_end_array = explode("-",$request->date_end);
         $date_end = $date_end_array[2]."-".$date_end_array[0]."-".$date_end_array[1];
         // $reque = ;
         $data_final_array = explode("*",$request->equipment_category);
         $data_final = $data_final_array[0];
         $data_final_data = $data_final_array[1];
         // dd($data_final_data);
         $req = RequestData::where('id',$id)->first();
         $req->user_id = auth()->user()->id;
         $req->company_id = auth()->user()->company->id;
         $req->department_id = auth()->user()->department->id;
         $req->approver_id = $request->approver_id;
         $req->class_id = $data_final;
         $req->is_project = $request->project;
         $req->project_id = $request->project_id;
         $req->date_from_needed = $date_start;
         $req->date_to_needed = $date_end;
         $req->time_from_needed = $request->time_from;
         $req->time_to_needed = $request->time_to;
         $req->location = $request->location;
         $req->area = $request->area;
         $req->remarks = $request->remarks;
        //  $req->status = "Pending";
         $req->save();
 
         $history = new RequestHistory;
         $history->request_data_id = $id;
         $history->action = "Edit Request";
         $history->user_id = auth()->user()->id;
         $history->save();

         $request->session()->flash('status','Successfully updated');

         return back();
    }
    public function approve_request(Request $request)
    {
        $req = RequestData::where('id',$request->id)->first();
        $req->status = "Approved";
        $req->save();

        $re = User::where('id',$req->user_id)->first();
        $re->notify(new ApproveAction($req));
        $history = new RequestHistory;
        $history->request_data_id = $request->id;
        $history->action = "Approved Request";
        $history->user_id = auth()->user()->id;
        $history->remarks = $request->remarks;
        $history->save();
        return "success";
    }
    public function declined_request(Request $request)
    {
        $req = RequestData::where('id',$request->id)->first();
        $req->status = "Declined";
        $req->save();

        $re = User::where('id',$req->user_id)->first();
        $re->notify(new DeclineAction($req,$request));




        $history = new RequestHistory;
        $history->request_data_id = $request->id;
        $history->action = "Declined Request";
        $history->user_id = auth()->user()->id;
        $history->remarks = $request->remarks;
        $history->save();
        return "success";
    }
}
