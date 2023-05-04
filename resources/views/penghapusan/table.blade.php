<div class="table-responsive">
    <table class="table" id="penghapusan-table">
        <thead>
            <tr>
            <th>No</th>
                <th>Tanggal</th>
        <th>Nama Aset</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Bukti</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penghapusan as $row=>$penghapusan)
            <tr>
            <td>{{$row + 1 }}</td>
            <td><?php echo date('d F Y', strtotime($penghapusan->tanggal)); ?></td>
            @foreach ($penghapusan->detail_penghapusan as $row=>$item)
            <td>{{$item->barang($item->barangs_id)['nama']}}</td> 
            <td>{{$item->qty}}</td>
            <td>{{$item->keterangan}}</td>
            <td><img src="{{asset('data/bukti')}}/{{$item->bukti}}" style="width: 50%" alt=""></td>
           
                <td>
                    {!! Form::open(['route' => ['penghapusan.destroy', $penghapusan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('penghapusan.show', [$penghapusan->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-eye"></i></a>
                        <!-- <a href="{{ route('penghapusan.edit', [$penghapusan->id]) }}" class='btn btn-success btn-xs'><i class="fa fa-edit"></i></i></a> -->
                        <!-- <a href="{{action('PenghapusanController@pdf', $penghapusan->id)}}" target="_blank" class='btn btn-dark btn-xs'><i class="fa fa-print"></i></a> -->
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
