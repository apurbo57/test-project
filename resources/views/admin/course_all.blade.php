@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{route('dashboard')}}">Dashboard</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">All Product</a></li>
</ul>
@include('includes.message')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Product List</h2>
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
                      <th>Course Name</th>
                      <th>Course Price</th>
                      <th>Reg. Deadline</th>
                      <th>Assessment Date</th>
                      <th>Batch No</th>
                      <th>Classes</th>
                      <th>Image</th>
                      <th>Course Type</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                @php($i=1)
                @foreach ($data as $datas)
                    
                <tr>
                    <td>{{ $i }}</td>
                    <td class="center">{{ $datas->course_name }}</td>
                    <td class="center">{{ $datas->course_price }}</td>
                    <td class="center">{{ $datas->reg_date }}</td>
                    <td class="center">{{ $datas->ass_date }}</td>
                    <td class="center">{{ $datas->batch_no }}</td>
                    <td class="center">{{ $datas->classes }}</td>
                    <td>
                        <img width="60px" height="60px" src="{{ asset('uploads/course/'. $datas->image) }}" alt="">
                    </td>
                    <td class="center">
                        @if ($datas->course_type==1)
                        <span class="label label-success">Regular</span>
                        @else
                        <span class="label label-danger">RPL</span>
                        @endif
                        
                    </td>
                    <td class="center">
                        {{-- @if ($datas->status==0)
                                <a class="btn btn-success" href="{{route('p_active-status',$datas->id)}}">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                        @else 
                            <a class="btn btn-danger" href="{{route('p_inactive-status',$datas->id)}}">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                        @endif --}}
                        
                        
                        <form action="{{route('admin.delete-course',$datas->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-info" href="{{route('admin.edit-course',$datas->id)}}"><i class="halflings-icon white edit"></i></a>
                            <a class="btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit()" href="{{route('admin.delete-course',$datas->id)}}">
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