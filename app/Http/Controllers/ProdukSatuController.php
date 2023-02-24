<?php

namespace App\Http\Controllers;

use App\Models\ProdukSatu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class ProdukSatuController extends Controller
{
    public function index()
    {
        $produksatu = ProdukSatu::all();
        return view('produksatu.index', compact('produksatu'));
    }

    public function create()
    {
        return view('produksatu.add');
    }

    // method untuk menambahkan user
    public function store(Request $request)
    {
        $data = ProdukSatu::create($request->all());
        if ($request->hasFile('dokumen')) {
            $request->file('dokumen')->move('dokumenproduksatu/', $request->file('dokumen')->getClientOriginalName());
            $data->dokumen = $request->file('dokumen')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('produksatu.index')->with('success', 'Produk Berhasil Ditambah!');
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
        $data = ProdukSatu::find($id);
        $data->update($request->all());
        if ($request->hasFile('dokumen')) {
            $request->file('dokumen')->move('dokumenproduksatu/', $request->file('dokumen')->getClientOriginalName());
            $data->dokumen = $request->file('dokumen')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('produksatu.index')->with('success', 'Produk Berhasil Diupdate!');
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
            return redirect()->back()->with('success', 'Produk Berhasil Dihapus!');
        }
    }
}
