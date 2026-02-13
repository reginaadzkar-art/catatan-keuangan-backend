<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #4caf50, #81c784);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 350px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4caf50;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #4caf50;
            box-shadow: 0 0 5px rgba(76,175,80,0.3);
        }

        .forgot {
            text-align: right;
            margin-bottom: 15px;
            font-size: 13px;
        }

        .forgot a {
            color: #4caf50;
            text-decoration: none;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: 0.3s;
        }

        .login {
            background: #4caf50;
            color: white;
        }

        .login:hover {
            background: #43a047;
        }

        .daftar {
            background: transparent;
            color: #4caf50;
            border: 2px solid #4caf50;
        }

        .daftar:hover {
            background: #4caf50;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <div class="forgot">
            <a href="#">Forgot Password?</a>
        </div>

        <div class="button-group">
            <button type="submit" class="btn login">LOGIN</button>
            <a href="/daftar" class="btn daftar">DAFTAR</a>
        </div>
    </form>
</div>

</body>
</html>
