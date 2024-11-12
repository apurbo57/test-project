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
            <a href="{{route('admin.edit-teacher',$teacher->id)}}">Edit Teacher</a>
        </li>
    </ul>
<div class="row-fluid sortable">
  @include('includes.message')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Teacher</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        <form class="form-horizontal" action="{{route('admin.update-teacher',$teacher->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Teacher Name</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="name" value="{{$teacher->name}}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Designation</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="designation" value="{{$teacher->designation}}" id="typeahead" >
                  </div>
                </div>
                <div class="control-group">
                        <label class="control-label" for="typeahead">Phone</label>
                        <div class="controls">
                          <input type="number" class="span6 typeahead" name="phone" value="{{$teacher->phone}}" id="typeahead" >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="typeahead">E-mail</label>
                        <div class="controls">
                          <input type="email" class="span6 typeahead" name="email" value="{{$teacher->email}}" id="typeahead" >
                        </div>
                      </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="description" id="textarea2" rows="2">{{$teacher->description}}</textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Image</label>
                  <div class="controls">
                    <img src="{{ asset('uploads/teacher/'. $teacher->image) }}" width="300px" height="120px" alt="Image"> <br>
                    <input type="file" class="span6 typeahead" name="image" id="typeahead" >
                  </div>
                </div>

                  <div class="control-group">
                      <label class="control-label" for="typeahead">Type</label>
                      <div class="controls">
                          <select name="type" id="type" class="form-control">
                              <option {{ old('type',$teacher->type) == 'chairman' ? 'selected' :''  }} value="chairman">Chairman</option>
                              <option {{ old('type',$teacher->type) == 'director' ? 'selected' :''  }} value="director">Director</option>
                              <option {{ old('type',$teacher->type) == 'principle' ? 'selected' :''  }} value="principle">Principle</option>
                              <option {{ old('type',$teacher->type) == 'instructor' ? 'selected' :''  }} value="instructor">Instructor</option>
                              <option {{ old('type',$teacher->type) == 'staff' ? 'selected' :''  }} value="staff">Staff</option>
                          </select>
                      </div>
                  </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Teacher</button>
                  <a href="{{ url()->previous() }}" class="btn">Cancle</a>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
