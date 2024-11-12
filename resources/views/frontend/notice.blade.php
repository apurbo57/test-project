@extends('frontend.components.layouts')
@section('content')
<style>
.notice-board-main-wrapper> h1 {
    margin-bottom: 20px;
}

element.style {
}
.notice-board-main-wrapper> h1 span {
    color: #FF5722;
}
.notice-bord-table-wrapper {
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    background-color: #fff;
    width: 100%;
    box-sizing: border-box;
}
.notice-body.notice-board-header {
    border-bottom: 0px;
    background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(24,211,250,1) 100%);
    color: #fff;
}
.notice-body {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
    padding: 8px;
    align-items: center;
}
.notice-date-div, .notice-title-div, .notice-read-div {
    flex: 1;
    text-align: center;
    font-weight: bold;
    font-size: 16px;
}
.notice-read-div a {
    display: inline-block;
    background: linear-gradient(174deg, #0071cb, #00BCD4);
    box-shadow: 0px 2px 5px -2px #000;
    color: #fff;
    text-decoration: none !important;
    font-weight: normal;
    box-sizing: border-box;
    padding: 2px 13px;
    border-radius: 10px;
}
.notice-read-div a:hover {
    background: red;
}
@media only screen and (max-width: 767px) {


    .notice-date-div, .notice-title-div, .notice-read-div {
    flex: 1;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
}


}
</style>
<div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="main-contentxt-wrapper">
                        <div class="notice-board-main-wrapper">
                            <h1 class="text-center">Notice<span>Board</span></h1>
                            <!-- start notice board -->
                            <div class="notice-bord-table-wrapper">
                                <!-- notice header -->
                                <div class="notice-body notice-board-header">
                                    <div class="notice-date-div">
                                        Date
                                    </div>
                                    <div class="notice-title-div">
                                        Notice
                                    </div>
                                    <div class="notice-read-div">
                                        Link
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                    <!-- start notice body -->
                    @foreach ($data as $datas)
                    <div class="notice-body">
                        <div class="notice-date-div">{{ $datas->created_at->format('d-m-Y') }} </div>
                        <div class="notice-title-div">{{ $datas->title }}</div>
                        <div class="notice-read-div">
                            <a href="{{route('single-notice',$datas->id)}}">Read More</a>
                        </div>
                    </div>
                    @endforeach
                    <!-- end notice body -->
                        <!-- Pagination -->
                        <div class="pagination">
                                <div class="align-center">{{ $data->links('pagination::bootstrap-4') }} </div>
                        </div>
            
                    </div>
          </div>
          </div>
        </div>
@endsection