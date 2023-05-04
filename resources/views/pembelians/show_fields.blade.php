<div class="row">
    <div class="col-md-3 col-sm-3">
    <h4>Data Aset</h4>
    
    </div>
    <div class="col-md-3 col-sm-3">
        <h4>Tanggal</h4>
        @foreach ($pembelian->detailPembelians as $row=>$item)
                <p>{{$item->created_at}}</p>    
        @endforeach
       
    </div>
    

</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h4>Detail Pembelian</h4>
    <table class="table table-responsive">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Tanggal Beli</th>
            <th class="col-md-2">Barang</th>
            <th class="col-md-2">Harga Beli</th>
            <th class="col-md-1">Jumlah</th>
            <th class="col-md-2">Sub Total</th>
        </tr>
       @foreach ($pembelian->detailPembelians as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td><?php echo date('d F Y', strtotime($item->tanggal_beli)); ?></td>
                <td>{{$item->barangs($item->barangs_id)->nama}}</td>
                <td>{{$item->harga_beli}}</td>
                <td>{{$item->qty}}</td>
                <td class="text-left"> {{number_format($item->subtotal, 2,",",".")}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6" class="text-right"><strong><h4>Total</h4></strong></td>
            <td class="text-left"><h4>Rp. {{number_format($pembelian->total, 2,",",".")}}</h4></td>
        </tr>
    </table>
</div>
</div>
