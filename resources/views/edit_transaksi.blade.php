<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Edit Transaksi</h1>
    <a href="/transaksi"><button>Kembali</button></a>

    <form action="/update-transaksi/{{ $transaksi->id }}" method="POST">
        @csrf
        <label>Tanggal Transaksi:</label><br>
        <input type="date" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}"><br><br>

        <label>Total Harga:</label><br>
        <input type="number" name="total_harga" value="{{ $transaksi->total_harga }}"><br><br>

        <label>Pesan:</label><br>
        <input type="text" name="pesan" value="{{ $transaksi->pesan }}"><br><br>

        <label>Tipe:</label><br>
        <select name="tipe">
            <option value="pemasukan" {{ $transaksi->tipe == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value="pengeluaran" {{ $transaksi->tipe == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
        </select><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
