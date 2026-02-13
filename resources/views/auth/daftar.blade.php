<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar</title>

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
            width: 380px;
            background: rgba(255,255,255,0.95);
            padding: 32px;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.2);
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
            margin-bottom: 14px;
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

        button {
            width: 100%;
            padding: 13px;
            margin-top: 10px;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        p {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
            color: #555;
        }

        a {
            color: #185a9d;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>DAFTAR AKUN</h2>

    <form method="POST" action="/daftar">
        @csrf

        <div class="input-group">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">DAFTAR</button>
    </form>

    <p>Sudah punya akun? <a href="/login">Login</a></p>
</div>

</body>
</html>
