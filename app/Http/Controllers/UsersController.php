<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = User::all();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', 'users.action')
                ->toJson();
        }
        return view('users.index');
    }

    public function create()
    {
        return view('users.add');
    }

    // method untuk menambahkan user
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:users,name",
                'email' => "required|email|unique:users,email",
                'password' => "required|min:6|confirmed",
                'no_hp' => "required",
                'level' => "required"
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {
            User::create([
                'name'   => $request->name,
                'email'   => $request->email,
                'password'   => Hash::make($request->password),
                'level'   => $request->level,
                'no_hp'   => $request->no_hp,
            ]);
            // Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            // Alert::toast('Data gagal disimpan', 'error');
            return redirect()->route('users.index');
        }
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    // method untuk mengupdate user
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:users,name, " . $user->id,
                'email' => "required|email|unique:users,email," . $user->id,
                'password' => "confirmed",
                'level' => "required",
                'no_hp' => "required"
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            $user = User::findOrFail($user->id);
            if ($request->password == "" || $request->password == null) {
                $user->update([
                    'name'   => $request->name,
                    'email'   => $request->email,
                ]);
            } else {
                $user->update([
                    'name'   => $request->name,
                    'email'   => $request->email,
                    'password'   => Hash::make($request->password),
                ]);
            }
            // Alert::toast('Data berhasil diupdate', 'success');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Alert::toast('Data gagal diupdate', 'error');
            return redirect()->route('users.index');
        } finally {
            DB::commit();
        }
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
            return redirect()->back();
        }
    }
}
