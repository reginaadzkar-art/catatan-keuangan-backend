<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemasukan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f6;
            margin: 0;
            padding: 16px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 16px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #2e7d32;
        }
        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
        .back {
            text-align: center;
            margin-top: 12px;
        }
        .back a {
            text-decoration: none;
            color: #4caf50;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pemasukan</h2>

    @if(session('success'))
        <p style="color: green; text-align:center;">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <!-- WAJIB -->
        <input type="hidden" name="type" value="pemasukan">

        <input type="number" name="amount" class="input" placeholder="Jumlah uang" required>

        <input type="text" name="keterangan" class="input" placeholder="Keterangan (opsional)">

        <input type="date" name="tanggal" class="input" required>

        <button type="submit" class="btn">SIMPAN</button>
    </form>

    <div class="back">
        <a href="/keuangan">← Kembali ke Keuangan</a>
    </div>
</div>

</body>
</html>
