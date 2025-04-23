<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <h2>Register</h2>
        @if(session('success')) <p>{{ session('success') }}</p> @endif
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
        <p>Sudah punya akun? <a href="/">Login</a></p>
    </body>