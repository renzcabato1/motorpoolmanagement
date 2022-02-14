<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="shortcut icon" href="{{asset('images/front-logo.png')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- FooTable -->
    <link href="{{ asset('bootstrap/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/plugins/footable/footable.core.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/plugins/blueimp/css/blueimp-gallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('bootstrap/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('bootstrap/css/plugins/switchery/switchery.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">
    
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
            -moz-appearance:textfield;
        }
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{ asset('/images/3.gif')}}") 50% 50% no-repeat rgb(249,249,249) ;
            opacity: .8;
            background-size:200px 120px;
        }
        @media (min-width: 768px) {
            .modal-xl {
                width: 100%;
                max-width:1700px;
            }
        }
        body {
  /* font-weight: bold; */
  color:black;
}
    </style>
</head>
<body >
    
    <div id = "myDiv" style="display:none;" class="loader">
    </div>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle bg-light" style='width:54px  ;height:54px;' src="{{'images/no_image.png'}}"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                                <span class="text-muted text-xs block"><b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                {{-- <li><a class="dropdown-item" href="profile.html">Profile</a></li> --}}
                                {{-- <li class="dropdown-divider"></li> --}}
                                <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="logout(); show();">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            MMS
                        </div>
                    </li>
                    <li @if($header == 'Dashboard') class='active' @endif>
                        <a href="{{ url('/home') }}" class='active' onclick='show()' ><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                    </li>
                    <li @if($header == 'Requests') class='active' @endif>
                        <a href="{{ url('/requests') }}" class='active' onclick='show()' ><i class="fa fa-clipboard"></i> <span class="nav-label">Requests</span> </a>
                    </li>
                    <li @if($header == 'For Approval') class='active' @endif>
                        <a href="{{ url('/for-approval') }}" class='active' onclick='show()' ><i class="fa fa-check-circle-o"></i> <span class="nav-label">For Approval</span> </a>
                    </li>
                    <li @if($header == 'For Dispatch') class='active' @endif>
                        <a href="{{ url('/for-dispatch') }}" class='active' onclick='show()' ><i class="fa fa-send-o"></i> <span class="nav-label">For Dispatch</span> </a>
                    </li>
                    <li @if($header == 'Equipments') class='active' @endif>
                        <a href="{{ url('/equipments') }}" class='active' onclick='show()' ><i class="fa fa-truck"></i> <span class="nav-label">Equipments</span> </a>
                    </li>
                    <li @if($header == 'Brands') class='active' @endif>
                        <a href="{{ url('/brands') }}" class='active' onclick='show()' ><i class="fa fa-car"></i> <span class="nav-label">Brands</span> </a>
                    </li>
                    <li @if($header == 'Companies') class='active' @endif>
                        <a href="{{ url('/companies') }}" class='active' onclick='show()' ><i class="fa fa-list-ul"></i> <span class="nav-label">Companies</span> </a>
                    </li>
                    <li @if($header == 'Users') class='active' @endif>
                        <a href="{{ url('/users') }}" class='active' onclick='show()' ><i class="fa fa-user"></i> <span class="nav-label">Users</span> </a>
                    </li>
                    <li @if($header == 'Equipment Class') class='active' @endif>
                        <a href="{{ url('/class-equipment') }}" class='active' onclick='show()' ><i class="fa fa-list-alt"></i> <span class="nav-label">Equipment Class</span> </a>
                    </li>
                   
                  
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to {{ config('app.name', 'Laravel') }}.</span>
                        </li>
                        
                        <li>
                            <a href="{{ route('logout') }}"  onclick="logout(); show();">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <form id="logout-form"  action="{{ route('logout') }}"  method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>{{$header}}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">{{$header}}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>{{$subheader}}</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            
            @yield('content')
        </div>
        {{-- <script> --}}
            <script type='text/javascript'>
                function show()
                {
                    document.getElementById("myDiv").style.display="block";
                }
                function logout()
                {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                }
            </script>
           
            <script src="{{ asset('bootstrap/js/jquery-3.1.1.min.js') }}"></script>
            <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
            {{-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> --}}
            <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
            
            <!-- Peity -->
            <script src="{{ asset('bootstrap/js/plugins/peity/jquery.peity.min.js') }}"></script>
            
            <!-- Custom and plugin javascript -->
     
            
            <!-- iCheck -->
            <script src="{{ asset('bootstrap/js/plugins/iCheck/icheck.min.js') }}"></script>
            
            <script src="{{ asset('bootstrap/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
            <!-- Peity -->
            <script src="{{ asset('bootstrap/js/demo/peity-demo.js') }}"></script>
            <!-- Chosen -->
            <script src="{{ asset('bootstrap/js/plugins/chosen/chosen.jquery.js') }}"></script>
            <!-- Flot -->
            <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.spline.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.resize.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.pie.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.time.js') }}"></script>
            <link href="{{ asset('bootstrap/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
            <!-- Peity -->
            {{-- <script src="{{ asset('bootstrap/js/plugins/peity/jquery.peity.min.js') }}"></script> --}}
            <!-- FooTable -->
            {{-- <script src="{{ asset('bootstrap/js/plugins/footable/footable.all.min.js') }}"></script> --}}
            
            <!-- Custom and plugin javascript -->
            <script src="{{ asset('bootstrap/js/inspinia.js') }}"></script>
            <script src="{{ asset('bootstrap/js/plugins/pace/pace.min.js') }}"></script>
            
         
            <!-- jQuery UI -->
            <script src="{{ asset('bootstrap/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
            {{-- <script src="{{ asset('bootstrap/js/plugins/touchpunch/jquery.ui.touch-punch.min.js') }}"></script> --}}
             
                <script src="{{ asset('bootstrap/js/plugins/dataTables/datatables.min.js') }}"></script>
                <script src="{{ asset('bootstrap/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
                <!-- EayPIE -->
                {{-- <script src="{{ asset('bootstrap/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script> --}}
                
                <!-- Sparkline -->
                {{-- <script src="{{ asset('bootstrap/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script> --}}
                
                <!-- Sparkline demo data  -->
                {{-- <script src="{{ asset('bootstrap/js/demo/sparkline-demo.js') }}"></script> --}}
                
                <!-- Switchery -->
                {{-- <script src="{{ asset('bootstrap/js/plugins/switchery/switchery.js') }}"></script> --}}
                <!-- Input Mask-->
                {{-- <script src="{{ asset('bootstrap/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script> --}}
                {{-- <script src="{{ asset('bootstrap/js/plugins/summernote/summernote-bs4.js') }}"></script> --}}
                
                <!-- blueimp gallery -->
                <script src="{{ asset('bootstrap/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
                
                <!-- Jquery Validate -->
                {{-- <script src="{{ asset('bootstrap/js/plugins/validate/jquery.validate.min.js') }}"></script> --}}
                    <!-- Date range picker -->
                    
                <script src="{{ asset('bootstrap/js/plugins/daterangepicker/daterangepicker.js') }}"></script>

                   <!-- Data picker -->
                <script src="{{ asset('bootstrap/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

                <script src="{{ asset('bootstrap/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
                
                <!-- Flot demo data -->
                {{-- <script src="{{ asset('bootstrap/js/demo/flot-demo.js') }}"></script> --}}
                <script>
                //   
                    
                    $(document).ready(function () {
                      
                    });
                    $('.category').chosen({width: "100%"});
                     $(".touchspin1").TouchSpin({
                        buttondown_class: 'btn btn-white',
                        buttonup_class: 'btn btn-white',
                        min: 1,
                    });

                    $(".touchspin2").TouchSpin({
                        min: 0,
                        max: 100000000000000000000000,
                        step: 0.01,
                        decimals: 2,
                        buttondown_class: 'btn btn-white',
                        buttonup_class: 'btn btn-white'
                    });
                    
                    $(document).ready(function()
                    {
                        
                   
                        var invalidChars = ["-", "e", "+", "E"];

                        $("input[type='number']").on("keydown", function(e){ 
                            if(invalidChars.includes(e.key)){
                                e.preventDefault();
                            }
                        });
                        var d = ("{{date('m-d-Y')}}");
                        var dateToday = new Date();
                        $('#data_5 .input-daterange').datepicker({
                            
                            keyboardNavigation: false,
                            forceParse: false,
                            autoclose: true,
                            format: 'mm-dd-yyyy',
                            startDate: '-0m',
                           
                        });
                        $('.dataTables-example').DataTable({
                            // lengthMenu: [[10, 25, 50,-1], [10, 25, 50,"All"]],
                            pageLength: -1,
                            pagging: false,
                            scrollY: true,
                            responsive: true,
                            searching: true,
                            ordering: true,
                            lengthChange: false,
                            info: false,
                            dom: "lfrti"
                           
                            
                        });
                        // var indexLastColumn = $(".company-report").find('tr')[0].cells.length-1;
  
                 
                     
                    });
                  
                        $("body").on("click",".deactivate-brand",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to deactivate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, deactivate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'deactivate-brand',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        console.log(data);
                                        // c_obj.remove();
                                        // var id = $("#" + id + " > .firstname").html();
                                        // alert(newusername
                                        swal("Deactivated!", "Brand has been deactivated.", "success");
                                    });
                                    document.getElementById('statustd'+id).innerHTML = "<small class='label label-danger'>Inactive</small>";
                                    document.getElementById('actiontd'+id).innerHTML = "<button class='btn btn-sm btn-primary activate-brand' title='Activate'><i class='fa fa-check'></i></button>";
                                    swal("Deactivated!", "Brand has been deactivated.", "success");
                                
                                }
                                // alert(id);
                                // $('#'+table).find('tr#'+rowId).find('td:eq(colNum)').html(newValue);
                                

                            });

                        });
                        $("body").on("click",".deactivate-insurance",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to deactivate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, deactivate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'deactivate-insurance',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        console.log(data);
                                        // c_obj.remove();
                                        // var id = $("#" + id + " > .firstname").html();
                                        // alert(newusername
                                        swal("Deactivated!", "Insurance has been deactivated.", "success");
                                    });
                                    document.getElementById('statusinsurancetd'+id).innerHTML = "<small class='label label-danger'>Inactive</small>";
                                    document.getElementById('actioninsurancetd'+id).innerHTML = "<button class='btn btn-sm btn-primary activate-insurance' title='Activate'><i class='fa fa-check'></i></button>";
                                    swal("Deactivated!", "Insurance has been deactivated.", "success");
                                
                                }
                                // alert(id);
                                // $('#'+table).find('tr#'+rowId).find('td:eq(colNum)').html(newValue);
                             

                            });

                        });
                        $("body").on("click",".remove-request",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to cancel this request?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, cancel it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'cancel-request',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        console.log(data);
                                        // c_obj.remove();
                                        // var id = $("#" + id + " > .firstname").html();
                                        // alert(newusername
                                        swal("Cancelled!", "Request has been cancelled.", "success");
                                    });
                                    $('#row'+id).remove();
                                swal("Cancelled!", "Request has been cancelled.", "success");

                                
                                }
                             
                            });

                        });
                        $("body").on("click",".deactivate-user",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to deactivate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, deactivate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'deactivate-user',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        console.log(data);
                                        // c_obj.remove();
                                        // var id = $("#" + id + " > .firstname").html();
                                        // alert(newusername
                                        swal("Deactivated!", "User has been deactivated.", "success");
                                    });
                                    document.getElementById('statususer'+id).innerHTML = "<small class='label label-danger'>Inactive</small>";
                                document.getElementById('actionuser'+id).innerHTML = "<button class='btn btn-sm btn-primary activate-user' title='Activate'><i class='fa fa-check'></i></button>";
                                swal("Deactivated!", "User has been deactivated.", "success");
                                
                                }
                                // alert(id);
                                // $('#'+table).find('tr#'+rowId).find('td:eq(colNum)').html(newValue);
                               

                            });

                        });
                        $("body").on("click",".deactivate-company",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to deactivate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, deactivate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'deactivate-company',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        console.log(data);
                                        swal("Deactivated!", "Company has been deactivated.", "success");
                                    });
                                    document.getElementById('statuscompanytd'+id).innerHTML = "<small class='label label-danger'>Inactive</small>";
                                document.getElementById('actioncompanytd'+id).innerHTML = "<button class='btn btn-sm btn-primary activate-company' title='Activate'><i class='fa fa-check'></i></button>";
                                swal("Deactivated!", "Company has been deactivated.", "success");
                                
                                }
                               

                            });

                        });
                        $("body").on("click",".deactivate-class",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to deactivate this?",
                                // text: "You will not be able to recover this!",
                                input: 'textarea',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, deactivate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'deactivate-class',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        console.log(data);
                                        swal("Deactivated!", "Class has been deactivated.", "success");
                                    });
                                    document.getElementById('statusclass'+id).innerHTML = "<small class='label label-danger'>Inactive</small>";
                                document.getElementById('actionclasstd'+id).innerHTML = "<button class='btn btn-sm btn-primary activate-class' title='Activate'><i class='fa fa-check'></i></button>";
                                swal("Deactivated!", "Class has been deactivated.", "success");

                                
                                }
                               
                            });

                        });
                        $("body").on("click",".deactivate-category",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to deactivate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, deactivate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'deactivate-category',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        console.log(data);
                                        swal("Deactivated!", "Category has been deactivated.", "success");
                                    });
                                    document.getElementById('statuscategory'+id).innerHTML = "<small class='label label-danger'>Inactive</small>";
                                    document.getElementById('actioncategorytd'+id).innerHTML = "<button class='btn btn-sm btn-primary activate-category' title='Activate'><i class='fa fa-check'></i></button>";
                                    swal("Deactivated!", "Category has been deactivated.", "success");
                                
                                }
                               

                            });

                        });
                        $("body").on("click",".activate-brand",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to Activate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, Activate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'activate-brand',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        // c_obj.remove();
                                        swal("Activated!", "Brand has been Activated.", "success");
                                    });
                                    document.getElementById('statustd'+id).innerHTML = "<small class='label label-primary'>Active</small>";
                                var buttons = "<button class='btn btn-sm btn-info'  title='Edit' data-target='#editBrand"+id+"' data-toggle='modal'><i class='fa fa-edit'></i></button>&nbsp;";
                                    buttons += "<button class='btn btn-sm btn-danger deactivate-brand' title='Deactivate' ><i class='fa fa-trash'></i></button>";
                                document.getElementById('actiontd'+id).innerHTML = buttons;
                             
                                swal("Activated!", "Brand has been Activated.", "success");
                                
                                }

                              

                            });

                        });
                        $("body").on("click",".activate-user",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to Activate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, Activate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'activate-user',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        // c_obj.remove();
                                        swal("Activated!", "User has been Activated.", "success");
                                    });
                                    document.getElementById('statususer'+id).innerHTML = "<small class='label label-primary'>Active</small>";
                                var buttons = "<button class='btn btn-sm btn-info'  title='Edit' data-target='#editUser"+id+"' data-toggle='modal'><i class='fa fa-edit'></i></button>&nbsp;";
                                    buttons += "<button class='btn btn-sm btn-danger deactivate-user' title='Deactivate' ><i class='fa fa-trash'></i></button>";
                                document.getElementById('actionuser'+id).innerHTML = buttons;
                             
                                swal("Activated!", "User has been Activated.", "success");
                                
                                }

                                

                            });

                        });
                        $("body").on("click",".approve-request",function(){
                            $('#approved_request').modal('show'); 
                            var id = $(this).parent("td").data('id');
                            $('#id_row').val(id);
                            $('#remarks').val("");
                         

                        });
                        $("body").on("click",".declined-request",function(){
                            $('#declined_request').modal('show'); 
                            var id = $(this).parent("td").data('id');
                            $('#id_row_declined').val(id);
                            $('#remarks_declined').val("");
                         

                        });
                        $("body").on("click",".activate-category",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to Activate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, Activate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'activate-category',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        // c_obj.remove();
                                        swal("Activated!", "Category has been Activated.", "success");
                                    });
                                    document.getElementById('statuscategory'+id).innerHTML = "<small class='label label-primary'>Active</small>";
                                var buttons = "<button class='btn btn-sm btn-info'  title='Edit' data-target='#editCategory"+id+"' data-toggle='modal'><i class='fa fa-edit'></i></button>&nbsp;";
                                    buttons += "<button class='btn btn-sm btn-danger deactivate-category' title='Deactivate' ><i class='fa fa-trash'></i></button>";
                                document.getElementById('actioncategorytd'+id).innerHTML = buttons;
                             
                                swal("Activated!", "Category has been Activated.", "success");

                                
                                }

                               
                            });

                        });
                        $("body").on("click",".activate-class",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to Activate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, Activate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'activate-class',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        // c_obj.remove();
                                        swal("Activated!", "Class has been Activated.", "success");
                                    });
                                    document.getElementById('statusclass'+id).innerHTML = "<small class='label label-primary'>Active</small>";
                                var buttons = "<button class='btn btn-sm btn-info'  title='Edit' data-target='#editClass"+id+"' data-toggle='modal'><i class='fa fa-edit'></i></button>&nbsp;";
                                    buttons += "<button class='btn btn-sm btn-danger deactivate-class' title='Deactivate' ><i class='fa fa-trash'></i></button>";
                                document.getElementById('actionclasstd'+id).innerHTML = buttons;
                             
                                swal("Activated!", "Brand has been Activated.", "success");
                                
                                }

                               

                            });

                        });
                        $("body").on("click",".activate-company",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to Activate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, Activate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'activate-company',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        // c_obj.remove();
                                        swal("Activated!", "Company has been Activated.", "success");
                                    });
                                    
                                document.getElementById('statuscompanytd'+id).innerHTML = "<small class='label label-primary'>Active</small>";
                                var buttons = "<button class='btn btn-sm btn-info'  title='Edit' data-target='#editCompany"+id+"' data-toggle='modal'><i class='fa fa-edit'></i></button>&nbsp;";
                                    buttons += "<button class='btn btn-sm btn-danger deactivate-company' title='Deactivate' ><i class='fa fa-trash'></i></button>";
                                document.getElementById('actioncompanytd'+id).innerHTML = buttons;
                             
                                swal("Activated!", "Brand has been Activated.", "success");
                                
                                }


                            });

                        });
                        $("body").on("click",".activate-insurance",function(){
                            // var base_path = location.hostname;
                            var id = $(this).parent("td").data('id');
                            // alert(id);
                            swal({
                                title: "Are you sure you want to Activate this?",
                                // text: "You will not be able to recover this!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, Activate it!",
                                closeOnConfirm: false
                            }, function (isConfirm) {
                                // alert(isConfirm);
                                if(isConfirm == true)
                                {
                                    // $("#"+id).remove();
                                    $.ajax({
                                        dataType: 'json',
                                        type:'POST',
                                        url:  'activate-insurance',
                                        data:{id:id},
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    }).done(function(data){
                                        // c_obj.remove();
                                        swal("Activated!", "Insurance has been Activated.", "success");
                                    });
                                    document.getElementById('statusinsurancetd'+id).innerHTML = "<small class='label label-primary'>Active</small>";
                                var buttons = "<button class='btn btn-sm btn-info'  title='Edit' data-target='#editInsurance"+id+"' data-toggle='modal'><i class='fa fa-edit'></i></button>&nbsp;";
                                    buttons += "<button class='btn btn-sm btn-danger deactivate-insurance' title='Deactivate' ><i class='fa fa-trash'></i></button>";
                                document.getElementById('actioninsurancetd'+id).innerHTML = buttons;
                             
                                swal("Activated!", "Brand has been Activated.", "success");
                                
                                }

                               

                            });

                        });
                    
                </script>
            </body>
            </html>
            