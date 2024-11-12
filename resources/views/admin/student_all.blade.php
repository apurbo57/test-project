@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{route('dashboard')}}">Dashboard</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">All RPL Students</a></li>
</ul>
@include('includes.message')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All RPL Students List</h2>
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
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>E-mail</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Trans. Id</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                @php($i=1)
                    @foreach ($data as $datas)

                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td class="center">{{ $datas->nameE }}</td>
                            <td class="center">{{ $datas->email }}</td>
                            <td class="center" style="text-transform: capitalize">{{ $datas->phone }}</td>
                            <td class="center">{{ $datas->email }}</td>
                            <td>
                                <img width="60px" height="60px" src="{{ asset('uploads/rpl/'. $datas->image) }}" alt="">
                            </td>
                            <td class="center"><a href="{{route('student.rpl.updateStatus',$datas->id)}}">

                                    <span class="{{ $datas->status == 'approved' ? 'text-success' : 'text-danger'  }}"><strong>{{ $datas->status }}</strong></span>
                                </a></td>
                                <td>
                                    {{$datas->transaction_id}}
                                </td>

                            <td class="center">
                                <form id="student_delete_form" action="{{route('student.rpl.destroy',$datas->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <a  target="_blank" class="btn btn-info" href="{{route('student.rpl.stream',$datas->id)}}">View</a>
                                <a  target="_blank" class="btn btn-info" href="{{asset('uploads/rpl/'.$datas->signature)}}">Signature</a>
                                <a  target="_blank" class="btn btn-info" href="{{asset('uploads/rpl/'.$datas->nid_image)}}">NID</a>
                                <a  target="_blank" class="btn btn-info" href="{{asset('uploads/rpl/'.$datas->work_certificate)}}">Work</a>
                                <a  target="_blank" class="btn btn-info" href="{{asset('uploads/rpl/'.$datas->writen_description)}}">Detail</a>

                                <a class="btn btn-danger" onclick="document.getElementById('student_delete_form').submit()">
                                    <i class="halflings-icon white trash"></i>
                                </a>
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
