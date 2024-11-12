@extends('frontend.components.layouts')
@section('content')

    {{-- courses  --}}
       
    <style>
            .pb_course_page_container {
                background-color: #FCFCFC;
            }
            .all_courses_tab {
                padding: 70px 0;
            }
        
            .all_courses_tab ul.nav>li {
                flex-grow: 1;
            }
        
            .all_courses_tab ul.nav li.dropdown .dropdown_menu_wrapper .dropdown-menu {
                top: 97%;
                padding: 4px 5px;
            }
        
            .all_courses_tab ul.nav li.dropdown .dropdown_menu_wrapper .dropdown-menu>div {
                box-shadow: 0px 1px 5px 2px rgb(53 52 52 / 20%);
                width: 100%;
                /* margin: auto; */
            }
        
            .all_courses_tab ul.nav li.dropdown .dropdown_menu_wrapper .dropdown-menu>div>.dropdown-item:hover,
            .all_courses_tab ul.nav li.dropdown .dropdown_menu_wrapper .dropdown-menu>div>.dropdown-item.active,
            .all_courses_tab ul.nav li.dropdown .dropdown_menu_wrapper .dropdown-menu>div>.dropdown-item:active {
                color: #fff !important;
                background-color: #DB1E37 !important;
            }
        
            .all_courses_tab ul.nav li.dropdown a.nav-link.dropdown_button.dropdown_active~.dropdown_menu_wrapper .dropdown-menu {
                display: flex;
                justify-content: center;
            }
        
            .all_courses_tab .dropdown-menu .dropdown-item {
                width: 280px;
                white-space: unset;
                border-bottom: 1px solid rgba(149, 149, 149, 0.2);
            }
        
            .all_course_tab_content h3 {
                font-weight: 600;
                text-transform: uppercase;
            }
        
            .all_course_tab_content p {
                font-size: 14px;
                font-weight: 400;
                margin-left: 0;
            }
        
            .all_courses_tab ul.nav li a.nav-link {
                border-top: 1px solid rgba(149, 149, 149, 0.5);
                border-bottom: 1px solid rgba(149, 149, 149, 0.5);
                border-left: 1px solid rgba(149, 149, 149, 0.5);
                text-align: center;
                padding: 15px 0;
                color: #000 !important;
                background: linear-gradient(to bottom, #fff, #f8f8f8);
                font-size: 16px;
                font-weight: 500;
            }
        
            .all_courses_tab ul.nav li:last-child a.nav-link {
                border-right: 1px solid rgba(149, 149, 149, 0.5);
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
            }
        
            .all_courses_tab ul.nav li:first-child a.nav-link {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }
        
            .all_courses_tab ul.nav li a.nav-link:hover,
            .all_courses_tab ul.nav li a.nav-link.active {
                background: #DB1E37;
                /* background: linear-gradient(to bottom, #DB1E37, #DB1E37); */
                color: #fff !important;
            }
        
            .all_courses_tab ul#tab_buttons li a.nav-link.dropdown_button i {
                margin-left: 10px;
                font-size: 14px;
                transform: rotate(0deg);
                transition: transform .2s ease-in-out;
            }
        
            .all_courses_tab ul#tab_buttons li a.nav-link.dropdown_button.dropdown_active i {
                transform: rotate(180deg);
                transition: transform .2s ease-in-out;
            }
        
            .wrapper .pb_single_course_box {
                border: 1px solid #A9A9A9;
                border-radius: 10px;
                margin-bottom: 30px;
            }
        
            .pb_single_course_col,
            .pb_single_course_col_old,
            .pb_single_course_col_ongoing,
            .pb_single_course_col_all,
            .pb_single_course_col_colla {
                display: none;
            }
        
            .wrapper .pb_single_course_box img {
                object-fit: contain;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }
        
            .wrapper .pb_single_course_box .pb_single_course_content {
                padding: 10px;
            }
        
            .wrapper .pb_single_course_box .pb_single_course_content .date_time span {
                font-size: 12px;
                color: #AEAEAE;
            }
        
            .wrapper .pb_single_course_box .pb_single_course_content h6 {
                font-weight: 700;
                padding-top: 12px;
                padding-bottom: 8px;
                height: 60px;
                display: flex;
                align-items: center;
            }
        
            .wrapper .pb_single_course_box .pb_single_course_content .pb_single_course_price {
                color: #DB1E37;
                font-size: 14px;
                font-weight: 700;
            }
        
            .wrapper .pb_single_course_box .pb_single_course_content .pb_single_course_apply_button {
                background-color: #DB1E37;
                padding: 6px 20px;
                color: #fff;
                font-size: 12px;
                border-radius: 6px;
                font-weight: 500;
            }
        
            .all_courses_tab #ViewMore,
            .all_courses_tab .ViewMore {
                display: inline-block;
                background-color: #DB1E37;
                color: #ffffff;
                padding: 5px 30px;
                border-radius: 5px;
            }
        
            .pb_course_page_container section.all_courses_tab .tab-content {
                border-bottom: 2px solid rgba(166, 166, 166, 0.5);
                padding-bottom: 70px;
            }
        
            /* ====== ongoing course section======== */
            .ongoing_course_box {
                border-bottom: 2px solid rgba(166, 166, 166, 0.5);
                padding-bottom: 70px;
            }
        
            .ongoing_course_wrapper {
                border: 1px solid hsl(0, 0%, 53%, 0.3);
                padding: 20px;
                background-color: #fff;
            }
        
            #ongoing_course_tab_item {
                border: 1px solid hsl(0, 0%, 53%, 0.3);
            }
        
            .ongoing_courses_tab_slider .slick-slider .slick-list {
                width: 100%;
            }
        
            .ongoing_courses_tab_slider .slick-slider {
                height: 308px;
            }
        
            .ongoing_courses_tab_slider .slick-slider .slide a {
                background-color: rgb(255, 255, 255);
                color: #000000 !important;
                /* display: block; */
                height: 70px;
                font-size: 16px;
                line-height: 1.3;
                font-weight: 600;
                display: flex;
                flex-direction: column;
            }
        
            .ongoing_courses_tab_slider .slick-slider .slide.slick-current a {
                color: #fff !important;
                background-color: #DB1E37;
            }
        
            .ongoing_courses_tab_slider .slick-slider .slide .ongoing_course_slider_img {
                display: none;
                z-index: 9;
            }
        
            .ongoing_course_slider_time {
                font-size: 10px;
                font-weight: 300;
            }
        
            /* ====== recent completed course section======== */
            .recent_completed_courses {
                padding-top: 70px;
                padding-bottom: 70px;
            }
        
            .recent_completed_courses_wrapper {
                border: 1px solid hsl(0, 0%, 53%, 0.3);
                padding: 15px 20px 20px 20px;
                background-color: #fff;
            }
        
            .r_c_single_course_img {
                width: 22%;
            }
        
            .r_c_single_course_img img {
                width: 100%;
                height: auto;
            }
        
            .r_c_single_course_content {
                width: 78%;
                background-color: #F3F3F3;
                padding: 5px 15px;
                margin-left: 5px;
            }
        
            .r_c_single_course_content .r_c_title {
                color: #000;
                font-weight: 600;
                line-height: 1.2;
                font-size: 16px;
            }
        
            .r_c_single_course_content .r_c_completing_time {
                font-size: 11px;
                color: #707070;
            }
        
            .recent_completed_courses_wrapper .r_c_courses {
                height: 67px;
                margin-top: 5px;
            }
            /* ======responsive======= */
            @media  screen and (max-width: 1199px) {
                .wrapper .pb_single_course_box .pb_single_course_content .pb_single_course_apply_button {
                    padding: 6px 15px;
                }
            }
            @media  screen and (max-width: 992px) {
                .r_c_courses {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
        
                .r_c_single_course_img {
                    width: 100%;
                }
        
                .r_c_single_course_content {
                    width: 100%;
                    margin: 0;
                }
        
                .recent_completed_courses_wrapper .slick-slide {
                    height: 280px;
                }
                .all_courses_tab ul.nav li a.nav-link {
                    padding-left:5px;
                    padding-right:5px;
                    border: 1px solid rgba(149, 149, 149, 0.5);
                    border-radius: 10px;
                }
            }
        
            @media  screen and (max-width: 767px) {
                .recent_completed_courses_wrapper .slick-slide {
                    height: 212px;
                }
        
                .ongoing_courses_tab_slider .slick-slider {
                    height: 150px;
                }
        
                .ongoing_courses_tab_slider .slick-slider .slide a {
                    font-size: 12px;
                }
        
                .r_c_single_course_content .r_c_title {
                    font-size: 14px;
                }
            }
        
            @media  screen and (max-width: 480px) {
                .r_c_single_course_content .r_c_title {
                    font-size: 12px;
                }
                .wrapper .pb_single_course_box .pb_single_course_content .pb_single_course_price{
                    font-size: 13px;
                }
            }
            .course_info_hover{
                cursor: pointer;
                position: relative;
            }
            .course_info{
                display: none;
            }
            .course_info ul li span{
                margin-left: 5px;
            }
            span.course_info_hover:hover .course_info {
                display: block;
                position: absolute;
                width: 250px;
                background: #000;
                color: #fff;
                font-size: 14px;
                padding: 10px;
                z-index: 9;
                margin-left: -200px;
            }
        </style>
        <section class="all_courses_tab">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-12 col-md-7">
        <div class="all_course_tab_content">
        
        <p class="text-center">
        </p>
        </div>
        </div>
        </div>
        <div class="row">
        <div id="all_course_tabs" class="col-12">
        <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
        
        <ul id="tab_buttons" class="nav" role="tablist">
        <li class="nav-item"><a class="nav-link " href="#all_courses">All Course</a></li>
        <li class="nav-item"><a class="nav-link active" href="#upcoming_course">Upcoming Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="#ongoing_course">Ongoing Courses</a></li>
        </ul>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        
        <div class="tab-content">
        <div id="all_courses"><br>
        
        <div class="wrapper">
        <div class="row" id="all_course_filter_">
        @foreach ($courses as $course)
            <div class="col-12  col-md-6 col-lg-4 all_course_filter_item_ 15 pb_single_course_col_all">
                <div class="pb_single_course_box">
                <a href="{{route('single-course',$course->id)}}">
                <img class="img-fluid" src="{{ asset('uploads/course/'. $course->image) }}" alt="Course_image">
                </a>
                <div class="pb_single_course_content">
                <div class="date_time d-flex justify-content-between">
                <span>Start Date:
                    {{$course->ass_date}}</span>
                <span>Duration: 30hours</span>
                <span class="course_info_hover">
                <i class="fa fa-info-circle"></i>
                <div class="course_info">
                <div class="row">
                <div class="col-12">
                <ul>
                <li>
                <i class="fas fa-user"></i>
                <span>Trainer Name :</span>
                <a href="#" style="color:#DB1E37">{{ $course->teacher->name }}</a>
                </li>
                <li>
                <i class="fas fa-stopwatch"></i>
                <span>No. of Classes/ Sessions :</span> {{$course->classes}}
                </li>
                <li>
                <i class="fab fa-trello"></i>
                <span>Batch No : {{$course->batch_no}}</span>
                </li>
                <li>
                <i class="far fa-clock"></i>
                <span>Registration Deadline :</span> {{$course->reg_date}}
                </li>
                </ul>
                </div>
                </div>
                </div>
                </span>
                </div>
                <a href="{{route('single-course',$course->id)}}">
                <h6>{{$course->course_name}}</h6>
                </a>
                <div class="d-flex justify-content-between align-items-center">
                <span class="pb_single_course_price">
                Course Fees :
                {{$course->course_price}}/- BDT</span>
                <a class="pb_single_course_apply_button" href="{{route('single-course',$course->id)}}">
                See Details
                </a>
                </div>
                </div>
                </div>
                </div>
        @endforeach
        <div class="col-12">
        <div class="d-flex justify-content-center">
        <a class="ViewMore" href="javascript:void(0)">View More</a>
        </div>
        </div>
        </div>
        </div>
        </div>
        {{-- all course end --}}
        {{-- upcoming_course start --}}
        
        <div id="upcoming_course" class="active"><br>
        
        <div class="wrapper">
        <div class="row">
                @foreach ($courses as $course)
                @if ($course->reg_date >= date('Y-m-d'))
                <div class="col-12  col-md-6 col-lg-4 all_course_filter_item_ 15 pb_single_course_col">
                    <div class="pb_single_course_box">
                    <a href="{{route('single-course',$course->id)}}">
                    <img class="img-fluid" src="{{ asset('uploads/course/'. $course->image) }}" alt="Course_image">
                    </a>
                    <div class="pb_single_course_content">
                    <div class="date_time d-flex justify-content-between">
                    <span>Start Date:
                        {{$course->ass_date}}</span>
                    <span>Duration: 30hours</span>
                    <span class="course_info_hover">
                    <i class="fa fa-info-circle"></i>
                    <div class="course_info">
                    <div class="row">
                    <div class="col-12">
                    <ul>
                    <li>
                    <i class="fas fa-user"></i>
                    <span>Trainer Name :</span>
                    <a href="#" style="color:#DB1E37">{{ $course->teacher->name }}</a>
                    </li>
                    <li>
                    <i class="fas fa-stopwatch"></i>
                    <span>No. of Classes/ Sessions :</span> {{$course->classes}}
                    </li>
                    <li>
                    <i class="fab fa-trello"></i>
                    <span>Batch No : {{$course->batch_no}}</span>
                    </li>
                    <li>
                    <i class="far fa-clock"></i>
                    <span>Registration Deadline :</span> {{$course->reg_date}}
                    </li>
                    </ul>
                    </div>
                    </div>
                    </div>
                    </span>
                    </div>
                    <a href="{{route('single-course',$course->id)}}">
                    <h6>{{$course->course_name}}</h6>
                    </a>
                    <div class="d-flex justify-content-between align-items-center">
                    <span class="pb_single_course_price">
                    Course Fees :
                    {{$course->course_price}}/- BDT</span>
                    <a class="pb_single_course_apply_button" href="{{route('single-course',$course->id)}}">
                    See Details
                    </a>
                    </div>
                    </div>
                    </div>
                    </div>
                @endif
            @endforeach
        
        </div>
        </div>
        
        </div>
        {{-- upcoming course end --}}
        {{-- ongoing course --}}
    
        <div id="ongoing_course" class=""><br>
        
        <div class="wrapper">
        <div class="row">
                @foreach ($courses as $course)
                @if ($course->reg_date <= date('Y-m-d'))
                <div class="col-12  col-md-6 col-lg-4 all_course_filter_item_ 15 pb_single_course_col_ongoing">
                    <div class="pb_single_course_box">
                    <a href="{{route('single-course',$course->id)}}">
                    <img class="img-fluid" src="{{ asset('uploads/course/'. $course->image) }}" alt="Course_image">
                    </a>
                    <div class="pb_single_course_content">
                    <div class="date_time d-flex justify-content-between">
                    <span>Start Date:
                        {{$course->ass_date}}</span>
                    <span>Duration: 30hours</span>
                    <span class="course_info_hover">
                    <i class="fa fa-info-circle"></i>
                    <div class="course_info">
                    <div class="row">
                    <div class="col-12">
                    <ul>
                    <li>
                    <i class="fas fa-user"></i>
                    <span>Trainer Name :</span>
                    <a href="#" style="color:#DB1E37">{{ $course->teacher->name }}</a>
                    </li>
                    <li>
                    <i class="fas fa-stopwatch"></i>
                    <span>No. of Classes/ Sessions :</span> {{$course->classes}}
                    </li>
                    <li>
                    <i class="fab fa-trello"></i>
                    <span>Batch No : {{$course->batch_no}}</span>
                    </li>
                    <li>
                    <i class="far fa-clock"></i>
                    <span>Registration Deadline :</span> {{$course->reg_date}}
                    </li>
                    </ul>
                    </div>
                    </div>
                    </div>
                    </span>
                    </div>
                    <a href="{{route('single-course',$course->id)}}">
                    <h6>{{$course->course_name}}</h6>
                    </a>
                    <div class="d-flex justify-content-between align-items-center">
                    <span class="pb_single_course_price">
                    Course Fees :
                    {{$course->course_price}}/- BDT</span>
                    <a class="pb_single_course_apply_button" href="{{route('single-course',$course->id)}}">
                    See Details
                    </a>
                    </div>
                    </div>
                    </div>
                    </div>
                @endif
            @endforeach
        
        </div>
        </div>
        
        </div>
        {{-- ongoing course end --}}
    
        
        </div>
        </div>
        
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
@endsection