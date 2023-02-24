<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksatu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('no_seri');
            $table->string('distributor');
            $table->string('rumah_sakit');
            $table->string('tgl_instalasi');
            $table->string('keterangan');
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produksatu');
    }
};
