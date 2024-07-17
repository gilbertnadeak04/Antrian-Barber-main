@extends('layouts.landing')


@section('content')
    <main>
        <!--? slider Area Start-->
        <div class="slider-area position-relative fix">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInUp" data-delay="0.2s">CLEO BARBER & COFFEE</span>
                                    <h1 data-animation="fadeInUp" data-delay="0.5s">Gaya Rambut Kita Bikin Kamu Makin Keren!
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInUp" data-delay="0.2s">CLEO BARBER & COFFEE</span>
                                    <h1 data-animation="fadeInUp" data-delay="0.5s">Gaya Rambut Kita Bikin Kamu Makin Keren!
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- stroke Text -->
            <div class="stock-text">
                <h2>Get More confident</h2>
                <h2>Get More confident</h2>
            </div>
            <!-- Arrow -->
            <div class="thumb-content-box">
                <div class="thumb-content">
                    <h3>Ambil Antrian</h3>
                    <a href="/antrian"> <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!--? Blog Area Start -->
        <section class="home-blog-area section-padding30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                        <div class="section-tittle text-center mb-90">
                            <span>Iklan Dari Pelanggan</span>
                            <h2>Ingin memasang iklan anda juga? gratis, klik <a href="{{ route('menu') }}">disini</a>.</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($iklans as $iklan)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="home-blog-single mb-30">
                                <div class="blog-img-cap">
                                    <div class="blog-img">
                                        <img src="{{ asset($iklan->image) }}" alt="">
                                        <!-- Blog date -->
                                        <div class="blog-date text-center">
                                            <span>24</span>
                                            <p>Now</p>
                                        </div>
                                    </div>
                                    <div class="blog-cap">
                                        <h3><a href="iklan/detail/{{ $iklan->id }}">{{ $iklan->title }}</a></h3>
                                        <p>{{ substr($iklan->content, 0, 120) }}{{ strlen($iklan->content) > 120 ? '...' : '' }}</p>
                                        <a href="iklan/detail/{{ $iklan->id }}" class="more-btn">Read More »</a>
                                        <ul class="blog-info-link mt-4">
                                            <li><a href="#"><i class="fa fa-user"></i>{{ $iklan->user->name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Blog Area End -->

        <!--? About Area Start -->
        <section class="about-area section-padding30 position-relative">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-11">
                        <!-- about-img -->
                        <div class="about-img ">
                            <img src="{{ asset('frontend/assets/img/gallery/about.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle3 mb-35">
                                <span>Tentang Kami</span>
                                <h2> Cleo Barbershop & Coffee </h2>
                            </div>
                            <p class="mb-30 pera-bottom">
                                Cleo Barbershop & Coffee adalah tempat yang sempurna untuk mendapatkan gaya rambut terbaru
                                sambil menikmati secangkir kopi yang segar. Kami menawarkan layanan potong rambut terbaik
                                oleh para ahli tata rambut yang berpengalaman, sambil menciptakan lingkungan yang nyaman dan
                                ramah. Di sini, kami percaya bahwa penampilan yang baik dimulai dari rambut yang rapi dan
                                percaya bahwa setiap pelanggan layak mendapatkan perawatan terbaik. Selain itu, dengan
                                suasana kafe yang hangat dan menyambut, Leo Barbershop & Coffee adalah tempat yang sempurna
                                untuk bersantai dan menikmati waktu luang Anda. Mari kunjungi kami dan rasakan pengalaman
                                yang istimewa di Cleo Barbershop & Coffee!.</p>
                            <p class="pera-top mb-50">Ini adalah Sistem Antrian Online Cleo barber & coffee dimana setiap
                                pengunjung dapat mengambil antrian.</p>
                            <img src="{{ asset('frontend/assets/img/gallery/signature.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Shape -->
            <div class="about-shape">
                <img src="{{ asset('frontend/assets/img/gallery/about-shape.png') }}" alt="">
            </div>
        </section>
        <!-- About-2 Area End -->
        <!--? Services Area Start -->
        <section class="service-area pb-170">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-90">
                            <span>Servis Profesional</span>
                            <h2>LAYANAN TERBAIK KAMI YANG KAMI TAWARKAN UNTUK ANDA</h2>
                        </div>
                    </div>
                </div>
                <!-- Section caption -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-healthcare-and-medical"></i>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Hair Cut</a></h4>
                                <p>Consultation, Haircut, Shaving, Hair Wash, Hair Tonic, Massage, Warm Towel, Pomade.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption active text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-healthcare-and-medical"></i>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Good Look</a></h4>
                                <p>Consultation, Haircut, Shaving, Hair Wash, Hair Tonic, Massage, Warm Towel, Pomade, Black
                                    Mask.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-healthcare-and-medical"></i>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Good Mood</a></h4>
                                <p>Consultation, Haircut, Shaving, Hair Wash, Hair, Tonic, Massage, Warm Towel, Pomade, Hair
                                    Mask</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-clock"></i>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Enjoy</a></h4>
                                <p>Consultation, Haircut, Shaving, Hair Wash, Hair Tonic, Warm Towel, Pomade, Hair Mask,
                                    Hydrotherapy, Foot & Hand Massage, Back & Shoulder Massage, Head Massage</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-clock"></i>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Add on- Coloring</a></h4>
                                <p>Standart - Black, Dark Brown, Blue black <br> Variation - Gray, Tan Brown, Red, Blue, ETC
                                    <br> Re Touch Color</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Area End -->
        <!-- Best Pricing Area Start -->
        <div class="best-pricing section-padding2 position-relative">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-7 col-lg-7">
                        <div class="section-tittle mb-50">
                            <span>List Harga</span>
                            <h2>Ada Harga<br> Ada Kualitas!</h2>
                        </div>
                        <!-- Pricing  -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="pricing-list">
                                    <ul>
                                        <li>Hair Cut. . . . . . . . . . . . . . . . . . . . . . . . . . . . <span>40K</span>
                                        </li>
                                        <li>Good Look. . . . . . . . . . . . . . . . . . . . . . . . . . <span>70K</span>
                                        </li>
                                        <li> Good Mood. . . . . . . . . . . . . . . . . . . . . . . . . . <span>80K</span>
                                        </li>
                                        <li>Enjoy. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                                            <span>135K</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="pricing-list">
                                    <ul>
                                        <li>Coloring-Standart. . . . . . . . . . . . . . . . . . . . . . . .
                                            .<span>80K</span></li>
                                        <li>Coloring-Variation. . . . . . . . . . . . . . . . . . . . . . .
                                            <span>350K</span></li>
                                        <li>Coloring-Re Touch Color. . . . . . . . . . . . . . . . . <span>150K</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pricing img -->
            <div class="pricing-img">
                {{-- <img class="pricing-img1" src="{{ asset('frontend/assets/img/gallery/pricing1.png') }}" alt=""> --}}
                <img class="pricing-img2" src="{{ asset('frontend/assets/img/gallery/pricing2.png') }}" alt="">
            </div>
        </div>
        <!-- Best Pricing Area End -->

    </main>
@endsection
