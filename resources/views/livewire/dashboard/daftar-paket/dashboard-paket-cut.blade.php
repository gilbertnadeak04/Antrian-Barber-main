<div>
    <div class="container">
        <div class="card mt-3" style="height: 550px">
            <div class="card-body">
                <div class="card-title">Daftar Antrian </div>

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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nomor HP</th>
                                        <th scope="col">Panggil</th>
                                        <th scope="col">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hairCut as $list)
                                        <tr style="text-align: center">
                                            {{-- <td>{{ $list->no_antrian }}</td> --}}
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->nama }}</td>
                                            <td>{{ $list->user->email }}</td>
                                            <td>{{ $list->no_hp }}</td>
                                            <td>
                                                <a class="btn btn-success"
                                                    wire:click="panggilAntrian({{ $list->id }})" role="button"
                                                    data-bs-toggle="modal" data-bs-target="#panggilAntrian"><i
                                                        class="bi bi-telephone-forward"></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                    wire:click="deleteAntrian({{ $list->id }})" role="button"
                                                    data-bs-toggle="modal" data-bs-target="#deletelAntrian"><i
                                                        class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $hairCut->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.dashboard.daftar-paket.panggilAntrian')
    @include('livewire.dashboard.daftar-paket.deleteAntrian')
</div>
