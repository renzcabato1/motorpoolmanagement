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
                    <h1 class="no-margins">{{($all_request)}}</h1>
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
                    <h1 class="no-margins">{{$pending_requests}}</h1>
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
                    <h1 class="no-margins">{{$approved_requests}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">as of Today</span>
                    <h5>Declined Requests</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$declined_requests}}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>&nbsp;</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                    {{-- <span class="pull-right text-right">
                    <small>Average value of sales in the past month in: <strong>United states</strong></small>
                        <br/>
                        All sales: 162,862
                    </span> --}}
                        <h3 class="font-bold no-margins">
                            Equipments per Company
                        </h3>
                        {{-- <small>Sales marketing.</small> --}}
                    </div>

                    <div class="m-t-sm">

                        <div class="row">
                            <div class="col-md-9">
                                <div>
                                    <canvas id="barChart" height="120"></canvas>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <ul class="stat-list m-t-lg">
                                    <li>
                                        <h2 class="no-margins">{{$active_equipment}}</h2>
                                        <small>Total Active Equipments</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" style="width: {{($active_equipment/count($equipments)*100)}}%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">{{$for_repair_equipment}}</h2>
                                        <small>For Repair Equipments</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar progress-bar-warning" style="width: {{($for_repair_equipment/count($equipments)*100)}}%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">{{$inactive_equipment}}</h2>
                                        <small>Disposal</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar progress-bar-danger" style="width: {{($inactive_equipment/count($equipments)*100)}}%;"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
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
    </div> --}}

</div>
<script>
    

                
                    
    </script>
     <script src="{{ asset('bootstrap/js/jquery-3.1.1.min.js') }}"></script>
       <script src="{{ asset('bootstrap/js/plugins/chartJs/Chart.min.js') }}"></script>
       <script>
          var companies = {!! json_encode($companies->toArray()) !!};
     var equipments = {!! json_encode($equipments->toArray()) !!};
     var active_equipment = {!! json_encode($active_equipment) !!};
     var for_repair_equipment = {!! json_encode($for_repair_equipment) !!};
     var inactive_equipment = {!! json_encode($inactive_equipment) !!};
    //  console.log(active_equipment);
    //  console.log(companies);
                var comp = [];
                var active_per_comp = [];
                var inactive_per_comp = [];
                var total_per_comp = [];
                var repair_per_comp = [];
                for(var i =0;i< companies.length;i++)
                {   
                    comp[i] = companies[i].company_code;
                    var active_comp = 0;
                    var total_comp = 0;
                    var inactive_comp = 0;
                    var repair_comp = 0;
                    for(var z=0;z< equipments.length;z++)
                    {
                        // console.log(active_equipment[z].company_id);
                        if((companies[i].id == equipments[z].company_id))
                        {
                            total_comp = total_comp + 1;
                        }
                        if((companies[i].id == equipments[z].company_id) && (equipments[z].status == "Operational"))
                        {
                            active_comp = active_comp + 1;
                        }
                        if((companies[i].id == equipments[z].company_id) && (equipments[z].status == "Disposal"))
                        {
                            inactive_comp = inactive_comp + 1;
                        }
                        if((companies[i].id == equipments[z].company_id) && (equipments[z].status == "Breakdown"))
                        {
                            repair_comp = repair_comp + 1;
                        }
                    }
                    
                    active_per_comp[i] = active_comp;
                    inactive_per_comp[i] = inactive_comp;
                    total_per_comp[i] = total_comp;
                    repair_per_comp[i] = repair_comp;
                }
                console.log(companies);
                var barData = {
                    labels: comp,
                    
                    datasets: [
                        {
                            label: "Total Equipment",
                            backgroundColor: 'rgba(220, 220, 220, 0.5)',
                            pointBorderColor: "#fff",
                            data: total_per_comp,
                            
                        },
                        {
                            label: "Active Equiement",
                            backgroundColor: 'rgba(26,179,148,0.5)',
                            borderColor: "rgba(26,179,148,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: active_per_comp
                        },
                        {
                            label: "For Repair Equipment",
                            backgroundColor: 'rgba(224, 163, 133,0.5)',
                            borderColor: "rgba(255, 153, 102,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: repair_per_comp
                        },
                        {
                            label: "Disposed Equipment",
                            backgroundColor: 'rgba(255, 128, 128,0.5)',
                            borderColor: "rgba(255, 0, 0,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: inactive_per_comp
                        },

                    ]
                };

                var barOptions = {
                    responsive: true,
                    
                };

                var ctx2 = document.getElementById("barChart").getContext("2d");
                
                new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});
          
       </script>
@endsection
