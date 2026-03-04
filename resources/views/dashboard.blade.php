<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - POS Kelontong</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9fafb; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .menu { margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb; display: flex; align-items: center; justify-content: space-between; }
        .menu-links a { margin-right: 15px; text-decoration: none; color: #2563eb; font-weight: bold; }
        .menu-links a:hover { text-decoration: underline; }
        .btn-danger { background-color: #dc2626; color: white; padding: 8px 15px; border: none; cursor: pointer; border-radius: 4px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <div class="menu">
        <div class="menu-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/kategori">Kategori</a>
            <a href="/barang">Data Barang</a>
            <a href="/transaksi">Transaksi Kasir</a>
            <a href="/laporan">Laporan</a>
        </div>
        
        <form action="/logout" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="btn-danger">Logout</button>
        </form>
    </div>

    <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
    <p>Anda login sebagai: <strong>{{ strtoupper(auth()->user()->role) }}</strong></p>
    
    <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">
    
    <p>Silakan pilih menu di atas untuk mulai mengelola sistem Point of Sale (POS) Toko Kelontong.</p>
</div>

</body>
</html>