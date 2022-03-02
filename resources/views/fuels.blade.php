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
                    <h5>Fuels
                        <button class="btn btn-primary" data-target="#new_fuel" data-toggle="modal" type="button"><i class="fa fa-plus-circle"></i>&nbsp;</button>
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
                            <th>Action</th>
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
                                    <td></td>
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
