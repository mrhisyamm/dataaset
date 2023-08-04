@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
         
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Laporan Penyusutan
            </div>
            <div class="card-body">
            <a href="{{route('laporan_penyusutan.cetak')}}" target="_blank" class='btn btn-info'> Cetak <i class="fa fa-print"></i></a>
                <div class="table-responsive">
                    <table class="table table-sm table-borderless">
                        <thead>
                            <tr>
                                <th>Nama barang</th>
                                <th>Nilai barang</th>
                                <th>Umur Susut</th>
                                <th>Nilai Susut Bulanan</th>
                                <th>Total Nilai Susut</th>
                                <th>Nilai Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang) 
                            <tr>
                                @foreach ($barang->detail_pembelian as $dt)
                                    <td>{{ $dt->barangss->nama }}</td>
                                    @php
                                        $nilaiAset = 0;
                                        $nilaiSusutBulanan = 0;
                                        $umurSusut = $barang->umur_penyusutan*12;
                                        $totalNilaiSusut = 0;
                                        $nilaiSisa = 0;   
                                    @endphp
                                    @php
                                        $nilaiAset=$dt->harga_beli;
                                    @endphp 
                                    @php
                                        if ($umurSusut != 0) {
                                            $nilaiSusutBulanan = $nilaiAset/$umurSusut;
                                        }
                                        $datetime1 = new DateTime(NOW());
                                        $datetime2 = new DateTime($dt->tanggal);
                                        $interval = $datetime1->diff($datetime2);
                                        $bulan = $interval->format('%m');
                                        $totalPenyusutan = $nilaiAset-($nilaiSusutBulanan*$bulan);
                                        if($totalPenyusutan < 0){
                                            $totalPenyusutan = $nilaiAset;
                                        }
                                    @endphp
                                    <td>Rp.{{ number_format ($nilaiAset) }}</td>
                                    <td>{{ $barang->umur_penyusutan}}</td>
                                    <td>Rp.{{ number_format ($nilaiSusutBulanan) }}</td>
                                    <td>Rp.{{ number_format ($totalPenyusutan) }}</td>
                                    <td>Rp.{{ number_format ($totalPenyusutan) }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection