@extends('partial.master')

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Sistem yang dapat dimanfaatkan oleh Civitas Akademik Program Studi
                        Teknik Informatika untuk Mengetahui Bidang Minat Skripsi.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--2">
            <div class="col-sm-6 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="pe-7s-users text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Mahasiswa</p>
                                    <h4 class="card-title">{{ count($mahasiswa) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="pe-7s-wallet text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Mata Kuliah</p>
                                    <h4 class="card-title">{{ count($matkul) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 align="center">Tren Bidang Skripsi</h3>
                        <canvas id="myChart" width="100" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
    integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    $(document).ready(function () {

        fetch("{{route('analisis.get_chart_data')}}", {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                },
                cache: 'no-cache',
                method: 'GET'
            }).then((res) => res.json())
            .then((res) => {
                console.log(res)
                let data = []
                Object.keys(res).map(key => {
                    data.push(res[key])
                })

                init_chart(res);
            })
            .catch(() => {
                console.log('gagal')
            })


    })

    function init_chart(res) {

        const myChart = new Chart(ctx, {
            type: 'bar',

            data: {
                labels: res.labels,
                datasets: [{
                    label: 'C1',
                    data: res.dataset_1,

                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',

                    ],
                    borderWidth: 1
                }, {
                    label: 'C2',
                    data: res.dataset_2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',

                    ],
                    borderWidth: 1
                }, {
                    label: 'C3',
                    data: res.dataset_3,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            suggestedMin: 0, // minimum will be 0, unless there is a lower value.
                            // OR //
                            beginAtZero: true // minimum value will be 0.
                        }
                    }]
                },
                plugins: {
                    tooltip: {
                        usePointStyle: true,
                        callbacks: {
                            labelPointStyle: function (context) {
                                console.log(context)
                                return 'text';
                            }
                        }
                    }
                }
            }

        });
    }

</script>
@endsection
