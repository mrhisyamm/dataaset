<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-AU-Compatible" content="ie=edge">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Laporan Penyusutan</title>
</head>
<body>
    <div class="countainer">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <b>
                                <u>
                                    Laporan Penyusutan
                                </u>
                            </b>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="table-responsive">
                        <center>
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
                            <td>Rp.{{number_format($dt->harga_beli/$barang->umur_penyusutan*$dt->tanggal_beli = Carbon\Carbon::now()->format('m')/($barang->umur_penyusutan))}}</td>
                            <td>Rp.{{number_format($dt->harga_beli-$dt->harga_beli/$barang->umur_penyusutan*$dt->tanggal_beli = Carbon\Carbon::now()->format('m')/($barang->umur_penyusutan))}}</td>
                           
                        </tr>
                       </tbody>
                       @endforeach
                       @endforeach
                    </table>
                    </center>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
