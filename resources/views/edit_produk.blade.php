<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <a href="/inventory"><button>Kembali</button></a>
    <form action="/update-produk/{{ $produk->id }}" method="POST">
        @csrf
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"><br><br>

        <label>Harga per Unit:</label><br>
        <input type="number" name="harga_per_unit" value="{{ $produk->harga_per_unit }}"><br><br>

        <label>Jumlah Stok:</label><br>
        <input type="number" name="jumlah" value="{{ $produk->jumlah }}"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
