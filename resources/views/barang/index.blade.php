<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang - POS Kelontong</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9fafb; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .menu { margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb; }
        .menu a { margin-right: 15px; text-decoration: none; color: #2563eb; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #d1d5db; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f3f4f6; }
        .btn-danger { background-color: #dc2626; color: white; padding: 6px 12px; border: none; cursor: pointer; border-radius: 4px; }
        .btn-primary { background-color: #2563eb; color: white; padding: 8px 15px; border: none; cursor: pointer; border-radius: 4px; }
        .form-group { margin-bottom: 15px; }
        .form-group input, .form-group select { padding: 8px; width: 100%; max-width: 300px; border: 1px solid #ccc; border-radius: 4px; }
        .form-card { border: 1px solid #e5e7eb; padding: 15px; border-radius: 5px; margin-bottom: 20px; background-color: #fcfcfc; }
        .alert-success { color: #15803d; background-color: #dcfce3; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <div class="menu">
        <a href="/dashboard">Dashboard</a>
        <a href="/kategori">Kategori</a>
        <a href="/barang">Data Barang</a>
        <form action="/logout" method="POST" style="display:inline; float:right;">
            @csrf
            <button type="submit" class="btn-danger">Logout</button>
        </form>
    </div>

    <h2>Manajemen Data Barang</h2>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="form-card">
        <h3 style="margin-top: 0;">Tambah Barang Baru</h3>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="nama_barang" placeholder="Nama Barang" required>
            </div>
            <div class="form-group">
                <select name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="number" name="harga" placeholder="Harga (Misal: 5000)" required>
            </div>
            <div class="form-group">
                <input type="number" name="stok" placeholder="Jumlah Stok Awal" required>
            </div>
            <button type="submit" class="btn-primary">Simpan Barang</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $brg)
            <tr>
                <td>{{ $brg->id }}</td>
                <td>{{ $brg->nama_barang }}</td>
                <td>{{ $brg->kategori->nama_kategori }}</td>
                <td>Rp {{ number_format($brg->harga, 0, ',', '.') }}</td>
                <td>{{ $brg->stok }}</td>
                <td>
                    <form action="{{ route('barang.destroy', $brg->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>