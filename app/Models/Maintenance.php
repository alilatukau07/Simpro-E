<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenance';

    protected $fillable = [
        'nama_produk',
        'no_seri',
        'distributor',
        'rumah_sakit',
        'tgl_instalasi',
        'permintaan',
        'tindakan',
        'status',
    ];
}
