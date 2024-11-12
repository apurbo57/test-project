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
            <a href="{{route('admin.add-course')}}">Add Teacher</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Teacher</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.save-teacher')}}" method="post" enctype="multipart/form-data">
          @csrf
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Teacher Name</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="name" value="{{Request::old('name')}}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Designation</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="designation" value="{{Request::old('designation')}}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Phone</label>
                  <div class="controls">
                    <input type="number" class="span6 typeahead" name="phone" value="{{Request::old('phone')}}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">E-mail</label>
                  <div class="controls">
                    <input type="email" class="span6 typeahead" name="email" value="{{Request::old('email')}}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Teacher Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="description" id="textarea2" rows="2">{{Request::old('description')}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Image</label>
                  <div class="controls">
                    <input type="file" class="span6 typeahead" name="image" id="typeahead" value="{{Request::old('image')}}" >
                  </div>
                </div>
                  <div class="control-group">
                      <label class="control-label" for="typeahead">Type</label>
                      <div class="controls">
                          <select name="type" id="type" class="form-control">
                              <option {{ old('type') == 'chairman' ? 'selected' :''  }} value="chairman">Chairman</option>
                              <option {{ old('type') == 'director' ? 'selected' :''  }} value="director">Director</option>
                              <option {{ old('type') == 'principle' ? 'selected' :''  }} value="principle">Principle</option>
                              <option {{ old('type') == 'instructor' ? 'selected' :''  }} value="instructor">Instructor</option>
                              <option {{ old('type') == 'staff' ? 'selected' :''  }} value="staff">Staff</option>
                          </select>
                      </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Teacher</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
