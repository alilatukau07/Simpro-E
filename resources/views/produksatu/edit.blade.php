@extends('layouts.base')
@section('title', 'Edit Produk')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group ">
                        <a href="{{ route('produksatu.index') }}" class="btn btn-warning" style="float: right"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col-md-10">
                        <form method="POST" action="{{ route('produksatu.update', $produksatu->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_produk">Nama Produk/Type</label>
                                <input class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk"
                                    type="text"
                                    value="{{ old('nama_produk') ? old('nama_produk') : $produksatu->nama_produk }}"
                                    placeholder="Masukan Nama Produk" name="nama_produk" autocomplete="off">
                                @error('nama_produk')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_seri">No Seri</label>
                                <input class="form-control @error('no_seri') is-invalid @enderror" id="no_seri"
                                    type="text" value="{{ old('no_seri') ? old('no_seri') : $produksatu->no_seri }}"
                                    placeholder="Masukan No Seri" name="no_seri" autocomplete="off" readonly>
                                @error('no_seri')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="distributor">Distributor</label>
                                <select name="distributor"
                                    class="form-control @error('distributor') is-invalid @enderror" id="distributor"
                                    required>
                                    <option
                                        value="{{ old('distributor') ? old('distributor') : $produksatu->distributor }}"
                                        hidden="">{{$produksatu->distributor}}</option>
                                    <option value="PT. Rajawali Nusindo">PT. Rajawali Nusindo</option>
                                    <option value="PT. Mitra Inti Medika">PT. Mitra Inti Medika</option>
                                    <option value="PT. Prima Citra Inovindo">PT. Prima Citra Inovindo</option>
                                </select>
                                {{-- <input class="form-control @error('distributor') is-invalid @enderror"
                                    id="distributor" type="text"
                                    value="{{ old('distributor') ? old('distributor') : $produksatu->distributor }}"
                                    placeholder="Masukan Distributor" name="distributor" autocomplete="off"> --}}
                                @error('distributor')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="rumah_sakit">Rumah Sakit</label>
                                <input class="form-control @error('rumah_sakit') is-invalid @enderror" id="rumah_sakit"
                                    type="text"
                                    value="{{ old('rumah_sakit') ? old('rumah_sakit') : $produksatu->rumah_sakit }}"
                                    placeholder="Masukan Rumah Sakit" name="rumah_sakit" autocomplete="off">
                                @error('rumah_sakit')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl_instalasi">Tanggal Instalasi</label>
                                <input class="form-control @error('tgl_instalasi') is-invalid @enderror"
                                    id="tgl_instalasi" type="date"
                                    value="{{ old('tgl_instalasi') ? old('tgl_instalasi') : $produksatu->tgl_instalasi }}"
                                    placeholder="Masukan Tanggal Instalasi" name="tgl_instalasi" autocomplete="off">
                                @error('tgl_instalasi')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <input class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                    type="text"
                                    value="{{ old('keterangan') ? old('keterangan') : $produksatu->keterangan }}"
                                    placeholder="Masukan Keterangan" name="keterangan" autocomplete="off">
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