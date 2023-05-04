<div class="table-responsive">
    <table class="table" id="supliers-table">
        <thead>
            <tr>
         <th>Name</th>
        <th>Alamat</th>
        <th>No Telepon</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($supliers as $suplier)
            <tr>
                <td>{{ $suplier->name }}</td>
            <td>{{ $suplier->alamat }}</td>
            <td>{{ $suplier->no_telp }}</td>
                <td>
                    {!! Form::open(['route' => ['supliers.destroy', $suplier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('supliers.show', [$suplier->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('supliers.edit', [$suplier->id]) }}" class='btn btn-success btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
