<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="login_regis">
        <img id="motor" src="{{ asset('picture/benteng_motor.png') }}" alt="logo" onclick="startMotor()">
        <script>
            const motor = document.getElementById('motor');
            let screenWidth = window.innerWidth;
            let x = screenWidth / 2;
            let speed = 5;
            let isRunning = false;
            let phase = 'initial'; // fase pergerakan: 'initial', 'toRight', 'fromLeft', 'stop'

            function animate() {
                if (!isRunning) return;

                if (phase === 'toRight') {
                    x += speed;
                    motor.style.left = x + 'px';

                    if (x > screenWidth + 150) {
                        // keluar layar kanan, pindah ke kiri
                        x = -150;
                        phase = 'fromLeft'; // ubah fase
                    }
                } else if (phase === 'fromLeft') {
                    x += speed;
                    motor.style.left = x + 'px';

                    if (x >= (screenWidth / 2)) {
                        // sudah sampai tengah lagi
                        motor.style.left = '50%';
                        motor.style.transform = 'translateX(-50%)';
                        isRunning = false; // stop animasi
                        console.log("Satu putaran selesai!");
                        return;
                    }
                }

                requestAnimationFrame(animate);
            }

            function startMotor() {
                if (isRunning) return;
                console.log("Gambar Diklik!");
                isRunning = true;
                phase = 'toRight'; // mulai fase ke kanan
                animate();
            }
        </script>
        <div class="form_login_regis">
            <h2>Login</h2>
            @if(session('error')) <p>{{ session('error') }}</p> @endif
            <form action="/login" method="POST" id="loginFormAction">
                @csrf
                <input type="text" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Login</button>
            </form>
            <p>Belum punya akun? <a href="/register">Register</a></p>
        </div>

        <div class="loading-container" id="loadingContainer" style="display: none;">
        <h1>Loading...</h1>
        <div class="loading-bar" id="loadingBar"></div>
        </div>
        <script>
            const loadingContainer = document.getElementById('loadingContainer');
            const loadingBar = document.getElementById('loadingBar');
            const loginForm = document.getElementById('loginFormAction');

            loginForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Cegah form untuk submit secara langsung

                // Tampilkan loading bar dan sembunyikan form
                loadingContainer.style.display = 'block';
                document.querySelector('.form_login_regis').style.display = 'none';
                document.querySelector('img').style.display = 'none'
                
                // Mulai mengisi loading bar
                let progress = 0;
                let interval = setInterval(function() {
                    progress += 2;  // Tambah progress setiap interval
                    loadingBar.style.width = progress + '%';

                    if (progress >= 100) {
                        clearInterval(interval);  // Hentikan interval ketika loading selesai
                        // Simulasikan waktu loading selesai (misalnya 3 detik)
                        setTimeout(function() {
                            // Submit form setelah loading bar selesai
                            loginForm.submit();  // Form akhirnya disubmit
                        }, 100);  // Waktu tunggu setelah loading selesai
                    }
                }, 100);  // Setiap 100ms progress bar bertambah 5%
            });
        </script>
    </body>