<div class="table-responsive">
    <table class="table" id="pembelians-table">
        <thead>
        <tr>
        <th>No</th>
        <th>supliers</th>
        <th>Tanggal Beli</th>
        <th>Nama Aset</th>
        <th>Jumlah</th>
        <th>Harga satuan</th>
        <th>Total</th>
        <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
       
        @foreach ($pembelians as $row=>$item)
            <tr>
            <td>{{$row + 1 }}</td>
            @foreach ($item->detailpembelians as $row=>$dt)
            <td>{{ $item->supliers->name }}</td>
            <td><?php echo date('d F Y', strtotime($item->tanggal)); ?></td>
            <td>{{$dt->barangss['nama']}}</td>
            <td>{{ $dt->qty }}</td>
            <td>Rp. {{number_format($dt->harga_beli, 2,",",".")}}</td>
            <td>Rp. {{number_format($item->total, 2,",",".")}}</td>
            
          
                <td>
                    {!! Form::open(['route' => ['pembelians.destroy', $item->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pembelians.show', [$item->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-eye"></i></a>
                        <!-- <a href="{{ route('pembelians.edit', [$item->id]) }}" class='btn btn-success btn-xs'><i class="fa fa-edit"></i></a> -->
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endforeach
        </tbody>
    </table>
</div>
