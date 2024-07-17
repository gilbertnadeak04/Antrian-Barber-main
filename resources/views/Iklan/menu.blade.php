@extends('layouts.landing')

@section('content')
    <!-- Bagian Slider -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70 text-center">
                            <h1 class="display-3 text-white animated zoomIn">Managemen Iklan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Daftar Antrian Pesanan -->
    <section id="antrian" class="d-flex align-items-center">
        <div class="container" style="margin-top: 150px; margin-bottom: 200px; ">

            <div class="row">
                <div class="col">
                    <h1 class="text-center mb-4">Riwayat Antrian Pesanan</h1>
                    <a href="/antrian" class="btn btn-primary mb-3">Tambahkan Antrian</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_id">
                            <thead>
                                <tr style="text-align: center">
                                    <th scope="col">No</th>
                                    <th scope="col">No Antrian</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor HP</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Tgl. Antrian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($antrians as $item)
                                    <tr style="text-align: center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->no_antrian }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->paket }}</td>
                                        <td>{{ $item->tanggal_antrian }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Periksa dan Tampilkan Pesan Error -->
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <h1 class="text-center mb-4 mt-5">Riwayat Iklan Anda</h1>
                    <div>
                        <a href="{{ route('iklan.create') }}" class="btn btn-primary mb-3">Tambahkan Iklan</a>
                        <p class="text-danger">Iklan anda akan di approved setiap 2x anda melakukan pesanan</p>
                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table table-bordered" id="table_id">
                            <thead>
                                <tr style="text-align: center">
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iklans as $item)
                                    <tr style="text-align: center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <img src="{{ asset($item->image) }}" alt="Model Backdrop"
                                                style="max-width: 100px; max-height: 100px;">
                                        </td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            @if ($item->status == 'approved')
                                                <!-- Tombol Edit tersembunyi jika status sudah disetujui -->
                                                <a href="{{ route('iklan.edit', $item->id) }}" class="btn btn-primary"
                                                    style="display: none;">Edit</a>
                                            @else
                                                <!-- Tombol Edit aktif jika status belum disetujui -->
                                                <a href="{{ route('iklan.edit', $item->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                            @endif
                                            <!-- Form untuk hapus iklan -->
                                            <form action="{{ route('iklan.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
