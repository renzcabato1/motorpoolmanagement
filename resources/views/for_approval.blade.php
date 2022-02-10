@extends('layouts.header')

@section('content')


<div class="wrapper wrapper-content">
@if(session()->has('status'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{session()->get('status')}}
</div>
@endif
@include('error')
    <div class="row">
        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>For Approval
                        {{-- <button class="btn btn-primary" data-target="#new_request" data-toggle="modal" type="button"><i class="fa fa-plus-circle"></i>&nbsp;</button> --}}
                    </h5>
                    <div ibox-tools></div>
                </div>
                <div class="ibox-content">

                    <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                {{-- <th>Logo</th> --}}
                                <th>Request Number</th>
                                <th>Request Date</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Equipment Class</th>
                                <th>Date Needed / Time Needed</th>
                                <th>Project ID</th>
                                <th>Area</th>
                                <th>Location</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
       
    </div>
  
</div>
@endsection
