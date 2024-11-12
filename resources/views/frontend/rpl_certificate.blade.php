@extends('frontend.components.layouts')
@section('content')
<style>
.notice-board-main-wrapper> h1 {
    margin-bottom: 20px;
}
.notice-board-main-wrapper> h1 span {
    color: #FF5722;
}
.notice-board-header {
    border-bottom: 0px;
    background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(24,211,250,1) 100%);
    color: #fff;
}
.main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
</style>
<div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="notice-board-main-wrapper">
                        <h1 class="text-center">RPL<span>Certificate</span></h1>
                </div>
                <div class="main">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" id="rpl_search" class="form-control" placeholder="Search">
                        </div>
                </div>
                <table class="table regular_table">
                    <thead class="notice-board-header">
                        <tr>
                            <th scope="col">Reg. ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                            
                            @foreach ($data as $datas)
                            <tr>
                                <td>{{ $datas->reg_id }}</td>
                                <td>{{ $datas->student_name }}</td>
                                <td>{{ $datas->course_name }}</td>
                                <td><a class="btn-primary p-1 rounded" target="blank" href="{{route('rpl-certificate-download',$datas->id)}}">Download</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <div id="search_list"></div> 
                </table>
                <div class="pagination">
                        <div class="align-center">{{ $data->links('pagination::bootstrap-4') }} </div>
                </div>
          </div>
          </div>
        </div>
        <script>
                $(document).ready(function(){
                 $('#rpl_search').on('keyup',function(){
                     var query= $(this).val();
                     $.ajax({
                        url:"rpl_search",
                        type:"GET",
                        data:{'search':query},
                        success:function(data){
                            $('#search_list').html(data);
                            $('.regular_table').hide();
                        }
                 });
                 //end of ajax call
                });
                });
            </script>
@endsection