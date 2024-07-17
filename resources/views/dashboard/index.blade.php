@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="card mt-3" style="height: 800px">
            <div class="card-body">
                <div class="card-title">Dashboard</div>

                <div class="col-xxl col-xl-12">
                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Selamat Datang <span>| {{ auth()->user()->name }}</span></h5>
                            <div class="d-flex align-items-center">
                                <h2>SISTEM ANTRIAN ONLINE</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statistik antrain masuk dalam sebulan</h4>
                                <div>
                                    <canvas id="bar-chart" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statistik antrain masuk dalam seminggu</h4>
                                <div>
                                    <canvas id="bar-chart-week" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Informasi Antrian Masuk -->
                <div class="card-title">Antrian Masuk</div>

                <div class="row">
                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Hair Cut</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $hairCut }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Good Look</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bx-user-circle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $goodLook }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Good Mood</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user-voice"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $goodMood }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Hair Enjoy</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-group"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $hairEnjoy }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            "use strict";
            // Bar chart untuk statistik antrian dalam sebulan
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["Hair Cut", "Good Look", "Good Mood", "Hair Enjoy"],
                    datasets: [{
                        label: "Orderan",
                        backgroundColor: ["#6174d5", "#5f76e8", "#768bf4", "#7385df", "#b1bdfa"],
                        data: [{{ $hairCuts }}, {{ $goodLooks }}, {{ $goodMoods }},
                            {{ $hairEnjoys }}
                        ]
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Prediksi populasi dunia (jutaan) pada tahun 2050'
                    }
                }
            });

            // Bar chart untuk statistik antrian dalam seminggu
            new Chart(document.getElementById("bar-chart-week"), {
                type: 'bar',
                data: {
                    labels: ["Hair Cut", "Good Look", "Good Mood", "Hair Enjoy"],
                    datasets: [{
                        label: "Orderan",
                        backgroundColor: ["#6174d5", "#5f76e8", "#768bf4", "#7385df", "#b1bdfa"],
                        data: [{{ $hairCutss }}, {{ $goodLookss }}, {{ $goodMoodss }},
                            {{ $hairEnjoyss }}
                        ]
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Prediksi populasi dunia (jutaan) pada tahun 2050'
                    }
                }
            });
        });
    </script>
@endsection
