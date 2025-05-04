<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body class="inventory">
    <div>
        <a href="/dashboard">< Kembali</a>
        <h1>Inventory</h1>
    </div>
    <a href="/tambah-produk" style="text-decoration: none;"><button class="tambah">Tambah Produk</button></a>
    <h2>Daftar Produk</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga per Unit</th>
                <th>Jumlah Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->harga_per_unit }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>
                    <a href="/edit-produk/{{ $item->id }}"><button class="edit">Edit</button></a> |
                    <a href="/hapus-produk/{{ $item->id }}" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><button class="hapus">Hapus</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
