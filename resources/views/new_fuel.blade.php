
<div class="modal" id="new_fuel" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">New</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='post' action='new-fuel' onsubmit='show();' autocomplete="off"  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-6'>
                            Equipment :
                            <select name='equipment_category' class='form-control-sm form-control category' onchange='start_data(value)' required>
                                <option value=""></option>
                                @foreach($equipments as $key => $equipment )
                                    <option value='{{$equipment->id}}-{{$key}}'>{{$equipment->company->company_code}}-{{$equipment->category->category_code}}-{{$equipment->class->class_code}}-{{str_pad($equipment->equipment_number, 4, '0', STR_PAD_LEFT)}} / {{$equipment->plate_number}} / {{$equipment->conduction_sticker}}</option>
                                
                                @endforeach
                            </select>
                        </div>
                        <div class='col-md-6'>
                            Date :
                            <input type="date" class="input-sm form-control"  name="date_fuel" id='date_fuel' autocomplete="off" max="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required/>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                        Location of Fuel Station :
                            <input type="text" class="input-sm form-control"  name="location" autocomplete="off" required/>
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
<script>
    var equipments = {!! json_encode($equipments->toArray()) !!};
    function start_data(data)
    {
        var d = data.split('-');
        var fuel = equipments[d[1]].fuel;
        
        if(fuel.length == 0)
        {
            document.getElementById("date_fuel").min = "";
            document.getElementById("starting_odometer").value = "No previous data";
            document.getElementById("ending_odometer").min = "";
        }
        else
        {
            console.log(fuel[0].date_fuel);
            document.getElementById("date_fuel").min = fuel[0].date_fuel;
            document.getElementById("starting_odometer").value = fuel[0].ending_odometer;
            document.getElementById("ending_odometer").min = fuel[0].ending_odometer;
        }
    }
</script>