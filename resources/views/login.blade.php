<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POS Kelontong</title>
    <style>
        body { font-family: sans-serif; background-color: #f3f4f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 300px; }
        .login-box h2 { text-align: center; margin-bottom: 20px; }
        .input-group { margin-bottom: 15px; }
        .input-group label { display: block; margin-bottom: 5px; color: #333; }
        .input-group input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn { width: 100%; padding: 10px; background-color: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn:hover { background-color: #1d4ed8; }
        .alert { color: #dc2626; background-color: #fee2e2; padding: 10px; border-radius: 4px; text-align: center; margin-bottom: 15px; font-size: 14px; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login POS</h2>

    @if(session()->has('loginError'))
        <div class="alert">
            {{ session('loginError') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required autofocus>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" class="btn">Masuk</button>
    </form>
</div>

</body>
</html>