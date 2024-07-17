@extends('dashboard.layouts.main')

@section('content')
<div>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Laporan Antrian</div>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                      
                    </div>
                @endif


                <div class="row">
                    <div class="col">
                        <div>
                            <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambahkan User</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_id">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Nomor Telepon</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $list)
                                        <tr style="text-align: center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->nik }}</td>
                                            <td>{{ $list->no_telepon }}</td>
                                            <td>{{ $list->email }}</td>
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