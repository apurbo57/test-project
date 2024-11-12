@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{route('dashboard')}}">Dashboard</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">All Message</a></li>
</ul>
@include('includes.message')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Message List</h2>
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
                      <th>Serial No.</th>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                @php($i=1)
                @foreach ($data as $datas)
                    
                <tr>
                    <td>{{ $i }}</td>
                    <td class="center">{{ $datas->created_at->format('d-m-Y') }}</td>
                    <td class="center">{{ $datas->first_name }} {{ $datas->last_name }}</td>
                    <td class="center">{{ $datas->phone }}</td>
                    <td class="center">{{ $datas->email }}</td>
                    <td class="center">{{ $datas->message }}</td>
                    <td class="center">
                        <form action="{{route('admin.delete-message',$datas->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit()" href="{{route('admin.delete-message',$datas->id)}}">
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