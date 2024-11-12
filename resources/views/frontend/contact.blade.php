@extends('frontend.components.layouts')
@section('content')
<h1 class="d-none">contact</h1>
<h3 class="d-none">Shilmandi Youth Development Training Center</h3>
<div class="contact-area-bradcome">
<div class="container">
<div class="row">
<div class="col-xl-6 offset-xl-3">
<div class="bradecome-content text-center wow animated zoomIn" data-wow-duration="2s">
<h2>CONTACT US</h2>
</div>
</div>
</div>
</div>
</div>
<div class="contact-area section-padding">
<div class="container">
<div class="row">
<div class="col-xl-4 col-lg-4 col-md-6 col-12">
<div class="contact-info">
<ul>
<li class="wow animated fadeInDown" data-wow-duration="2s">
<div class="feature-content">
<div class="single-feature-item">
<div class="feature-table">
<div class="feature-tablecell">
<i class="fa fa-map-marker-alt"></i>
</div>
</div>
</div>
<p><strong class="text-secondary">Address:</strong> Near Nasringdi Polytechnic Institute, Police Lines, Narsingdi Sadar, Narsingdi.</p>
</div>
</li>
<li class="wow animated fadeInDown" data-wow-duration="2s">
<div class="feature-content">
<div class="single-feature-item">
<div class="feature-table">
<div class="feature-tablecell">
<i class="fa fa-phone"></i>
</div>
</div>
</div>
<p>+880 1982 927790</p>
<p>+880 1721 297490</p>
</div>
</li>
<li class="wow animated fadeInDown" data-wow-duration="2s">
<div class="feature-content">
<div class="single-feature-item">
<div class="feature-table">
<div class="feature-tablecell">
<i class="fa fa-envelope"></i>
</div>
</div>
</div>
<p><a >sydtcnarsingdi@gmail.com</a></p>
</div>
</li>
</ul>
</div>
</div>
<div class="col-xl-8 col-lg-8 col-md-6 col-12">
<form action></form>
<div class="contact-form">
<h3 class="text-center font-weight-bold">Send Us a Message</h3>
<br>
@if (Session('success'))
    <h4 style="color:green;">Message Send Successfully</h4>
@endif
<form action="{{route('contact-form')}}" method="post" id="basic-form6" class="basic-form2">
@csrf
<div class="row">
<div class="col-xl-6">
<input type="text" name="first_name" placeholder="First name" required>
</div>
<div class="col-xl-6">
<input type="text" name="last_name" placeholder="Last name" required>
</div>
</div>
<div class="row">
<div class="col-xl-6">
<input type="text" name="phone" placeholder="Phone number" required>
</div>
<div class="col-xl-6">
<input type="email" name="email" placeholder="email address" required>
</div>
</div>
<div class="row">
<div class="col-md-6 mt-2">
<textarea name="message" id placeholder="Message" required style="width:100%"></textarea>
</div>
</div>
<input type="submit" name="btn" value="Send Message">
</form>
</div>
</div>
</div>
</div>
</div>

{{-- map  --}}
<div class="contact-map-area">
    <div class="container-fluid">
    <div class="row">
    <div class="col-xl-12 col-lg-12 padding-remove-map">
    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29178.13870271299!2d90.6533146743164!3d23.915585699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754315255ee0d1b%3A0x7521c50d3befefab!2z4Ka24Ka_4Kay4Kau4Ka-4Kao4KeN4Kam4KeAIOCmn-Cnh-CmleCmqOCmv-CmleCnjeCmr-CmvuCmsiDgpp_gp43gprDgp4fgpqjgpr_gpoIg4KaH4Kao4KeN4Ka44Kaf4Ka_4Kaf4Ka_4KaJ4Kaf!5e0!3m2!1sbn!2sbd!4v1726724509477!5m2!1sbn!2sbd" width="100%" height="460" frameborder="0" style="border:0;" allowfullscreen>
                            </iframe>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection