<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;


class DistributorController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Distributor::all();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'distributor.action')
                ->toJson();
        }
        return view('distributor.index');
    }

    public function create()
    {
        return view('distributor.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_distributor' => "required|string|max:50|unique:distributor,nama_distributor",
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {
            Distributor::create([
                'nama_distributor'   => $request->nama_distributor,
            ]);
            // Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('distributor.index');
        } catch (\Throwable $th) {
            // Alert::toast('Data gagal disimpan', 'error');
            return redirect()->route('distributor.index');
        }
    }

    public function edit(Distributor $distributor)
    {
        return view('distributor.edit', [
            'distributor' => $distributor,
        ]);
    }

    public function update(Request $request, $id)
    {
        $distributor = Distributor::find($id);

        $distributor->nama_distributor = $request->nama_distributor;

        $distributor->save();

        return redirect()->route('distributor.index');
    }

    // method untuk menghapus user
    public function destroy(Distributor $distributor)
    {
        DB::beginTransaction();
        try {
            $distributor->delete();
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
