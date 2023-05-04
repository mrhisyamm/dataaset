<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\pembelian;
// use App\Models\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function barangs()
    {
        // $barangs = Barang::all();

        return view('barangs.index');
    }

    public function pembelians()
    {
        return view('pembelians.index');
    }
}
