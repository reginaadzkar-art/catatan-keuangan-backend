<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="container">
    <form>
        <input type="email" placeholder="Email" class="input">
        <input type="password" placeholder="Password" class="input">

        <div class="forgot">
            <a href="#">Forgot Password?</a>
        </div>

        <div class="button-group">
            <button class="btn login">LOGIN</button>
            <a href="/daftar" class="btn daftar">DAFTAR</a>
        </div>
    </form>
</div>

</body>
</html>
