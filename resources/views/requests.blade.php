@extends('layouts.header')

@section('content')


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">as of Today</span>
                    <h5>Total Requests</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" >{{($all_request)}}</h1>
                    {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning pull-right">as of Today</span>
                    <h5> Pending Requests</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id='pending_request'>{{$pending_requests}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">as of Today</span>
                    <h5>Approved Requests</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" >{{$approved_requests}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">as of Today</span>
                    <h5>Declined/Cancelled Requests</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id='declined_request'>{{$declined_requests}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
    </div>
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
                {{-- <div class="ibox-title">
                    <h5>Requests
                        <button class="btn btn-primary" data-target="#new_request" data-toggle="modal" type="button"><i class="fa fa-plus-circle"></i>&nbsp;</button>
                    </h5>
                    <div ibox-tools></div>
                </div> --}}
                <h5>Requests
                    <button class="btn btn-primary" data-target="#new_request" data-toggle="modal" type="button"><i class="fa fa-plus-circle"></i>&nbsp;</button>
                </h5>
                <div class="ibox-content">
                    <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                {{-- <th>Logo</th> --}}
                                <th>Request Number</th>
                                <th>Requestor</th>
                                <th>Equipment Class</th>
                                <th>Date Needed / Time Needed</th>
                                <th>Project ID</th>
                                <th>Area</th>
                                <th>Location</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>   
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                                <tr id='row{{$request->id}}'  @if($request->status != "Pending") class='pointer' data-target="#view_request{{$request->id}}" @endif data-toggle="modal" data-id='{{$request->id}}'>
                                    {{-- <th>Logo</th> --}}
                                    <td>RN-{{str_pad($request->id, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>
                                        <small>
                                            {{$request->user->name}}
                                            <br>
                                            {{$request->company->company_name}}
                                            <br>
                                            {{$request->department->department_name}}
                                    </td>
                                    <td>{{$request->class->class_description}}</td>
                                    <td>
                                        <small>
                                            Date : {{date('M d, Y',strtotime($request->date_from_needed))}} - {{date('M d, Y',strtotime($request->date_to_needed))}} <br>
                                            Time : {{date('h:m a',strtotime($request->time_from_needed))}} - {{date('h:m a',strtotime($request->time_to_needed))}}
                                        </small>
                                    </td>
                                    <td>@if($request->project){{$request->project->project_id}}@endif</td>
                                    <td>{{$request->area}}</td>
                                    <td>{{$request->location}}</td>
                                    <td>{!! nl2br(e($request->remarks)) !!}</td>
                                    <td id='statusRow{{$request->id}}'><small class='label label'>{{$request->status}}</small></td>
                                {{-- <th><small class="label label-warning">Pending</small></th> --}}
                                    <td data-id='{{$request->id}}' id='actionRow{{$request->id}}'>
                                        @if($request->status == "Pending")
                                        {{-- <button class="btn btn-sm btn-info approve-request"  title='Approve Request' ><i class="fa fa-check-square-o"></i></button> --}}
                                        <button class="btn btn-sm btn-info"  title='Edit' data-target="#edit_request{{$request->id}}" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger remove-request" title='Cancel' ><i class="fa fa-trash"></i></button>
                                        @else
                                        
                                        @endif
                                    </td>
                                </tr>
                            @include('view_request_re')
                            @include('edit_request') 
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
       
    </div>
    @include('new_request')
</div>
@endsection
