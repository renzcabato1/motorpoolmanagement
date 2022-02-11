
<div class="modal" id="edit_request{{$request->id}}" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">Edit Request</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <form method='post' action='edit-request/{{$request->id}}' onsubmit='show();'  enctype="multipart/form-data" >
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
                            <select name='equipment_category' class='form-control-sm form-control category' required>
                                <option value=""></option>
                                @foreach($classes as $key => $class )
                                    @if($class->status)
                                    @else
                                    <option value='{{$class->id}}*{{$class->class_description}}' @if($class->id == $request->class_id) selected @endif>{{$class->class_code}} - {{$class->class_description}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type='hidden' name='approver_id' value='{{Auth::user()->approver->id}}'>
                        </div>
                        <div class='col-md-3 text-right'>
                            &nbsp;<br>
                            <label> <input type="checkbox" id='project{{$request->id}}' name="project" onchange="project_control_edit({{$request->id}})" @if($request->is_project == 1) checked @endif  value="1"> Is Project?</label>
                        </div>
                        <div class='col-md-3'>
                            Project ID : 
                            <input type="text" class="form-control-sm form-control "  id='project_id{{$request->id}}' value="{{$request->project_id}}"  name="project_id"  @if($request->is_project == 1) required @else readonly @endif />
                        </div>
                    </div>
                    <Br>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class="form-group" id="data_5">
                                <label class="font-normal">Date Needed</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" onkeydown="return false" name="date_start" autocomplete="off" value="{{date('m-d-Y',strtotime($request->date_from_needed))}}" required/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" onkeydown="return false" name="date_end" autocomplete="off" value="{{date('m-d-Y',strtotime($request->date_to_needed))}}" required/>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group" >
                                <label class="font-normal"> Time Needed</label>
                                <div class="row">
                                    <div class='col-md-5'>
                                        <input type="time"   class="input-sm form-control" name="time_from"  value="{{$request->time_from_needed}}" required >
                                    </div>
                                    to
                                    <div class='col-md-5'>
                                        <input type="time"  class="input-sm form-control" name="time_to" value="{{$request->time_to_needed}}" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            Location : 
                             <input type="text" class="form-control-sm form-control " value="{{$request->location}}"  name="location" required/>
                        </div>
                        <div class='col-md-6'>
                            Area : 
                            <select name='area' class='form-control-sm form-control category' required>
                                <option value=""></option>
                                <option value="Luzon" @if($request->area == "Luzon") selected @endif>Luzon</option>
                                <option value="Visayas" @if($request->area == "Visayas") selected @endif>Visayas</option>
                                <option value="Mindanao" @if($request->area == "Mindanao") selected @endif>Mindanao</option>
                            </select>    
                        </div>
                    </div>
                    <Br>
                        <div class='row'>
                            <div class='col-md-12'>
                                Remarks : 
                                <textarea class='form-control' name='remarks' required>{{$request->remarks}}</textarea>
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
    function project_control_edit(id)
    {
        var check = $('#project'+id).is(':checked'); 
        if(check == true)
        {
            $("#project_id"+id).attr("readonly", false); 
            $("#project_id"+id).prop('required',true);

        }
        else
        {
            $("#project_id"+id).attr("readonly", true); 
            $("#project_id"+id).prop('required',false);
            $('#project_id'+id).val('');  
        }
    }
</script>