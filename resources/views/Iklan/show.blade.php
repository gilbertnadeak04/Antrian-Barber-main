@extends('layouts.landing')

@section('content')
<!-- Navbar End -->
<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 pt-70 text-center">
                        <h1 class="display-3 text-white animated zoomIn">Ingin Memasang Iklan disini? </h1>
                        <p class="display-6 text-white animated zoomIn">Pasang juga iklan mu, gratis <a style="color: white;   text-decoration-line: underline;"   href={{ route('menu') }}>disini</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset($iklan->image) }}" alt="">
                </div>
                <div class="blog_details">
                   <h2 style="color: #2d2d2d;">{{ $iklan->title }}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i>{{ $iklan->user->name }}</a></li>
                      <li><a href="#"><i class="fa fa-comments"></i>  {{ \Carbon\Carbon::parse($iklan->created_at)->format('D, d M Y') }}</a></li>
                   </ul>
                   <p class="excert">
                      {!! $iklan->content !!}
                   </p>

                </div>
             </div>
       </div>
    </div>
 </section>
@endsection
