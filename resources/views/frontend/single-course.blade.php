@extends('frontend.components.layouts')
@section('content')


<div class="training-details-area">
        <div class="container">
        <div class="row">
        <div class="col-xl-12">
        <div class="traning-details-header">
        <style>
                                    .traning-details-header .h3{
                                        color: #fff;
                                        font-size: 28px;
                                    }
                                    @media (min-width: 768px) and (max-width: 991px){
                                        .traning-details-header .h3 {
                                            font-size: 20px;
                                        }
                                    }
                                    @media (max-width: 767px){
                                        .traning-details-header .h3 {
                                            font-size: 18px;
                                        }
                                    }
                                </style>
        
        <h1 class="h2 font-weight-bold text-center">{{ $course->course_name }}</h1>
        <div class="row">
        <div class="col-sm-6">
        <ul>
            <li>
            <i class="far fa-clock"></i><span>Registration Deadline :</span> {{ $course->reg_date }}
            </li>
        <li>
        <i class="fa fa-calendar"></i><span>Assessment Date :</span> {{ $course->ass_date }}
        </li>
        </ul>
        </div>
        <div class="col-sm-6">
        <ul>
        <li><i class="fa fa-users" aria-hidden="true" style="margin-right: 13px;"></i></i><span>Batch No : {{ $course->batch_no }}</span></li>
        <li>
                <i class="fas fa-stopwatch"></i><span>No. of Classes/ Sessions :</span> {{ $course->classes }}
                </li>
        </ul>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        
        <div class="training-details-content-area">
        <div class="container">
        <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12">
        <div class="traning-content">
        <img src="{{ asset('uploads/course/'. $course->image) }}" alt="Computer Operation- Level 03 (NSDA)" loading="lazy">
        <a type="button" class="btn mobile-fixed-btn small-text" href="#mobile-fixed">apply</a>
        <h4>Introduction</h4>
        <div>@php echo html_entity_decode($course->course_description) @endphp</div>


        {{-- <h5><span>Prerequisites :</span> MS Word, MS Excel, MS PowerPoint, Basic Internet, Basic Computer.</h5>
        <h5><span>Training Modules :</span></h5> --}}
        {{-- <div class="faq">
        <div class="accordion" id="accordionExample">
        <div class="card">
        <div class="card-header" id="heading3823">
        <h2 class="mb-0">
        <a class="btn-link btn-link-1 collapsed" type="button" data-toggle="collapse" data-target="#collapse3823" aria-expanded="false" aria-controls="collapse3823">
        Competency Standard
        </a>
        </h2>
        </div>
        <div id="collapse3823" class="collapse" aria-labelledby="heading3823" data-parent="#accordionExample">
        <div class="card-body td-modified">
        <ol>
        <li>MS Word,</li>
        <li>MS Excel,</li>
        <li>MS PowerPoint,</li>
        <li>Basic Internet,</li>
        <li>Basic Computer. &nbsp;</li>
        </ol>
        </div>
        </div>
        </div>
        </div>
        </div> --}}
        
        </div>
        <style>
        .sm-text {
            font-size: 10px;
            letter-spacing: 1px;
        }
        .sm-text-1 {
            font-size: 14px;
        }
        .review_title{
            font-weight: 600;
        }
        .avarage-review-tab {
            background-color: #FBB216;
            border-radius: 5px;
            padding: 5px 3px 5px 3px;
        }
        .avarage-review-tab p{
            margin-left: 0;
        }
        .avarage-review-tab h4{
            font-weight: 600;
        }
        .all-reviews-tab{
            background-color: #132B48;
            border-radius: 5px;
            padding: 5px 3px 5px 3px;
        }
        .all-reviews-tab p{
            color: #fff;
            margin-left: 0;
        }
        .all-reviews-tab h4{
            color: #fff;
            font-weight: 600;
        }
        .profile-pic{
            border: 1px solid #132B48;
            display: flex;
            align-items: center;
            padding: 8px;
        }
        .profile-pic img {
            border-radius: 50%;
        }
        .avarage-review-tab{
                margin-left: 0 !important;
        }
        .rate {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            align-items: center;
            height: 46px;
        }
        .rate input.review_rating{
            display: flex;
            appearance: none;
            font-size: 36px;
            color: #ccc;
            top: unset;
            left: unset;
        }
        .rate>input.review_rating:before{
            content: '★ ';
        }
        .rate>input.review_rating:checked,
        .rate>input.review_rating:checked~input.review_rating{
            color: #ffc700;
            transition: all .2s ease-in-out;
        }
        .rate>input.review_rating:checked~input.review_rating,
        .rate>input.review_rating:hover~input.review_rating:checked~input.review_rating {
            color: #ffc700;
            transition: all .2s ease-in-out;
        }
        @media (max-width:768px){
            .all-reviews-tab{
                margin-left:0 !important;
            }
        }
        @media (max-width:480px){
            .review_users{
                padding: 10px !important;
            }
            .review_info{
                padding: 10px !important;
            }
        }
        </style>
        <div class="container-fluid px-0 py-5 mx-auto">
        <div class="row justify-content-center mx-0 mx-md-auto">
        <div class="col-lg-12 col-md-12 px-1 px-sm-2 border-1">
        
        </div>
        </div>
        </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12" id="mobile-fixed">
        <div class="sidebar-details"></div>
        <div class="pricing-details form-sticky" style="background: none" id="myHeader">
        <div class="trainer-border text-center " style="margin-bottom: 20px; padding: 5px;">
        <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="trainer-image text-center">
        <img src="{{ asset('uploads/teacher/'. $course->teacher->image) }}" style="width: 150px; height: 150px;" alt="{{ $course->teacher->name }}" loading="lazy">
        <div style="color: #000; margin-bottom: -12px; margin-top: 10px;">{{ $course->teacher->designation }}</div>
        <a href="{{route('single-teacher',$course->teacher->id)}}" target="_blank">
        <h3>{{ $course->teacher->name }}</h3>
        </a>
        </div>
        </div>
        </div>
        </div>
        <div style="background: #E6E6E6">
        <div class="price">
        <h6 class>
        Certification Fees :
        <span>
        TK. {{ $course->course_price }}
        </span>
        (Non-Refundable)
        </h6>
        <div class="pricing-contact" style="background: #E6E6E6;padding-top:10px">
        <div class="modal fade" id="modalCongratulationWOLoginForm" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        
        
        
         
        </div>
        <a href="{{route('apply_course',$course->id)}}" style="color: white; text-decoration: none;">
            <button type="button" class="btn btn-primary apply-btn">
            Apply Now
            </button>
        </a>
        
        <h6>Contact info</h6>
        
        
        <div class="single-widget padding-extra">
        <p><i class="fas fa-mobile-alt"></i><span>+880 1982-927790</span></p>
        <p><i class="fas fa-phone"></i>+880 1721-297490</p>
        <p><i class="fas fa-envelope"></i>sydtcnrsingdi@gmail.com</p>
        </div>
        </div>
        </div>
        </div>

        {{-- teacher image --}}
        {{-- <div style="background: #E6E6E6">
        <div class="price">
        
        <div class="pricing-contact" style="background: #E6E6E6;padding-top:10px">
        <a href="{{route('apply_course',$course->id)}}" style="color: white; text-decoration: none;">
            
        </a>
        
        <div class="single-widget">
                <img style="width:250px" src="{{ asset('uploads/teacher/'. $course->teacher->image) }}" alt="Trainer Image">
                <h4 >
                    {{ $course->teacher->name }}
                </h4>
                <h5>
                    {{ $course->teacher->designation }}
                 </h5>
        </div>
        </div>
        </div>
        </div> --}}

        </div>
        </div>
        </div>
        </div>
        </div>

@endsection