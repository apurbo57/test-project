@extends('admin_layout')

@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{route('dashboard')}}">Dashboard</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="{{route('admin.add-course')}}">Add Course</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Course</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.save-course')}}" method="post" enctype="multipart/form-data">
          @csrf
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Course Name</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="course_name" value="{{Request::old('course_name')}}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Trainer Name</label>
                    <div class="controls">
                      <select class="form_control" name="teacher_id" id="">
                          <option value="#">Select Your Trainer</option>
                          @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }} , {{ $teacher->designation }}</option>
                          @endforeach
                          
                      </select> 
                    </div>
                </div> 
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Course Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="course_description" id="textarea2" rows="2">{{Request::old('course_description')}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Course Image</label>
                  <div class="controls">
                    <input type="file" class="span6 typeahead" name="course_image" id="typeahead" value="{{Request::old('course_image')}}" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Course Price</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="course_price" placeholder="00.00" id="typeahead" value="{{Request::old('course_price')}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Registration Deadline</label>
                  <div class="controls">
                    <input type="date" class="span6 typeahead" name="reg_date" id="typeahead" value="{{Request::old('reg_date')}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Assessment Date</label>
                  <div class="controls">
                    <input type="date" class="span6 typeahead" name="ass_date" id="typeahead" value="{{Request::old('ass_date')}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Batch No</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="batch_no" placeholder="00" id="typeahead" value="{{Request::old('batch_no')}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">No. of Classes/ Sessions</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="classes" id="typeahead" value="{{Request::old('classes')}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Course Type</label>
                  <div class="controls">
                    <label class="radio">
                    <input type="radio" name="course_type" id="optionsRadios1" value="1" checked="">
                    Regular
                    </label>
                    <div style="clear:both"></div>
                    <label class="radio">
                    <input type="radio" name="course_type" id="optionsRadios2" value="2">
                    RPL
                    </label>
                  </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Course</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection