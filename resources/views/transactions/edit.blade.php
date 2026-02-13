<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f6;
            padding: 16px;
        }

        .card {
            background: white;
            padding: 16px;
            border-radius: 8px;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            background: #2196f3;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="card">
    <h3>Edit Transaksi</h3>

    <form action="{{ route('transaksi.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Jenis</label>
        <select name="type">
            <option value="pemasukan" {{ $transaction->type == 'pemasukan' ? 'selected' : '' }}>
                Pemasukan
            </option>
            <option value="pengeluaran" {{ $transaction->type == 'pengeluaran' ? 'selected' : '' }}>
                Pengeluaran
            </option>
        </select>

        <label>Keterangan</label>
        <input type="text" name="keterangan" value="{{ $transaction->keterangan }}">

        <label>Jumlah</label>
        <input type="number" name="amount" value="{{ $transaction->amount }}">

        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $transaction->tanggal }}">

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
