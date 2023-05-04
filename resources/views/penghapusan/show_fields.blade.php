<!-- Tanggal Field -->
<div class="row">
    <div class="col-md-3 col-sm-3">
    <h4>Manajemen Aset</h4>
    
    </div>
    <div class="col-md-3 col-sm-3">
        <h4>Tanggal</h4>
        <p><?php echo date('d F Y', strtotime($penghapusan->tanggal)); ?></p>
    </div>
   
    
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h4>Detail Penghapusan</h4>
    <table class="table table-bordered">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-3">Nama Aset</th>
            <th class="col-md-3">Jumlah</th>
            <th class="col-md-2">Keterangan</th>
            <th class="col-md-2">Bukti Aset</th>
        </tr>

        @foreach ($penghapusan->detail_penghapusan as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->barang($item->barangs_id)->nama}}</td> 
                <td>{{$item->qty}}</td>
                <td>{{$item->keterangan}}</td>
                <td><img src="{{asset('data/bukti')}}/{{$item->bukti}}" style="width: 70%" alt=""></td>
            </tr>
        @endforeach
       
    </table>
</div>
</div>



