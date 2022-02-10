@extends('layouts.header')

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">as of Today</span>
                    <h5>Equipments</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{count($equipments)}}</h1>
                    {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                    <small>Total equipments</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Today</span>
                    <h5>Active Equipment</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$active_equipment}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning pull-right">Today</span>
                    <h5>For Repair Equipment</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$for_repair_equipment}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Today</span>
                    <h5> Equipment</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$inactive_equipment}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
    </div>
   
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Equipment per Company</h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <canvas id="barChart" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Line Chart Example
                            <small>With custom colors.</small>
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <canvas id="lineChart" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Polar Area</h5>

                    </div>
                    <div class="ibox-content">
                        <div class="text-center">
                            <canvas id="polarChart" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pie </h5>

                    </div>
                    <div class="ibox-content">
                        <div>
                            <canvas id="doughnutChart" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Radar Chart Example</h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <canvas id="radarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>
<script>
     var companies = {!! json_encode($companies->toArray()) !!};
                var comp = [];
                for(var i =0;i< companies.length;i++)
                {   
                    comp[i] = companies[i].company_code;
                }
                var barData = {
                    labels: comp,
                    datasets: [
                        {
                            label: "Total Equipment",
                            backgroundColor: 'rgba(220, 220, 220, 0.5)',
                            pointBorderColor: "#fff",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "Active Equipment",
                            backgroundColor: 'rgba(26,179,148,0.5)',
                            borderColor: "rgba(26,179,148,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        {
                            label: "For Repair Equipment",
                            backgroundColor: 'rgba(224, 163, 133,0.5)',
                            borderColor: "rgba(255, 153, 102,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        {
                            label: "Disposed Equipment",
                            backgroundColor: 'rgba(255, 128, 128,0.5)',
                            borderColor: "rgba(255, 0, 0,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },

                    ]
                };

                var barOptions = {
                    responsive: true
                };

                var ctx2 = document.getElementById("barChart").getContext("2d");
                    
    </script>
@endsection
