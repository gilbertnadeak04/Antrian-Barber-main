@extends('dashboard.layouts.main')

@section('content')
    <div class="container p-5">
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
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
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
                <form class="row g-3 needs-validation" action="{{ route('register.store') }}" method="post" nonvalidate>
                    @csrf

                    <input type="hidden" value="2" name="role_id">
                    <div class="col-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="no_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" id="no_telepon" required>
                        @error('no_telepon')
                            <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" name="nik" class="form-control" id="nik" required>
                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>


                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button class="btn btn-primary w-100 mb-2" type="submit">Buat Akun</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- horizontal Basic Forms End -->
    </div>
@endsection
