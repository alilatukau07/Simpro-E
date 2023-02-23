<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $maintenance = Maintenance::all();
        return view('home.index', [
            'user' => DB::table('users')->count(),
            'kategori' => DB::table('kategori')->count(),
            'distributor' => DB::table('distributor')->count(),
            'produksatu' => DB::table('produksatu')->count(),
        ], compact('maintenance'));
    }
}
