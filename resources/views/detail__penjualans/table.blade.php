<div class="table-responsive">
    <table class="table" id="detailPenjualans-table">
        <thead>
            <tr>
                <th>Qty</th>
        <th>Subtotal</th>
        <th>Penjualans Id</th>
        <th>Barangs Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailPenjualans as $detailPenjualan)
            <tr>
                <td>{{ $detailPenjualan->qty }}</td>
            <td>{{ $detailPenjualan->subtotal }}</td>
            <td>{{ $detailPenjualan->penjualans_id }}</td>
            <td>{{ $detailPenjualan->barangs_id }}</td>
                <td>
                    {!! Form::open(['route' => ['detailPenjualans.destroy', $detailPenjualan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailPenjualans.show', [$detailPenjualan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detailPenjualans.edit', [$detailPenjualan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
