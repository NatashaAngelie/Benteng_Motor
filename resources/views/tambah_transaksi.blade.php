<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="transaksi">
    <div style="gap: 430px">
        <a href="/transaksi">< Kembali</a>
        <h1>Tambah Transaksi</h1>
    </div>

    <form id="formTransaksi" action="/simpan-transaksi" method="POST">
        @csrf
        <label>Tanggal Transaksi:</label><br>
        <input type="date" name="tanggal_transaksi" required><br><br>

        <label>Total Harga:</label><br>
        <input type="number" name="total_harga" required><br><br>
        
        <label>Pesan:</label><br>
        <input type="text" name="pesan" required><br><br>

        <label>Tipe:</label><br>
        <select name="tipe" required>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select><br><br>

        <button type="submit" class="save-btn" id="btnSimpan">Simpan</button>
    </form>

    <script>
        const form = document.getElementById('formTransaksi');
        const btn = document.getElementById('btnSimpan');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // stop default submit

            btn.textContent = 'Menyimpan...';
            btn.classList.add('loading');
            btn.disabled = true;

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
