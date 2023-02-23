@extends('layouts.base')
@section('title', 'Home')
@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$produksatu}} Produk
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-shopping-bag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kategori}} Kategori</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Distributor
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$distributor}}
                                        Distributor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}} Users</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Maintenance</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div class="table-responsive text-center">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama dan Type Alat</th>
                                        <th>No SN</th>
                                        <th>Rumah Sakit</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Permintaan</th>
                                        <th>Tindakan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($maintenance as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ $item->no_seri }}</td>
                                        <td>{{ $item->rumah_sakit }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->permintaan }}</td>
                                        <td>{{ $item->tindakan }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </figure>
                </div>
            </div>
        </div>


        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Laporan Produk</h6>
                </div>
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="chartProduk"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartProduk', {
    chart: {
    type: 'column'
    },
    title: {
    text: 'Per Tahun 2018 - 2022'
    },
    xAxis: {
    categories: [
    '2018',
    '2019',
    '2020',
    '2021',
    '2022'
    ],
    crosshair: true
    },
    yAxis: {
    min: 0,
    title: {
    text: 'Jumlah'
    }
    },
    tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Produk</b></td></tr>',
        footerFormat: '</table>',
    shared: true,
    useHTML: true
    },
    plotOptions: {
    column: {
    pointPadding: 0.2,
    borderWidth: 0
    }
    },
    series: [{
    name: 'Produk',
    data: [0, 0, 0, 0, {{$produksatu}}]
    }]
    });
</script>
@endsection