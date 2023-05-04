<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penghapusan;


class LaporanController extends Controller
{
    public function index(){
    	$title = 'Laporan Penghapusan (Default Hari ini)';
        $data = Penghapusan::whereDay('created_at',date('d'))->orderBy('created_at')->get();
       
        $tanggal = array();
        $nilai = array();
        foreach ($data as $dt) {
            array_push($tanggal, date('Y-m-d',strtotime($dt->created_at)));
            $hitung = Penghapusan::where('tanggal',$dt->created_at)->count();
            array_push($nilai, $hitung);
        }
        $tanggal = json_encode($tanggal);
        $nilai = json_encode($nilai);

        $dari = date('Y-m-d');
        $sampai = date('Y-m-d');

    	return view('laporans.index',compact('title','data','tanggal','nilai','dari','sampai'));
    }

    public function tanggal(Request $request){
    	$tanggal1 = date('Y-m-d',strtotime($request->tanggal1));
    	$tanggal2 = date('Y-m-d',strtotime($request->tanggal2));

    	$title = "Laporan Penghapusan dari Tanggal ".date('d-M-Y',strtotime($tanggal1))." sampai Tanggal ".date('d-M-Y',strtotime($tanggal2));
    	$data = Penghapusan::whereBetween('tanggal',[$tanggal1,$tanggal2])->orderBy('created_at')->get();

        $tanggal = array();
        foreach ($data as $dt) {
            array_push($tanggal, $dt->created_at);
        }
        $tanggal = json_encode($tanggal);

        $dari = $tanggal1;
        $sampai = $tanggal2;

    	return view('laporans.index',compact('title','data','tanggal','dari','sampai'));
    }
}
