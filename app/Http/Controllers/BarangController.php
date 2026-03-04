<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori; // Kita butuh model Kategori juga di sini
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan halaman daftar barang
    public function index()
    {
        // Mengambil semua barang beserta data kategorinya (Eager Loading)
        $barangs = Barang::with('kategori')->get();
        
        // Mengambil semua kategori untuk ditampilkan di pilihan dropdown (select)
        $kategoris = Kategori::all(); 
        
        return view('barang.index', compact('barangs', 'kategoris'));
    }

    // Menyimpan barang baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
    }

    // Menghapus barang
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->back()->with('success', 'Barang berhasil dihapus!');
    }
}