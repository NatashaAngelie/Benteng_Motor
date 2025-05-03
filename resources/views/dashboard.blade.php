<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="dashboard">
    <img id="motor" src="{{ asset('picture/benteng_motor.png') }}" alt="logo" onclick="startMotor()">
    <script>
        const motor = document.getElementById('motor');
        let screenWidth = window.innerWidth;
        let x = screenWidth / 2;
        let speed = 3.5;
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
    <h1>Dashboard</h1>
    <a href="/logout"><button class= "logout" >Logout</button></a>
    <div>
        <a href="/inventory"><button>Kelola Inventory</button></a>
        <a href="/transaksi"><button>Kelola Transaksi</button></a>
    </div>
</body>
</html>
