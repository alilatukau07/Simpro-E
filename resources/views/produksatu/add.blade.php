@extends('layouts.base')
@section('title', 'Tambah Produk 2022')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Produk 2022</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group ">
                        <a href="{{ route('produksatu.index') }}" class="btn btn-warning" style="float: right"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('produksatu.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_produk">Nama Produk/Type</label>
                                <select name="nama_produk"
                                    class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk"
                                    required>
                                    <option value="" hidden="">
                                        --Pilih Produk--</option>
                                    <option value="Anesthesia Machine AN350">Anesthesia Machine AN350</option>
                                    <option value="Anesthesia Machine A8500">Anesthesia Machine A8500</option>
                                    <option value="Anesthesia Machine A8500 TC">Anesthesia Machine A8500 TC</option>
                                    <option value="Anesthesia Machine A8500 GS">Anesthesia Machine A8500 GS</option>
                                    <option value="Baby Inkubator B1001">Baby Inkubator B1001</option>
                                    <option value="Baby Inkubator B1002">Baby Inkubator B1002</option>
                                    <option value="Baby Inkubator B1003">Baby Inkubator B1003</option>
                                    <option value="Electro Surgery Unit NSR ES300">Electro Surgery Unit NSR ES300
                                    </option>
                                    <option value="Electro Surgery Unit NSR ES400">Electro Surgery Unit NSR ES400
                                    </option>
                                    <option value="Fetal Monitor NSR FM 12">Fetal Monitor NSR FM 12</option>
                                    <option value="Fetal Monitor NSR FM 12">Fetal Monitor NSR FM 15</option>
                                    <option value="Fetal Monitor NSR FM 12">Fetal Monitor NSR FM 18</option>
                                    <option value="Operating Lamp Sinar 5050">Operating Lamp Sinar 5050</option>
                                    <option value="Operating Lamp Sinar 7050">Operating Lamp Sinar 7050</option>
                                    <option value="Operating Lamp Sinar 7070">Operating Lamp Sinar 7070</option>
                                    <option value="Operating Table OT 6500">Operating Table OT 6500</option>
                                    <option value="Patient Monitor NSR PM1000">Patient Monitor NSR PM1000</option>
                                    <option value="Patient Monitor NSR PM1200">Patient Monitor NSR PM1200</option>
                                    <option value="Suction Pump NSR SC 3000">Suction Pump NSR SC 3000</option>
                                    <option value="Suction Pump NSR SC 3L">Suction Pump NSR SC 3L</option>
                                    <option value="Ultrasonic Pocket Doppler NSR FD1">Ultrasonic Pocket Doppler NSR FD1
                                    </option>
                                    <option value="Oxygen Generator – NSR G60">Oxygen Generator – NSR G60</option>
                                    <option value="Oxygen Generator – NSR G120">Oxygen Generator – NSR G120</option>
                                    <option value="Oxygen Generator – NSR G180">Oxygen Generator – NSR G180</option>
                                    <option value="USG Makna & D MD12">USG Makna & D MD12</option>
                                    <option value="USG Makna & D MD12A">USG Makna & D MD12A</option>
                                </select>
                                @error('nama_produk')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_seri">No Seri</label>
                                <input class="form-control @error('no_seri') is-invalid @enderror" id="no_seri"
                                    type="text" value="{{ old('no_seri')  }}" placeholder="Masukan No Seri"
                                    name="no_seri" autocomplete="off">
                                @error('no_seri')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="distributor">Distributor</label>
                                <select name="distributor"
                                    class="form-control @error('distributor') is-invalid @enderror" id="distributor"
                                    required>
                                    <option value="" hidden="">
                                        --Pilih Distributor--</option>
                                    <option value="PT. Rajawali Nusindo">PT. Rajawali Nusindo</option>
                                    <option value="PT. Mitra Inti Medika">PT. Mitra Inti Medika</option>
                                    <option value="PT. Prima Citra Inovindo">PT. Prima Citra Inovindo</option>
                                </select>
                                @error('distributor')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="rumah_sakit">Rumah Sakit</label>
                                <input class="form-control @error('rumah_sakit') is-invalid @enderror" id="rumah_sakit"
                                    type="text" value="{{ old('rumah_sakit')}}" placeholder="Masukan Rumah Sakit"
                                    name="rumah_sakit" autocomplete="off">
                                @error('rumah_sakit')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl_instalasi">Tanggal Instalasi</label>
                                <input class="form-control @error('tgl_instalasi') is-invalid @enderror"
                                    id="tgl_instalasi" type="date" value="{{ old('tgl_instalasi')}}"
                                    placeholder="dd/mm/yyyy" name="tgl_instalasi" autocomplete="off">
                                @error('tgl_instalasi')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <input class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                    type="text" value="{{ old('keterangan') }}" placeholder="Masukan Keterangan"
                                    name="keterangan" autocomplete="off">
                                @error('keterangan')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
            $('#select2-component').select2();
        });
</script>
@endpush