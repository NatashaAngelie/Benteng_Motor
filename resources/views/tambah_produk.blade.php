<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="inventory">
    <div style="gap: 410px;">
        <a href="/inventory">< Kembali</a>
        <h1>Tambah Produk Baru</h1>
    </div>
    <form action="/simpan-produk" method="POST">
        @csrf
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk"><br><br>

        <label>Harga per Unit:</label><br>
        <input type="number" name="harga_per_unit"><br><br>

        <label>Jumlah Stok:</label><br>
        <input type="number" name="jumlah"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
