<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'user' => DB::table('users')->count(),
            'kategori' => DB::table('kategori')->count(),
            'distributor' => DB::table('distributor')->count(),
        ]);
    }
}
