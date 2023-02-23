<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.add');
    }

    // method untuk menambahkan user
    public function store(Request $request)
    {
        $data = User::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotousers/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('users.index')->with('success', 'User Berhasil Ditambah!');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    // method untuk mengupdate user
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotousers/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('users.index')->with('success', 'User Berhasil Diupdate!');
    }

    // method untuk menghapus user
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();
            // Alert::toast('Data berhasil dihapus', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Alert::toast('Data gagal dihapus', 'error');
        } finally {
            DB::commit();
            return redirect()->back()->with('success', 'User Berhasil Dihapus!');
        }
    }

    public function exportpdf()
    {
        $user = User::all();

        view()->share('user', $user);
        $pdf = PDF::loadview('users.userspdf');
        // return $pdf->download('DataKaryawan.pdf');
        return $pdf->setPaper('a3', 'portail')->setOptions(['defaultFont' => 'serif'])->download('DataKaryawan.pdf');
    }
}
