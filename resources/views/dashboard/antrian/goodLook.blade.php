@extends('dashboard.layouts.main')

@section('content')

    <div >
        <livewire:dashboard.daftar-paket.dashboard-paket-look>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#panggilAntrian').modal('hide')
        })
    </script>
@endsection