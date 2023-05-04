@extends('Layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- <div class="card-header">
                Pencarian
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <tr>
                        <th>Dari</th>
                        <th>Sampai</th>
                        <th>Action</th>
                    </tr>
                    <form action="{{route('laporan_penyusutan.penyusutan_cari')}}" method="post">
                        @csrf
                        <tr>
                            <td>
                                <input type="date" name="dari" class="form-control">
                            </td>
                            <td>
                                <input type="date" name="sampai" class="form-control">
                            </td>
                            <td>
                                <input type="submit" value="Cari" class="btn btn-info">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div> -->
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
                       
                            <th>Nama Aset</th>
                            <th>Nilai Aset</th>
                            <th>Nilai Susut Bulanan</th>
                            <th>Total Nilai Susut</th>
                            <th>Nilai Sisa</th>
                        </tr>
                    </thead>
                   
                    @foreach($barangs as $barang)
                    <tbody>
                        <tr>
                            
                            @foreach($barang->detail_pembelian as $dt)   
                            <td>{{$dt->barangss->nama}}</td>
                            <td>Rp.{{number_format($dt->harga_beli)}}</td>
                            <td>Rp.{{number_format($dt->harga_beli/$barang->umur_penyusutan)}}</td>
                            <td>Rp.{{number_format($dt->harga_beli/$barang->umur_penyusutan*$dt->tanggal_beli = Carbon\Carbon::now()->format('m')*0)}}</td>
                            <td>Rp.{{number_format($dt->harga_beli-$dt->harga_beli/$barang->umur_penyusutan*$dt->tanggal_beli = Carbon\Carbon::now()->format('m')/($barang->umur_penyusutan))}}</td>
                           
                        </tr>
                       </tbody>
                       @endforeach
                       @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection