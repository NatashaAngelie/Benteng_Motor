<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
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
            <h2>Register</h2>
            @if(session('success')) <p>{{ session('success') }}</p> @endif
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Register</button>
            </form>
            <p>Sudah punya akun? <a href="/">Login</a></p>
        </div>
    </body>