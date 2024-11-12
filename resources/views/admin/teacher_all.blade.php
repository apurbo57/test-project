@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{route('dashboard')}}">Dashboard</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">All Teachers</a></li>
</ul>
@include('includes.message')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Teachers List</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>Serial No</th>
                      <th>Teacher Name</th>
                      <th>Designation</th>
                      <th>Type</th>
                      <th>Phone</th>
                      <th>E-mail</th>
                      <th>Image</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                @php($i=1)
                @foreach ($data as $datas)

                <tr>
                    <td>{{ $i }}</td>
                    <td class="center">{{ $datas->name }}</td>
                    <td class="center">{{ $datas->designation }}</td>
                    <td class="center" style="text-transform: capitalize">{{ $datas->type }}</td>
                    <td class="center">{{ $datas->phone }}</td>
                    <td class="center">{{ $datas->email }}</td>
                    <td>
                        <img width="60px" height="60px" src="{{ asset('uploads/teacher/'. $datas->image) }}" alt="">
                    </td>
                    <td class="center">
                        <form action="{{route('admin.delete-teacher',$datas->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-info" href="{{route('admin.edit-teacher',$datas->id)}}"><i class="halflings-icon white edit"></i></a>
                            <a class="btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit()" href="{{route('admin.delete-teacher',$datas->id)}}">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </form>
                    </td>
                </tr>
                @php($i++)
                @endforeach
              </tbody>
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
