<div class="table-responsive">
    <table class="table" id="detailPenghapusan-table">
        <thead>
            <tr>
                <th>Qty</th>
        <th>Sub Total</th>
        <th>Total</th>
        <th>Penghapusan Id</th>
        <th>Barangs Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailPenghapusan as $detailPenghapusan)
            <tr>
                <td>{{ $detailPenghapusan->qty }}</td>
            <td>{{ $detailPenghapusan->sub_total }}</td>
            <td>{{ $detailPenghapusan->total }}</td>
            <td>{{ $detailPenghapusan->penghapusan_id }}</td>
            <td>{{ $detailPenghapusan->barangs_id }}</td>
                <td>
                    {!! Form::open(['route' => ['detailPenghapusan.destroy', $detailPenghapusan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailPenghapusan.show', [$detailPenghapusan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detailPenghapusan.edit', [$detailPenghapusan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
