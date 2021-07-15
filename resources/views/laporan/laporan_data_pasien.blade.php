@extends('layout\app')
@section('title', 'Halaman Data Laporan Grafik Data Pasien')
@section('data_pasien', 'active')
@section('content')
<div id="container"></div>
@endsection
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var pasien =  <?php echo json_encode($pasien) ?>;

    Highcharts.chart('container', {
        title: {
            text: 'Data Pasien 2021'
        },
        subtitle: {
            text: 'Sistem Informasi Klinik - By Nana Suryana'
        },
         xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah pasien'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Data Pasien Baru',
            data: pasien
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 200
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>
@endpush

