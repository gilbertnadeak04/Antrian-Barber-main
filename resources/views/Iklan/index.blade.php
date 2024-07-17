@extends('layouts.landing')

@section('content')
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
<!-- Blog Start -->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach ($iklans as $iklan)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" style="width: 380px" src="{{ asset($iklan->image) }}" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>{{ $iklan->created_at->format('d F') }}</h3>
                            </a>
                        </div>
                        <div class="blog_details">
                            <a class="d-inline-block" href="iklan/detail/{{ $iklan->id }}">
                                <h2 class="blog-head" style="color: #2d2d2d;">{{ $iklan->title }}</h2>
                            </a>
                            <p>{{ $iklan->content }}</p>
                            <ul class="blog-info-link">
                                <li><a href="iklan/detail/{{ $iklan->id }}"><i class="fa fa-user"></i>{{ $iklan->user->name }}</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach
                    <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-lg m-0">
                                <!-- Tombol Previous -->
                                <li class="page-item {{ $iklans->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link rounded-0" href="{{ $iklans->previousPageUrl() }}"
                                         aria-label="Previous">
                                        <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                    </a>
                                </li>

                                <!-- Menampilkan nomor halaman -->
                                @for ($i = 1; $i <= $iklans->lastPage(); $i++)
                                    <li class="page-item {{ $iklans->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $iklans->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Tombol Next -->
                                <li
                                    class="page-item {{ $iklans->currentPage() == $iklans->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link rounded-0" href="{{ $iklans->nextPageUrl() }}"
                                        aria-label="Next">
                                        <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </div>
</section>
<!-- Blog End -->

@endsection