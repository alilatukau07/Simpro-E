@extends('layouts.base')
@section('title', 'Maintenance')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Maintenance</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if (Auth::user()->level == 'User')
                    <a href="{{route('maintenance.create')}}" class="btn btn-md btn-success mb-3">Pengajuan</a>
                    @endif
                    @foreach ($maintenance as $item)
                    <h5>Nama Produk/Type : {{$item->nama_produk}}</h5>
                    <h5>No Seri : {{$item->no_seri}}</h5>
                    <h5>Rumah Sakit : {{$item->rumah_sakit}}</h5>
                    <h5>Distributor : {{$item->distributor}}</h5>
                    <h5>Tanggal Instalasi : {{$item->tgl_instalasi}}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal Pengajual</th>
                                    <th class="text-center">Permintaan</th>
                                    <th class="text-center">Tindakan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->permintaan}}</td>
                                <td>{{$item->tindakan}}</td>
                                <td>{{$item->status}}</td>
                                {{-- <td class="d-flex justify-content-center">
                                    <a href="{{ route('maintenance.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#modalHapusMaintenance{{$item->id}}" method="post"
                                        class="btn btn-danger btn-sm" data-toggle="modal">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td> --}}
                                <td class="d-flex justify-content-center">
                                    @if (Auth::user()->level == 'Admin')
                                    <a href="{{ route('maintenance.edit', $item->id) }}"
                                        class="btn btn-primary btn-xs mb-1 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                    <form action="{{ route('maintenance.destroy', $item->id) }}" method="post"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-xs mb-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection