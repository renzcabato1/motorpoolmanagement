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
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>New
                        {{-- <button class="btn btn-primary" data-target="#new_fuel" data-toggle="modal" type="button"><i class="fa fa-plus-circle"></i>&nbsp;</button> --}}
                    </h5>
                    <div ibox-tools></div>
                </div>
                <div class="ibox-content">

                    <form method='post' action='new-fuel' onsubmit='show();' autocomplete="off"  enctype="multipart/form-data" >
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class='row'>
                                <div class='col-md-6'>
                                    Date :
                                    <input type="date" class="input-sm form-control"  name="date_fuel" id='date_fuel' autocomplete="off" max="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required/>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    Equipment :
                                    <select name='equipment_category' class='form-control-sm form-control category' onchange='start_data(value)' required>
                                        <option value=""></option>
                                        @foreach($equipments as $key => $equipment )
                                            <option value='{{$equipment->id}}-{{$key}}'>{{$equipment->company->company_code}}-{{$equipment->category->category_code}}-{{$equipment->class->class_code}}-{{str_pad($equipment->equipment_number, 4, '0', STR_PAD_LEFT)}} / {{$equipment->plate_number}} / {{$equipment->conduction_sticker}}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                Location of Fuel Station :
                                    <select name='location' class='form-control-sm form-control category'  required>
                                        <option value=""></option>
                                        @foreach($locations as $key => $location )
                                            <option value='{{$location->id}}'>{{$location->location}}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                Driver Name :
                                    <input type="text" class="input-sm form-control"  name="driver_name" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                Total Liters :
                                    <input type="number" class="input-sm form-control"  name="total_liters" step='0.01' min='0.01' autocomplete="off" required/>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                Previous Odometer :
                                    <input type="text" class="input-sm form-control"  name="starting_odometer" id='starting_odometer'  autocomplete="off" readonly/>
                                </div>
                                <div class='col-md-6'>
                                Ending Odometer :
                                    <input type="number" class="input-sm form-control"  name="ending_odometer"  id='ending_odometer'  step='0' min='0' autocomplete="off" required/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type='submit'  class="btn btn-primary" >Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Fuels
                        {{-- <button class="btn btn-primary" data-target="#new_fuel" data-toggle="modal" type="button"><i class="fa fa-plus-circle"></i>&nbsp;</button> --}}
                    </h5>
                    <div ibox-tools></div>
                </div>
                <div class="ibox-content">

                    <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Company</th>
                            <th>Equipment</th>
                            <th>Driver Name</th>
                            <th>Total Liters</th>
                            <th>Ending Odometer</th>
                            <th>Encode By</th>
                            <th>Location</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($fuels as $fuel)
                                <tr>
                                    <td>{{date('M d, Y',strtotime($fuel->date_fuel))}}</td>
                                    <td>{{$fuel->equipment->company->company_code}}</td>
                                    <td>{{$fuel->equipment->company->company_code}}-{{$fuel->equipment->category->category_code}}-{{$fuel->equipment->class->class_code}}-{{str_pad($fuel->equipment->equipment_number, 4, '0', STR_PAD_LEFT)}} <br> {{$fuel->equipment->plate_number}} <br> {{$fuel->equipment->conduction_sticker}}</td>
                                    <td>{{$fuel->driver_name}}</td>
                                    <td>{{number_format($fuel->liters,2)}} L</td>
                                    <td>{{number_format($fuel->ending_odometer)}} KM</td>
                                    <td>{{$fuel->user->name}}</td>
                                    <td>{{$fuel->locations->location}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@include('new_fuel')
@endsection
