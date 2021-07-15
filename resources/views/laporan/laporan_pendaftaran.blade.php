@extends('layout\app')
@section('title', 'Halaman Data Laporan Grafik Pendaftaran')
@section('pendaftaran', 'active')
@section('content')
<div id="container"></div>
@endsection
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var pendaftaran =  <?php echo json_encode($pendaftaran) ?>;

    Highcharts.chart('container', {
        title: {
            text: 'Pendaftaran Baru, 2021'
        },
        subtitle: {
            text: 'Sistem Informasi Klinik - By Nana Suryana'
        },
         xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pendaftaran'
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
            name: 'Pendaftaran Baru',
            data: pendaftaran
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
