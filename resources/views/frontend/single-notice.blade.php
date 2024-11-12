@extends('frontend.components.layouts')
@section('content')

{{-- single notice area --}}
<div class="blog-list-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12">
          <div class="about-content single-sidebar">
            <h4>{{$notice->title}}</h4>
            <p>@php echo html_entity_decode($notice->notice) @endphp</p>
          </div>
        </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
              <div class="blog-right ">
              <div class="widget widget-thumb single-sidebar blog-single">
              <h3>Latest Notice</h3>
              <ul class="thumb_post">

                    @foreach ($notices as $item)                     
                    <li>
                    <img src="{{asset('images/notice.jpg')}}" alt="">
                    <h4><a href="{{route('single-notice',$item->id)}}">{{$item->title}}</a></h4>
                    <p class="post-date">{{ $item->created_at->format('d-m-Y') }}</p>
                    </li>
                    @endforeach
              </ul>
              <a href="{{route('notice')}}" class="btn-primary p-1">See More</a>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection