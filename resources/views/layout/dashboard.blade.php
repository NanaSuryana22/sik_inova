@extends('layout\app')
@section('title', 'Halaman Utama')
@section('dashboard', 'active')
@section('content')
<div class="container-fluid">
    <!-- CPU Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Selamat Datang Di Aplikasi Sistem Informasi Klinik <br /><b> {{ Auth::user()->name }} </b> - Anda Login Sebagai <b> {{ Auth::user()->role->name }}</b></h2>
                        </div>
                        <div class="col-xs-12 col-sm-6 align-right">
                            <div class="switch panel-switch-btn">
                                <span class="m-r-10 font-12">REAL TIME</span>
                                <label>OFF<input type="checkbox" id="realtime" checked><span
                                        class="lever switch-col-cyan"></span>ON</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div id="real_time_chart" class="dashboard-flot-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
</div>
@endsection
