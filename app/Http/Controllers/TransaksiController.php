<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    // Menampilkan halaman kasir
    public function index()
    {
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('transaksi.index', compact('barangs'));
    }

    // Memproses transaksi belanja
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|array',
            'jumlah' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $total_harga = 0;

            // 1. Simpan ke tabel transaksis
            $transaksi = Transaksi::create([
                'tanggal' => now(),
                'total' => 0, // diupdate nanti setelah loop
                'id_user' => Auth::id()
            ]);

            // 2. Loop barang yang dibeli
            foreach ($request->id_barang as $key => $id_barang) {
                $barang = Barang::findOrFail($id_barang);
                $qty = $request->jumlah[$key];
                $subtotal = $barang->harga * $qty;

                // Simpan detail
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id,
                    'id_barang' => $id_barang,
                    'jumlah' => $qty,
                    'subtotal' => $subtotal
                ]);

                // Kurangi stok barang
                $barang->stok -= $qty;
                $barang->save();

                $total_harga += $subtotal;
            }

            // 3. Update total harga final
            $transaksi->update(['total' => $total_harga]);

            DB::commit();
            return redirect()->back()->with('success', 'Transaksi Berhasil! Total: Rp ' . number_format($total_harga, 0, ',', '.'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    // Menampilkan laporan untuk Admin
    public function laporan()
    {
        $transaksis = Transaksi::with(['user', 'detail_transaksi.barang'])->orderBy('created_at', 'desc')->get();
        return view('laporan.index', compact('transaksis'));
    }
}