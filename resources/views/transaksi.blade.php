<!DOCTYPE html>
<html>
<head>
    <title>Kelola Transaksi</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body class="transaksi">
    <div>
        <a href="/dashboard">< Kembali</a>
        <h1>Transaksi</h1>
    </div>
    <a href="/tambah-transaksi" style="text-decoration: none;"><button class="tambah">Tambah Transaksi</button></a>
    <h2>Daftar Transaksi</h2>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
                <th>Pesan</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tanggal_transaksi }}</td>
                <td>{{ $item->total_harga }}</td>
                <td>{{ $item->pesan }}</td>
                <td>{{ $item->tipe }}</td>
                <td>
                    <a href="/edit-transaksi/{{ $item->id }}"><button class="edit">Edit</button></a> |
                    <a href="/hapus-transaksi/{{ $item->id }}" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><button class="hapus">Hapus</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 style="margin-bottom: 25px;">Ringkasan Transaksi</h2>
    <table>
        <tr>
            <td><strong>Total Pemasukan</strong></td>
            <td>Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Total Pengeluaran</strong></td>
            <td>Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
        </tr>
    </table>
</body>
</html>
