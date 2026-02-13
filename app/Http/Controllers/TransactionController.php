<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
    $transactions = Transaction::orderBy('tanggal', 'desc')->get();

    return view('keuangan.index', compact('transactions'));
    }

    public function pemasukan()
    {
        return view('transactions.pemasukan');
    }

    public function pengeluaran()
    {
        return view('transactions.pengeluaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:pemasukan,pengeluaran',
            'amount' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Transaction::create([
            'type' => $request->type,
            'amount' => $request->amount,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        // ⬇️ LANGSUNG PINDAH KE DASHBOARD KEUANGAN
        return redirect('/keuangan')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
    $transaction = Transaction::findOrFail($id);

    return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'type' => 'required|in:pemasukan,pengeluaran',
        'amount' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    $transaction = Transaction::findOrFail($id);

    $transaction->update([
        'type' => $request->type,
        'amount' => $request->amount,
        'keterangan' => $request->keterangan,
        'tanggal' => $request->tanggal,
    ]);

    return redirect()->route('keuangan')
        ->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
    $transaction = Transaction::findOrFail($id);
    $transaction->delete();

    return redirect()->route('keuangan')
        ->with('success', 'Data berhasil dihapus');
    }

}
