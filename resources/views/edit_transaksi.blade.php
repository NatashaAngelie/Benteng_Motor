<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="transaksi">
    <div style="gap: 460px">
        <a href="/transaksi">< Kembali</a>
        <h1>Edit Transaksi</h1>
    </div>

    <form id="formTransaksi" action="/update-transaksi/{{ $transaksi->id }}" method="POST">
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

        <button type="submit" class="save-btn" id="btnSimpan">Update</button>
    </form>

    <script>
        const form = document.getElementById('formTransaksi');
        const btn = document.getElementById('btnSimpan');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Hindari submit langsung

            btn.textContent = 'Menyimpan...';
            btn.classList.add('loading');
            btn.disabled = true;

            // Kirim data form lewat fetch API
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams(new FormData(form))
            })
            .then(response => {
                if (response.ok) {
                    btn.classList.remove('loading');
                    btn.classList.add('success');
                    btn.textContent = '✓ Tersimpan';

                    setTimeout(() => {
                        window.location.href = "/transaksi";
                    }, 1500);
                } else {
                    throw new Error('Gagal menyimpan');
                }
            })
            .catch(err => {
                btn.disabled = false;
                btn.classList.remove('loading');
                btn.textContent = 'Simpan';
                alert("Gagal menyimpan data.");
                console.error(err);
            });
        });
    </script>
</body>
</html>
