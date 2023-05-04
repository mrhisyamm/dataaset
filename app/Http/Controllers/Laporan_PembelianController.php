<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pembelian;

class Laporan_PembelianController extends Controller
{
    public function index(){
        $title = 'Laporan Pembelian (Default Hari ini)';
        $data = Pembelian::whereDay('created_at',date('d'))->orderBy('created_at')->get();


       
        $tanggal = array();
        $nilai = array();
        foreach ($data as $dt) {
            array_push($tanggal, date('Y-m-d',strtotime($dt->created_at)));
            $hitung = Pembelian::where('tanggal',$dt->created_at)->count();
            array_push($nilai, $hitung);
        }
        $tanggal = json_encode($tanggal);
        //$nama=json_decode($nama)
        $nilai = json_encode($nilai);

        $dari = date('Y-m-d');
        $sampai = date('Y-m-d');

        return view('laporanps.index',compact('title','data','tanggal','nilai','dari','sampai'));
    }

    public function tanggal(Request $request){
        $tanggal1 = date('Y-m-d',strtotime($request->tanggal1));
        $tanggal2 = date('Y-m-d',strtotime($request->tanggal2));

        $title = "Laporan Pembelian dari Tanggal ".date('d-M-Y',strtotime($tanggal1))." sampai Tanggal ".date('d-M-Y',strtotime($tanggal2));
        $data = Pembelian::whereBetween('tanggal',[$tanggal1,$tanggal2])->orderBy('created_at')->get();

        $tanggal = array();
        foreach ($data as $dt) {
            array_push($tanggal, $dt->created_at);
        }
        $tanggal = json_encode($tanggal);

        $dari = $tanggal1;
        $sampai = $tanggal2;

        return view('laporanps.index',compact('title','data','tanggal','dari','sampai'));
    }
}
