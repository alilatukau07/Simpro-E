@extends('layouts.base')
@section('title', 'Edit Maintenance')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Maintenance</h1>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group ">
                        <a href="{{ route('maintenance.index') }}" class="btn btn-warning" style="float: right"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col-md-10">
                        <form method="POST" action="{{ route('maintenance.update', $maintenance->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror"
                                    id="status" required>
                                    <option value="{{ old('status') ? old('status') : $maintenance->status }}"
                                        hidden="">{{$maintenance->status}}</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                                </select>
                                @error('status')
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