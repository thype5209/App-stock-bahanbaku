<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk_airs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang_masuk' ,50)->unique()->autoIncrement();
            $table->string('bahan');
            $table->integer('bahan_baku_air_id');
            $table->integer('supplier_id');
            $table->integer('jumlah_pembelian');
            $table->string('harga',50);
            $table->string('sub_total',50);
            $table->date('tgl_masuk')->nullable();
            // $table->unsignedBigInteger('transaksi_id');
            $table->foreignId('transaksi_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('status', ['Belum Konfirmasi','Konfirmasi', 'Proses', 'Selesai']);
            // $table->date('tgl_pengiriman')->nullable();
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
        Schema::dropIfExists('barang_masuk_airs');
    }
}
