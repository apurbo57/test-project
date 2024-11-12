@extends('frontend.components.layouts')
@section('content')
<div class="gallery-area-bg">
    <div class="container">
    <div class="row">
    <div class="col-xl-6 offset-xl-3">
    <div class="bradecome-content text-center">
    <h2>Our Mamories</h2>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="gallery-area section-padding">
    <div class="container">
    <div class="row">
    <div class="col-xl-12 text-center">
    <div class="section-header">
    <h2>gallery</h2>
    </div>
    </div>
    </div>
    <div class="row">
    @foreach ($galleries as $gallery)
        <div class="col-lg-4 col-md-6">
            <div class="single-portfolio single-shadow">
            <img src="{{ asset('uploads/images/'. $gallery->image) }}" alt="">
            <div class="portfolio-overlay">
            <a href="{{ asset('uploads/images/'. $gallery->image) }}" class="portfolio-popup"><i class="fas fa-arrows-alt"></i></a>
            </div>
            </div>
        </div>
    @endforeach
    {{ $galleries->links('pagination::bootstrap-4') }}
    </div>
    </div>
    </div>
@endsection