<div class="table-responsive">
    <table class="table" id="barangLelangs-table">
        <thead>
            <tr>
                <th>No Paket</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($barangLelangs as $barangLelang)
            <tr>
                <td>{{ $barangLelang->lelang->no_paket }}</td>
                <td>{{ $barangLelang->nama_barang }}</td>
                <td>{{ $barangLelang->jumlah }}</td>
                <td>
                    {!! Form::open(['route' => ['barangLelangs.destroy', $barangLelang->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('barangLelangs.show', [$barangLelang->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('barangLelangs.edit', [$barangLelang->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
