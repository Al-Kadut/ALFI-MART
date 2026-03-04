<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kategori - POS Kelontong</title>
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
        .alert-success { color: #15803d; background-color: #dcfce3; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-weight: bold; }
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
        <form action="/logout" method="POST" style="display:inline; float:right;">
            @csrf
            <button type="submit" class="btn-danger">Logout</button>
        </form>
    </div>

    <h2>Manajemen Kategori</h2>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST" style="margin-bottom: 20px;">
        @csrf
        <input type="text" name="nama_kategori" placeholder="Nama Kategori Baru" required style="padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" class="btn-primary">Tambah Kategori</button>
    </form>

    <table>
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th>Nama Kategori</th>
                <th width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kat)
            <tr>
                <td>{{ $kat->id }}</td>
                <td>{{ $kat->nama_kategori }}</td>
                <td>
                    <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
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