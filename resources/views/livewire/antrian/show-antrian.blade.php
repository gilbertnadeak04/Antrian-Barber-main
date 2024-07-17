<section id="antrian" class="d-flex align-items-center">
    <div class="container" style="margin-top: 150px">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
              
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
              
            </div>
        @endif

        @if ($cekAntrian > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-barang">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor HP</th>
                                <th scope="col">Paket</th>
                                <th scope="col">Tgl Antrian</th>
                                <th scope="col">Waktu Antrian</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailAntrian as $item)
                                <tr style="text-align: center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->paket }}</td>
                                    <td>{{ $item->tanggal_antrian }}</td>
                                    <td>{{ $item->created_at->format('H:i:s') }}</td>
                                    <td>
                                        {{-- <a class="btn btn-success mb-3" a href="{{ route('cetakAntrian') }}"
                                            target="_blank">Cetak</a> --}}

                                        <a class="btn btn-warning mb-3" wire:click="editAntrian({{ $item->id }})"
                                            role="button" data-bs-toggle="modal" data-bs-target="#editAntrian">Edit</a>

                                        <button type="button" class="btn btn-danger mb-3"
                                            wire:click="deleteAntrian({{ $item->id }})" role="button"
                                            data-bs-toggle="modal" data-bs-target="#deleteAntrian">Hapus</button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            {{-- Jangan Tampilkan Apa-apa --}}
        @endif

        @include('livewire.antrian.editAntrian')

        @include('livewire.antrian.createAntrian')

        @auth
            <!-- Button Modal -->
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#createAntrian">
                <i class="bi bi-file-plus me-1"></i>Ambil Antrian
            </button>
        @else
            <a href="/login" type="button" class="btn btn-primary my-3">
                <i class="bi bi-file-plus me-1"></i>Login Untuk Ambil Antrian
            </a>
        @endauth

        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <select class="form-select" wire:model="paket">
                        <option value="">Sortir Berdasarkan Paket</option>
                        <option value="cut">Hair Cut</option>
                        <option value="look">Good Look</option>
                        <option value="mood">Good Mood</option>
                        <option value="enjoy">Hair Enjoy</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_id">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">No</th>
                                {{-- <th scope="col">No Antrian</th> --}}
                                <th scope="col">Nama</th>
                                {{-- <th scope="col">Nomor HP</th> --}}
                                <th scope="col">Paket</th>
                                <th scope="col">Waktu antrian</th>
                                <th scope="col">Tgl. Antrian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($antrian as $item)
                                <tr style="text-align: center">
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $item->no_antrian }}</td> --}}
                                    <td>{{ $item->nama }}</td>
                                    {{-- <td>{{ $item->no_hp }}</td> --}}
                                    <td>{{ $item->paket }}</td>
                                    <td>{{ $item->created_at->format('H:i:s') }}</td>
                                    <td>{{ $item->tanggal_antrian }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $antrian->links() }}
            </div>
        </div>
    </div>
    @include('livewire.antrian.deleteAntrian')
</section><!-- End Hero -->

