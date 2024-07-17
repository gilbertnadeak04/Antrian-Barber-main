@extends('dashboard.layouts.main')

@section('content')

    <div >
        <livewire:dashboard.daftar-paket.dashboard-paket-cut>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#panggilAntrian').modal('hide')
        })
    </script>
@endsection