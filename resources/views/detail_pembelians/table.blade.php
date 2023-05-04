<?php
    function tglIndonesia($str){
       $tr   = trim($str);
       $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
       return $str;
   }    
 ?>
<div class="table-responsive">
    <table class="table" id="detailPembelians-table">
        <thead>
            <tr>
        <th>Tanggal Beli</th>
        <th>Barang</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Subtotal</th>
        <th>Tanggal Expired</th>
        <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailPembelians as $detailPembelian)
            <tr>
                <td><?php echo tglIndonesia(date('D, d F Y', strtotime($detailPembelian->tanggal_beli))); ?></td>
                <td>{{ $detailPembelian->barangss->nama }}</td>
                <td>{{ $detailPembelian->harga_beli }}</td>
            <td>{{ $detailPembelian->qty }}</td>
            <td>{{ $detailPembelian->subtotal }}</td>
            <td><?php echo tglIndonesia(date('D, d F Y', strtotime($detailPembelian->tanggal_expired))); ?></td>
            <td>
                <?php 
                if ($detailPembelian->tanggal_expired>=$mytime) {
                    echo "Belum Expired";
                    
                } 
                elseif ($detailPembelian->tanggal_expired<=$mytime) {
                    echo "Expired";
                }
            ?>
            </td>
            
                <td>
                    {!! Form::open(['route' => ['detailPembelians.destroy', $detailPembelian->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailPembelians.show', [$detailPembelian->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <!-- <a href="{{ route('detailPembelians.edit', [$detailPembelian->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
