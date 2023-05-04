<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_pembelian;
use App\Models\Pembelian;
use App\Models\Barang;
use Carbon\Carbon;

class Laporan_PenyusutanController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $detail_pembelian = Detail_pembelian::all();
        $tanggal = Carbon::now()->format('Y-m-d');

        return view('laporan_penyusutan.index',compact('barangs','detail_pembelian'));
    }

    public function penyusutan_cari(Request $request)
    {
        $barangs = Barang::all();
        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));
        $tanggal = Carbon::now()->format('Y-m-d');

        $daftar_pembelian = \App\Models\Detail_pembelian::whereRaw('qty>qty_terjual')
            ->get();

        $harga = 0;
        $ter =0;
        foreach ($daftar_pembelian as $pembelian) {
            if ($pembelian->qty > 0) {
                $pembelian->qty;
                $sisa = $pembelian->qty - $pembelian->qty_terjual;
                if ($sisa >= $pembelian->jumlah) {
                    $harga = $pembelian->harga;
                } else {
                    $harga = $pembelian->harga;
                }
                $ter = $total =+$harga;
            }
        }
         $tot = $ter;

        $barangs =  Barang::whereDate('created_at', '>=', $dari)->whereDate('created_at', '<=', $sampai)->orderBy('created_at', 'desc')->get();
        $total_barangs =  Barang::whereDate('created_at', '>=', $dari)->whereDate('created_at', '<=', $sampai)->orderBy('created_at', 'desc')->sum('harga');

        return view('laporan_penyusutan.index', compact('total_barangs', 'dari', 'sampai', 'tot','barangs'));
    }

    public function cetak()
    {
        $barangs = Barang::all();
        $detail_pembelian = Detail_Pembelian::all();
        return view('laporan_penyusutan.cetak', compact('barangs','detail_pembelian')); 
    }
}
