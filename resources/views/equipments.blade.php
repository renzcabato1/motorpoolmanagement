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
                    <h5>Equipments
                        <button class="btn btn-primary" data-target="#new_equipment" data-toggle="modal" type="button"><i class="fa fa-plus-circle"></i></button>
                    </h5>
                    <div ibox-tools></div>
                </div>
                <div class="ibox-content">

                    <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Brand</th>
                            <th>Owned By</th>
                            <th>Registration</th>
                            <th>Insurance</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($equipments as $equip)
                            <tr>
                                <td style='text-align: center;'  > 
                                    {{$equip->company->company_code}}-{{$equip->category->category_code}}-{{$equip->class->class_code}}-{{str_pad($equip->equipment_number, 4, '0', STR_PAD_LEFT)}}
                                </td >
                                <td > 
                                    
                                </td >
                                <td > 
                                    {{$equip->company->company_name}}
                                </td >
                                <td > 
                                    {{-- Registristation Number: {{$equip->registration_number}} <br> --}}
                                    {{-- Validaty Date : {{date('F d, Y',strtotime($equip->date_of_registration))}} - {{date('F d, Y',strtotime($equip->date_of_expiration))}}</small> --}}
                                </td >
                                <td > 
                                     {{-- Insurance Company : {{$equip->insurance->company}}  <br> --}}
                                     {{-- Insurance Policy Number : {{$equip->insurance_policy_number}}  <br> --}}
                                     {{-- Validaty Date : {{date('F d, Y',strtotime($equip->insured_from))}} - {{date('F d, Y',strtotime($equip->insured_to))}} --}}
                                </td >
                                <td > 
                                </td >
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
       
    </div>
  
</div>
  @include('new_equipment')
@endsection
