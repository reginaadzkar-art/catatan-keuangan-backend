<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catatan Keuangan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #eef2f7;
            margin: 0;
            padding: 20px;
        }

        /* CARD */
        .card {
            background: white;
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .green { color: #2e7d32; font-weight: bold; }
        .red { color: #c62828; font-weight: bold; }

        /* LOGOUT */
        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 14px;
        }

        .logout-btn {
            background: #555;
            color: white;
            border: none;
            padding: 9px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #333;
        }

        /* BUTTON */
        .btn {
            width: 48%;
            padding: 14px;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-green {
            background: linear-gradient(135deg, #43cea2, #2e7d32);
        }

        .btn-red {
            background: linear-gradient(135deg, #ff6f61, #c62828);
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            margin-bottom: 18px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: center;
            font-size: 14px;
        }

        th {
            background: #f5f7fa;
            font-weight: bold;
        }

        tr:hover {
            background: #f9fafb;
        }

        /* ACTION BUTTON */
        .btn-edit {
            background: #2196f3;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            margin-right: 4px;
        }

        .btn-edit:hover {
            background: #1976d2;
        }

        .btn-delete {
            background: #f44336;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            font-size: 12px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #c62828;
        }

        /* FOOTER RINGKASAN */
        .footer {
            display: flex;
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .footer div {
            flex: 1;
            padding: 16px;
            text-align: center;
            border-right: 1px solid #eee;
        }

        .footer div:last-child {
            border-right: none;
        }
    </style>
</head>
<body>

<!-- PESAN SUKSES -->
@if(session('success'))
    <div class="card green">
        {{ session('success') }}
    </div>
@endif

<!-- LOGOUT -->
<div class="top-bar">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn" onclick="return confirm('Yakin mau logout?')">
            Logout
        </button>
    </form>
</div>

<!-- TABEL TRANSAKSI -->
<table>
    <tr>
        <th>Tanggal</th>
        <th>Jenis</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>

    @forelse($transactions as $t)
    <tr>
        <td>{{ $t->tanggal }}</td>

        <td class="{{ $t->type == 'pemasukan' ? 'green' : 'red' }}">
            {{ ucfirst($t->type) }}
        </td>

        <td>{{ $t->keterangan }}</td>

        <td class="{{ $t->type == 'pemasukan' ? 'green' : 'red' }}">
            {{ number_format($t->amount, 0, ',', '.') }}
        </td>

        <td>
            <a href="{{ route('transaksi.edit', $t->id) }}" class="btn-edit">Edit</a>

            <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn-delete" onclick="return confirm('Yakin mau hapus data ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">Belum ada transaksi</td>
    </tr>
    @endforelse
</table>

<!-- TOMBOL -->
<div style="display:flex; justify-content:space-between; margin-bottom:18px;">
    <a href="/pemasukan" class="btn btn-green">Kamu Menerima</a>
    <a href="/pengeluaran" class="btn btn-red">Kamu Membayar</a>
</div>

<!-- RINGKASAN -->
@php
    $totalPemasukan = $transactions->where('type', 'pemasukan')->sum('amount');
    $totalPengeluaran = $transactions->where('type', 'pengeluaran')->sum('amount');
    $saldo = $totalPemasukan - $totalPengeluaran;
@endphp

<div class="footer">
    <div>
        <strong>Total Menerima</strong><br>
        <span class="green">{{ number_format($totalPemasukan, 0, ',', '.') }}</span>
    </div>
    <div>
        <strong>Total Membayar</strong><br>
        <span class="red">{{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
    </div>
    <div>
        <strong>Saldo</strong><br>
        <span class="{{ $saldo >= 0 ? 'green' : 'red' }}">
            {{ number_format($saldo, 0, ',', '.') }}
        </span>
    </div>
</div>

</body>
</html>
