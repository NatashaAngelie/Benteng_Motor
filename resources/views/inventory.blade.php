<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Inventory</h1>
    <a href="/tambah-produk"><button>Tambah Produk</button></a>
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
                    <a href="/edit-produk/{{ $item->id }}">Edit</a> |
                    <a href="/hapus-produk/{{ $item->id }}" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
