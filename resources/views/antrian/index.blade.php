@extends('layouts.landing')

@section('content')
<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 pt-70 text-center">
                        <h1 class="display-3 text-white animated zoomIn">Kelola Antrian</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="antrian-container"">
        <livewire:antrian.show-antrian>
    </div>

    
@endsection

@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#createAntrian').modal('hide')
            $('#editAntrian').modal('hide')
            $('#deleteAntrian').modal('hide')
        })
    
    </script>
@endsection
