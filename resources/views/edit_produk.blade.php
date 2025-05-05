<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="inventory">
    <div style="gap: 475px;">
        <a href="/inventory">< Kembali</a>
        <h1>Edit Produk</h1>
    </div>
    <form id="formProduk" action="/update-produk/{{ $produk->id }}" method="POST">
        @csrf
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"><br><br>

        <label>Harga per Unit:</label><br>
        <input type="number" name="harga_per_unit" value="{{ $produk->harga_per_unit }}"><br><br>

        <label>Jumlah Stok:</label><br>
        <input type="number" name="jumlah" value="{{ $produk->jumlah }}"><br><br>

        <button type="submit" class="save-btn" id="btnSimpan">Update</button>
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
                alert("Gagal menyimpan data.");
                console.error(err);
            });
        });
    </script>
</body>
</html>
