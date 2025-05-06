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

    <form id="formProduk" action="/simpan-produk" method="POST">
        @csrf
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" require><br><br>

        <label>Harga per Unit:</label><br>
        <input type="number" name="harga_per_unit" require><br><br>

        <label>Jumlah Stok:</label><br>
        <input type="number" name="jumlah" require><br><br>

        <button type="submit" class="save-btn" id="btnSimpan">Simpan</button>
    </form>

    <script>
        const form = document.getElementById('formProduk');
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
                        window.location.href = "/inventory";
                    }, 1500);
                } else {
                    throw new Error('Gagal menyimpan');
                }
            })
            .catch(err => {
                btn.disabled = false;
                btn.classList.remove('loading');
                btn.textContent = 'Simpan';
                alert("Mohon isi semua data terlebih dahulu");
                console.error(err);
            });
        });
    </script>
</body>
</html>
