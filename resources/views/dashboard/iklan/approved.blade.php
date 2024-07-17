@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="container">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title">Iklan yang sudah di approve</div>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                          
                        </div>
                    @endif


                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Isi</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($iklans as $list)
                                            <tr style="text-align: center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $list->created_at }}</td>
                                                <td>{{ $list->title }}</td>
                                                <td>{{ $list->user->name }}</td>
                                                <td>
                                                    <img src="{{ asset($list->image) }}" alt="Model Backdrop"
                                                        style="max-width: 100px; max-height: 100px;">
                                                </td>
                                                <td>{{ $list->content }}</td>
                                                <td>{{ $list->status }}</td>
                                                <td>
                                                    <form action="{{ route('dashboard-iklan.destroy', $list->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" style="width: 50px" class="btn btn-danger"><i
                                                                class="bi bi-trash3">
                                                                <span class="fas fa-trash-alt"></span></i></button>
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
            </div>
        </div>
    </div>
@endsection
