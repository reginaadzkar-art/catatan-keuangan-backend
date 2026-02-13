<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catatan Keuangan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f6;
            margin: 0;
            padding: 16px;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 12px;
        }

        .green { color: #2e7d32; font-weight: bold; }
        .red { color: #c62828; font-weight: bold; }

        /* BUTTON */
        .btn {
            width: 48%;
            padding: 12px;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-green { background: #4caf50; }
        .btn-red { background: #f44336; }

        /* FOOTER RINGKASAN */
        .footer {
            display: flex;
            text-align: center;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .footer div {
            flex: 1;
            padding: 10px;
            border-right: 1px solid #ddd;
        }

        .footer div:last-child {
            border-right: none;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #f5f5f5;
        }

        .btn-edit {
            background: #2196f3;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-delete {
            background: #f44336;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            border: none;
            font-size: 12px;
            cursor: pointer;
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

<div style="display:flex; justify-content:flex-end; margin-bottom:12px;">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            style="
                background:#555;
                color:white;
                border:none;
                padding:8px 14px;
                border-radius:6px;
                cursor:pointer;
                font-weight:bold;
            "
            onclick="return confirm('Yakin mau logout?')"
        >
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
    <div style="display:flex; justify-content:space-between; margin:16px 0;">
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
            <span class="green">
                {{ number_format($totalPemasukan, 0, ',', '.') }}
            </span>
        </div>
        <div>
            <strong>Total Membayar</strong><br>
            <span class="red">
                {{ number_format($totalPengeluaran, 0, ',', '.') }}
            </span>
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
