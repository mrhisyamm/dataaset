<div class="table-responsive">
    <table class="table" id="penawarans-table">
        <thead>
            <tr>
                <th>Harga Penawaran</th>
                <th>Penawar</th>
                <th>Disetujui</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        @php
        $selesai = false;
        foreach($penawarans as $penawaran){
            if ($penawaran->is_selected == 1) {
                $selesai = true;
            }
        }
        
        @endphp
        <tbody>
        @foreach($penawarans as $penawaran)
            @php
                if($selesai){
                    if ($penawaran->is_selected != 1) {
                        continue;
                    }
                }
            @endphp
            
            <tr>
                <td>{{ $penawaran->harga_penawaran }}</td>
                <td>{{ $penawaran->nama }}</td>
                <td>{{ $penawaran->is_selected == 1 ? 'Disetujui' : ''}}</td>
                <td>
                    {!! Form::open(['route' => ['penawarans.destroy', $penawaran->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('penawarans.show', [$penawaran->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-eye"></i></a>
                        @if (auth()->user()->level=="admin")
                        <a href="{{ route('penawarans.edit', [$penawaran->id]) }}"  class='btn btn-success btn-xs'><i class="fa fa-edit"></i></a>
                        @endif
                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
