<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Kasir - POS Kelontong</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9fafb; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .menu { margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb; }
        .menu a { margin-right: 15px; text-decoration: none; color: #2563eb; font-weight: bold; }
        .btn-primary { background-color: #2563eb; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 4px; font-weight: bold; }
        .btn-success { background-color: #16a34a; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 4px; font-weight: bold; width: 100%; margin-top: 15px; }
        .btn-danger { background-color: #dc2626; color: white; padding: 8px 12px; border: none; cursor: pointer; border-radius: 4px; }
        .form-group { margin-bottom: 10px; display: flex; gap: 10px; align-items: center; }
        .alert-success { color: #15803d; background-color: #dcfce3; padding: 15px; border-radius: 4px; margin-bottom: 15px; font-weight: bold; border: 1px solid #16a34a; }
        select, input { border: 1px solid #ccc; border-radius: 4px; padding: 10px; }
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

    <h2>Input Transaksi Baru</h2>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div id="barang-container">
            <div class="form-group">
                <select name="id_barang[]" required style="width: 300px;">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $brg)
                        <option value="{{ $brg->id }}">{{ $brg->nama_barang }} - Rp {{ number_format($brg->harga, 0, ',', '.') }} (Stok: {{ $brg->stok }})</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah[]" placeholder="Qty" required min="1" style="width: 80px;">
            </div>
        </div>

        <button type="button" class="btn-primary" onclick="tambahBaris()">+ Tambah Barang</button>
        <button type="submit" class="btn-success">Simpan & Proses Transaksi</button>
    </form>
</div>

<script>
    function tambahBaris() {
        let container = document.getElementById('barang-container');
        let div = document.createElement('div');
        div.className = 'form-group';
        div.innerHTML = `
            <select name="id_barang[]" required style="width: 300px;">
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $brg)
                    <option value="{{ $brg->id }}">{{ $brg->nama_barang }} - Rp {{ number_format($brg->harga, 0, ',', '.') }}</option>
                @endforeach
            </select>
            <input type="number" name="jumlah[]" placeholder="Qty" required min="1" style="width: 80px;">
            <button type="button" class="btn-danger" onclick="this.parentElement.remove()">X</button>
        `;
        container.appendChild(div);
    }
</script>

</body>
</html>