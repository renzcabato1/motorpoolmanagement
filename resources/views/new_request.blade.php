
<div class="modal" id="new_request" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">New Request ({{date('F d, Y')}})</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='post' action='new-request' onsubmit='show();'  enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-4'>
                            Name : {{Auth::user()->name}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            Company : {{Auth::user()->company->company_name}}({{Auth::user()->company->company_code}})
                        </div>
                        <div class='col-md-6'>
                            Department : {{Auth::user()->department->department_name}}({{Auth::user()->department->department_code}})
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            Approver : {{Auth::user()->approver->name}}
                        </div>
                    </div>
                    <hr>
                    <div class='row'>
                        <div class='col-md-6'>
                            Equipment Class :
                            <select name='equipment_category' class='form-control-sm form-control category' onchange="class_select(this.value)" required>
                                <option value=""></option>
                                @foreach($classes as $key => $class )
                                    @if($class->status)
                                    @else
                                    <option value='{{$class->id}}-{{$class->category_id}}-{{$key}}'>{{$class->class_code}} - {{$class->class_description}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class='col-md-3 text-right'>
                            &nbsp;<br>
                            <label> <input type="checkbox" id='project' name="project" onchange="project_control()"  value="1"> Is Project?</label>
                        </div>
                        <div class='col-md-3'>
                            Project ID : 
                            <input type="text" class="form-control-sm form-control "  id='project_id' value="{{ old('project_id') }}"  name="project_id" readonly/>
                        </div>
                    </div>
                    <Br>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class="form-group" id="data_5">
                                <label class="font-normal">Date Needed</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" onkeydown="return false" name="start" autocomplete="off" value="" required/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" onkeydown="return false" name="end" autocomplete="off" value="" required/>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group" >
                                <label class="font-normal"> Time Needed</label>
                                <div class="row">
                                    <div class='col-md-5'>
                                        <input type="time"   class="input-sm form-control" name="time_from" required >
                                    </div>
                                    to
                                    <div class='col-md-5'>
                                        <input type="time"  class="input-sm form-control" name="time_to" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            Location : 
                             <input type="text" class="form-control-sm form-control "  id='location' value="{{ old('location') }}"  name="location" required/>
                        </div>
                        <div class='col-md-6'>
                            Area : 
                            <select name='area' class='form-control-sm form-control category' required>
                                <option value=""></option>
                                <option value="Luzon">Luzon</option>
                                <option value="Visayas">Visayas</option>
                                <option value="Mindanao">Mindanao</option>
                            </select>    
                        </div>
                    </div>
                    <Br>
                        <div class='row'>
                            <div class='col-md-12'>
                                Remarks : 
                                <textarea class='form-control' name='remarks' required></textarea>
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
    function project_control()
    {
        var check = $('#project').is(':checked'); 
        if(check == true)
        {
            $("#project_id").attr("readonly", false); 
            $("#project_id").prop('required',true);
        }
        else
        {
            $("#project_id").attr("readonly", true); 
            $("#project_id").prop('required',false);
        }
    }
</script>