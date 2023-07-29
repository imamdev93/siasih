@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Nilai Siswa Berdasarkan Mata Pelajaran</h5>
                        <div class="ibox-tools">
    
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="grafik_nilai"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var optionsWallet = {
            series: {!! json_encode($values) !!},
            chart: {
                type: 'bar',
                height: 350,
                // stacked: true,
            },

            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            legend: {
                position: 'bottom',
                horizontalAlign: 'left'
            },
            yaxis: {
                
            },
            xaxis: {
                categories: {!! json_encode($labels) !!},
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: "horizontal",
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 0.85,
                    opacityTo: 0.85,
                    stops: [50, 0, 100]
                },
            },
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    columnWidth: '80%',
                }
            }
        };

        var chartWallet = new ApexCharts(document.querySelector("#grafik_nilai"), optionsWallet);
        chartWallet.render();
    </script>
@endpush
