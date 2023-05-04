<div class="row">
    <div class="col-md-3 col-sm-3">
    <h4>Penghapusan Aset</h4>
    
    </div>
    <div class="col-md-3 col-sm-3">
        <h4>Tanggal</h4>
        <p><?php echo date('d F Y', strtotime($penghapusan->tanggal)); ?></p>
    </div>
   
    
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3>Detail Penghapusan Aset</h3>
    <table border="1" cellpadding="4">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-3">Barang</th>
            <th class="col-md-3">Qty</th>
            <th class="col-md-2">Sub Total</th>
        </tr>

        @foreach ($penghapusan->detail_penghapusan as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->barang($item->barangs_id)->nama}}</td> 
                <td>{{$item->qty}}</td>

                <td class="text-left">Rp. {{number_format($item->subtotal, 2,",",".")}}</td>
            </tr>
        @endforeach
       
        <tr>
            <td colspan="3" class="text-right"><strong><h4>Total</h4></strong></td>
            <td class="text-left"><h4>Rp. {{number_format($penghapusan->total, 2,",",".")}}</h4></td>
        </tr>

    </table>