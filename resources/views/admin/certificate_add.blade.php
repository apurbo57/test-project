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
            <a href="#">Add Certificate</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Certificate</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.save-certificate')}}" method="post">
          @csrf
              <fieldset>
                  <div class="control-group">
                      <label class="control-label" for="typeahead">Regestration Number</label>
                      <div class="controls">
                        <input type="number" class="span6 typeahead" name="reg_no" value="20180" value="{{Request::old('title')}}" id="typeahead" >
                      </div>
                    </div>
                  <div class="control-group">
                      <label class="control-label" for="typeahead">Student Name</label>
                      <div class="controls">
                        <input type="text" class="span6 typeahead" name="student_name" value="{{Request::old('title')}}" id="typeahead" >
                      </div>
                    </div>
                  <div class="control-group">
                      <label class="control-label" for="typeahead">Course Name</label>
                      <div class="controls">
                        <input type="text" class="span6 typeahead" name="course_name" value="{{Request::old('title')}}" id="typeahead" >
                      </div>
                    </div>
                <div class="control-group">
                  <label class="control-label" for="textarea2">About</label>
                  <div class="controls">
                    <textarea class="cleditor" name="description" id="textarea2" rows="5">This is to certify that Tohin Ujjaman Masum son of Khokan Miah & Marjiya has successfully
                            completed (360) hours long training course on Refrigeration and Air conditioning trade from
                            01 January 2023 to 30 April 2023 at Shilmandi Youth Development Training Center,
                            Narsingdi.{{Request::old('description')}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Certificate Type</label>
                    <div class="controls">
                      <label class="radio">
                      <input type="radio" name="certificate_type" id="optionsRadios1" value="1" checked="">
                      Regular
                      </label>
                      <div style="clear:both"></div>
                      <label class="radio">
                      <input type="radio" name="certificate_type" id="optionsRadios2" value="2">
                      RPL
                      </label>
                    </div>
                    </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Certificate</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection