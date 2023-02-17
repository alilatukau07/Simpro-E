<?php

namespace App\Http\Controllers;

use App\Models\ProdukSatu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class ProdukSatuController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = ProdukSatu::all();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'produksatu.action')
                ->toJson();
        }
        return view('produksatu.index');
    }

    public function create()
    {
        return view('produksatu.add');
    }

    // method untuk menambahkan user
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_produk' => "required|string|max:50",
                'no_seri' => "required|string|unique:produksatu,no_seri",
                'distributor' => "required|string|max:50",
                'rumah_sakit' => "required|string|max:50",
                'tgl_instalasi' => "required",
                'keterangan' => "required"
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {
            ProdukSatu::create([
                'nama_produk'   => $request->nama_produk,
                'no_seri'   => $request->no_seri,
                'distributor'   => $request->distributor,
                'rumah_sakit'   => $request->rumah_sakit,
                'tgl_instalasi'   => $request->tgl_instalasi,
                'keterangan'   => $request->keterangan,
            ]);
            // Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('produksatu.index');
        } catch (\Throwable $th) {
            // Alert::toast('Data gagal disimpan', 'error');
            return redirect()->route('produksatu.index');
        }
    }

    public function edit(ProdukSatu $produksatu)
    {
        return view('produksatu.edit', [
            'produksatu' => $produksatu,
        ]);
    }

    // method untuk mengupdate user
    public function update(Request $request, $id)
    {
        $produksatu = ProdukSatu::find($id);

        $produksatu->nama_produk = $request->nama_produk;
        $produksatu->no_seri = $request->no_seri;
        $produksatu->distributor = $request->distributor;
        $produksatu->rumah_sakit = $request->rumah_sakit;
        $produksatu->tgl_instalasi = $request->tgl_instalasi;
        $produksatu->keterangan = $request->keterangan;

        $produksatu->save();

        return redirect()->route('produksatu.index');
    }

    // method untuk menghapus user
    public function destroy(ProdukSatu $produksatu)
    {
        DB::beginTransaction();
        try {
            $produksatu->delete();
            // Alert::toast('Data berhasil dihapus', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Alert::toast('Data gagal dihapus', 'error');
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
}
