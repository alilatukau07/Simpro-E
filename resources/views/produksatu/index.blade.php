@extends('layouts.base')
@section('title', 'Produk')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk 2022</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a href="{{ route('produksatu.create') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Produk/Type</th>
                                    <th class="text-center">No. Seri</th>
                                    <th class="text-center">Distributor</th>
                                    <th class="text-center">Rumah Sakit</th>
                                    <th class="text-center">Tanggal Instalasi</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'nama_produk',
                name: 'nama_produk'
            },
            {
                data: 'no_seri',
                name: 'no_seri'
            },
            {
                data: 'distributor',
                name: 'distributor'
            },
            {
                data: 'rumah_sakit',
                name: 'rumah_sakit'
            },
            {
                data: 'tgl_instalasi',
                name: 'tgl_instalasi'
            },
            {
                data: 'keterangan',
                name: 'keterangan'
            },
        ]

        columns.push({
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        })

        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('produksatu.index') }}",
            columns: columns
        });
</script>
@endpush