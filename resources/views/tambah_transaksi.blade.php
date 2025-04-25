<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>
    <h1>Tambah Transaksi</h1>
    <a href="/transaksi"><button>Kembali</button></a>

    <form action="/simpan-transaksi" method="POST">
        @csrf
        <label>Tanggal Transaksi:</label><br>
        <input type="date" name="tanggal_transaksi"><br><br>

        <label>Total Harga:</label><br>
        <input type="number" name="total_harga"><br><br>
        
        <label>Pesan:</label><br>
        <input type="text" name="pesan"><br><br>

        <label>Tipe:</label><br>
        <select name="tipe">
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
