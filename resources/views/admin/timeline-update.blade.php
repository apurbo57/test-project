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
            <a href="">Update Timeline</a>
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
                <form class="form-horizontal" action="{{route('admin.update.timeline')}}" method="post">
                    @csrf
                    @method('put')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="timeline">Timeline Notice</label>
                            <div class="controls">
                                <input type="text" class="span12 typeahead" name="timeline" value="{{old('timeline',$timeline->timeline)}}" id="timeline" >
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Teacher</button>
                            <a href="{{ url()->previous() }}" class="btn">Cancel</a>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
