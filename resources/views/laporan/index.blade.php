<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan - POS Kelontong</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9fafb; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .menu { margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb; }
        .menu a { margin-right: 15px; text-decoration: none; color: #2563eb; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #d1d5db; padding: 10px; text-align: left; }
        th { background-color: #f3f4f6; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; background: #e5e7eb; }
    </style>
</head>
<body>

<div class="container">
    <div class="menu">
        <a href="/dashboard">Dashboard</a>
        <a href="/kategori">Kategori</a>
        <a href="/barang">Data Barang</a>
        <a href="/transaksi">Transaksi Kasir</a>
        <a href="/laporan">Laporan</a>
    </div>

    <h2>Laporan Riwayat Penjualan</h2>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Detail Barang</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $trs)
            <tr>
                <td>{{ $trs->tanggal }}</td>
                <td><span class="badge">{{ $trs->user->name }}</span></td>
                <td>
                    <ul style="margin: 0; padding-left: 15px;">
                        @foreach($trs->detail_transaksi as $detail)
                            <li>{{ $detail->barang->nama_barang }} ({{ $detail->jumlah }}x)</li>
                        @endforeach
                    </ul>
                </td>
                <td><strong>Rp {{ number_format($trs->total, 0, ',', '.') }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>