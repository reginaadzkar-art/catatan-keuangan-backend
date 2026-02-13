<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('type'); // jenis transaksi: pemasukan/pengeluaran
            $table->integer('amount'); // jumlah uang
            $table->text('keterangan')->nullable(); // catatan
            $table->date('tanggal'); // tanggal transaksi
            $table->timestamps(); // created_at & updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
