<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect('/login');
});

// LOGIN
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function () {
    return redirect('/keuangan');
});

// DAFTAR
Route::get('/daftar', function () {
    return view('auth.daftar');
});

Route::post('/daftar', function () {
    return redirect('/login');
});

// DASHBOARD
Route::get('/keuangan', [TransactionController::class, 'index'])
    ->name('keuangan');

// PEMASUKAN
Route::get('/pemasukan', [TransactionController::class, 'pemasukan'])
    ->name('pemasukan');

// PENGELUARAN
Route::get('/pengeluaran', [TransactionController::class, 'pengeluaran'])
    ->name('pengeluaran');

// SIMPAN
Route::post('/transaksi/store', [TransactionController::class, 'store'])
    ->name('transaksi.store');

// EDIT
Route::get('/transaksi/{id}/edit', [TransactionController::class, 'edit'])
    ->name('transaksi.edit');

// UPDATE
Route::put('/transaksi/{id}', [TransactionController::class, 'update'])
    ->name('transaksi.update');

 // HAPUS TRANSAKSI
Route::delete('/transaksi/{id}', [TransactionController::class, 'destroy'])
    ->name('transaksi.destroy');
   
// LOGOUT
Route::post('/logout', function () {
    return redirect('/login');
})->name('logout');
