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
<body>
    <h1>Daftar Transaksi</h1>
    <a href="/dashboard"><button>Kembali</button></a>
    <a href="/tambah-transaksi"><button>Tambah Transaksi</button></a>
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
                    <a href="/edit-transaksi/{{ $item->id }}">Edit</a> |
                    <a href="/hapus-transaksi/{{ $item->id }}" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
