<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenance = Maintenance::all();
        return view('maintenance.index', compact('maintenance'));
    }

    public function create()
    {
        return view('maintenance.add');
    }

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
                'permintaan' => "required",
                'tindakan' => "required",
                'status' => "required",
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {

            Maintenance::create([
                'nama_produk'   => $request->nama_produk,
                'no_seri'   => $request->no_seri,
                'distributor'   => $request->distributor,
                'rumah_sakit'   => $request->rumah_sakit,
                'tgl_instalasi'   => $request->tgl_instalasi,
                'permintaan'   => $request->permintaan,
                'tindakan'   => $request->tindakan,
                'status'   => $request->status,
            ]);
            // Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('maintenance.index');
        } catch (\Throwable $th) {
            // Alert::toast('Data gagal disimpan', 'error');
            return redirect()->route('maintenance.index');
        }
    }

    public function edit(Maintenance $maintenance)
    {
        return view('maintenance.edit', [
            'maintenance' => $maintenance,
        ]);
    }

    public function update(Request $request, $id)
    {
        $maintenance = Maintenance::find($id);

        $maintenance->status = $request->status;

        $maintenance->save();

        return redirect()->route('maintenance.index');
    }

    public function destroy(Maintenance $maintenance)
    {
        DB::beginTransaction();
        try {
            $maintenance->delete();
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
