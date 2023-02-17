@extends('layouts.base')
@section('title', 'Tambah Kategori')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group ">
                        <a href="{{ route('kategori.index') }}" class="btn btn-warning" style="float: right"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('kategori.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kategori">Nama Produk/Type</label>
                                <input class="form-control @error('nama_kategori') is-invalid @enderror"
                                    id="nama_kategori" type="text" value="{{ old('nama_kategori')  }}"
                                    placeholder="Masukan Nama Kategori" name="nama_kategori" autocomplete="off">
                                @error('nama_kategori')
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