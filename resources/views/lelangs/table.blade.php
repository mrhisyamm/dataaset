<div class="table-responsive">
    <table class="table" id="lelangs-table">
        <thead>
            <tr>
                <th>No Paket</th>
        <th>Detail Barang</th>
        <th>Tgl Deadline</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lelangs as $lelang)
            <tr>
                <td>{{ $lelang->no_paket }}</td>
                <!-- <td>{{ $lelang->barangLelangs }}</td> -->
                <td><?= $lelang->barangLelangs ?></td>
                <td>{{ $lelang->tgl_deadline }}</td>
                <td>
                    @if (auth()->user()->level=="admin")
                    {!! Form::open(['route' => ['lelangs.destroy', $lelang->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                      
                        <a href="{{ route('lelangs.show', [$lelang->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('lelangs.edit', [$lelang->id]) }}" class='btn btn-success btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    @endif

                    @if (auth()->user()->level=="user")
                    <div class='btn-group'>
                       <a href="{{ route('lelangs.show', [$lelang->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open">Ajukan Penawaran</i></a>
                    </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
