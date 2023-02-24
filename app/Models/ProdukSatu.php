<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSatu extends Model
{
    use HasFactory;

    protected $table = 'produksatu';

    protected $fillable = [
        'nama_produk',
        'no_seri',
        'distributor',
        'rumah_sakit',
        'tgl_instalasi',
        'keterangan',
        'dokumen',
    ];
}
