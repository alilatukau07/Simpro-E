<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Kategori::all();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'kategori.action')
                ->toJson();
        }
        return view('kategori.index');
    }

    public function create()
    {
        return view('kategori.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_kategori' => "required|string|max:50|unique:kategori,nama_kategori",
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {
            Kategori::create([
                'nama_kategori'   => $request->nama_kategori,
            ]);
            // Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            // Alert::toast('Data gagal disimpan', 'error');
            return redirect()->route('kategori.index');
        }
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();

        return redirect()->route('kategori.index');
    }

    // method untuk menghapus user
    public function destroy(Kategori $kategori)
    {
        DB::beginTransaction();
        try {
            $kategori->delete();
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
