@extends('layouts.base')
@section('title', 'Produk 2022')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk 2022</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a href="{{ route('produksatu.create') }}" class="btn btn-md btn-success mb-3"><i
                            class="fa fa-cart-plus" aria-hidden="true"></i> TAMBAH</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Produk/Type</th>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Rumah Sakit</th>
                                    <th class="text-center">Distributor</th>
                                    <th class="text-center">Tanggal Instalasi</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">PIC</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $no=1; @endphp
                                @foreach($produksatu as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->no_seri }}</td>
                                    <td>{{ $item->rumah_sakit }}</td>
                                    <td>{{ $item->distributor }}</td>
                                    <td>{{ $item->tgl_instalasi }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <a download href="dokumenproduksatu/{{$item->dokumen}}"><button
                                                class="btn btn-secondary btn-xs"><i class="fa fa-print"
                                                    aria-hidden="true"></i>
                                            </button></a>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('produksatu.edit', $item->id) }}"
                                            class="btn btn-primary btn-xs mb-1 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('produksatu.destroy', $item->id) }}" method="post"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger btn-xs mb-1">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection