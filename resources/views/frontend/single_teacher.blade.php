@extends('frontend.components.layouts')
@section('content')
<div class="blog-list-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-8 col-md-12">
        <div class="about-content single-sidebar">
          <img src="{{asset('uploads/teacher/'.$teacher->image)}}" class="card-img-top" alt="Image" style="width:350px; height:350px; margin:0 auto;">
          <h4>{{$teacher->name}}</h4>
          <p>@php echo html_entity_decode($teacher->description) @endphp</p>
          
          <a href="#" class=""><i class="fa fa-phone"></i>(+880) {{$teacher->phone}}</a>
          <a href="#" class=""><i class="fa fa-envelope"></i> {{$teacher->email}}</a>
        </div>
      </div>
          <div class="col-xl-4 col-lg-4 col-md-12">
            <div class="blog-right ">
            <div class="widget widget-thumb single-sidebar blog-single">
            <h3>Latest Notice</h3>
            <ul class="thumb_post">
                @foreach ($notices as $item)                     
                <li>
                <img src="{{asset('images/notice.jpg')}}" alt="Notice">
                <h4><a href="{{route('single-notice',$item->id)}}">{{$item->title}}</a></h4>
                <p class="post-date">{{ $item->created_at->format('d-m-Y') }}</p>
                </li>
                @endforeach

            <a href="{{route('notice')}}" class="btn-primary p-1">See More</a>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection