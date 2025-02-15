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
<div class="container p-5" style=" margin-top: 150px">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div>
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Tambah Iklan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="{{ route('menu') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->


        <!-- horizontal Basic Forms Start -->
        <div class="pd-20 card-box mb-20">
            <div class="clearfix">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                </div>
            </div>
            <form class="form-contact contact_form" action="{{ route('iklan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="#title" class="form-label">Judul Iklan</label>
                    <input class="form-control" type="text"id="title" name="title" placeholder="Masukan Judul"
                        required />
                </div>
                <div class="form-group">
                    <label for="#gambar" class="form-label">Gambar</label>
                    <div class="">
                        <input type="file" class=" form-control" id="image" name="image" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="#content" class="form-label">Isi Konten</label>
                    <textarea class="form-control textarea_editor form-control border-radius-0" id="content" rows="3"
                        name="content"></textarea>
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <button class="btn btn-primary" style="width: 100%" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- horizontal Basic Forms End -->
</div>


@endSection