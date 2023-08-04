<!-- Harga Penawaran Field -->
<div class="form-group">
    {!! Form::label('harga_penawaran', 'Harga Penawaran:') !!}
    <p> <td class="text-left"><h4>Rp.</h4></td>{{ $penawaran->harga_penawaran }}</p>
</div>

<!-- Is Selected Field -->
<div class="form-group">
    {!! Form::label('is_selected', 'Is Selected:') !!}
    <p>{{ $penawaran->is_selected }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $penawaran->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $penawaran->updated_at }}</p>
</div>

