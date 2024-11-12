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
            <a href="#">Edit Count Down</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Count Down</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.update-countdown',$data->id)}}" method="post">
          @csrf
          @method('put')
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" for="typeahead">Batches</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="batches" value="{{ $data->batches }}" id="typeahead" >
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="typeahead">Student</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="student" value="{{ $data->student }}" id="typeahead" >
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="typeahead">Job Placement</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="jobplacement" value="{{ $data->jobplacement }}" id="typeahead" >
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="typeahead">Skilled Trainer</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="trainer" value="{{ $data->trainer }}" id="typeahead" >
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Count Down</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection