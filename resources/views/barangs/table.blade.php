<div class="table-responsive">
    <table class="table" id="barangs-table">
        <thead>
            <tr>
            <th>No</th>
                <th>Nama</th>
                <th>Umur Penyusutan</th>
                <th>Stok</th>
                <th>Gambar Aset</th>
                
        <!-- <th>Harga Beli</th> -->
        <!-- <th>Harga Jual</th> -->

                <th colspan="1">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
        @foreach($barangs as $barang)
            <tr>
            <td>{{ $no++ }}</td>
                <td>{{ $barang->nama }}</td>
            <td>{{ $barang->umur_penyusutan }}</td>
            <td>{{ $barang->stok }}</td>
            <td><img src="{{asset('data/barang')}}/{{$barang->gambar}}" style="width: 20%" alt=""></td>
            <!-- <td>{{ $barang->harga_beli }}</td> -->
            <!-- <td>{{ $barang->harga }}</td> -->
                <td>
                    {!! Form::open(['route' => ['barangs.destroy', $barang->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('barangs.show', [$barang->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('barangs.edit', [$barang->id]) }}" class='btn btn-success btn-xs'><i class="fa fa-edit"></i></a>
                        <!-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
