<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 360px;
            background: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #185a9d;
            letter-spacing: 1px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #43cea2;
            box-shadow: 0 0 8px rgba(67,206,162,0.4);
        }

        .forgot {
            text-align: right;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .forgot a {
            color: #185a9d;
            text-decoration: none;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .button-group {
            display: flex;
            gap: 12px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 10px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
        }

        .login {
            background: linear-gradient(135deg, #43cea2, #185a9d);
            color: white;
        }

        .login:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .daftar {
            background: transparent;
            color: #185a9d;
            border: 2px solid #185a9d;
            text-decoration: none;
            line-height: 36px;
        }

        .daftar:hover {
            background: #185a9d;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>LOGIN</h2>

    <form method="POST" action="/login">
        @csrf

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

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
