<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <h2>Login</h2>
        @if(session('error')) <p>{{ session('error') }}</p> @endif
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="/register">Register</a></p>
    </body>