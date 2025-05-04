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
    <!-- <script>
        document.querySelectorAll('.ripple-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                const circle = document.createElement('span');
                circle.classList.add('ripple-effect');
                const rect = this.getBoundingClientRect();
                circle.style.left = `${e.clientX - rect.left}px`;
                circle.style.top = `${e.clientY - rect.top}px`;
                this.appendChild(circle);
                setTimeout(() => circle.remove(), 600);
            });
        });
        function goTo(url) {
            window.location.href = url;
        }
    </script> -->

    <h1>Dashboard</h1>
    <a href="/logout"><button class= "logout">Logout</button></a>
    <div>
        <button class="dashboard_inventory ripple-btn" onclick="goTo('/inventory')"><span>Inventory</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M32 32l448 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96L0 64C0 46.3 14.3 32 32 32zm0 128l448 0 0 256c0 35.3-28.7 64-64 64L96 480c-35.3 0-64-28.7-64-64l0-256zm128 80c0 8.8 7.2 16 16 16l160 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-160 0c-8.8 0-16 7.2-16 16z"/></svg></button></a>
        <button class="dashboard_transaksi ripple-btn" onclick="goTo('/transaksi')"><span>Transaksi</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8l0 464c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488L0 24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 144zM80 352c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 336c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 240z"/></svg></button></a>
    </div>
</body>
</html>
