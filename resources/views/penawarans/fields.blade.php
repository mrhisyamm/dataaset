
<!-- Harga Penawaran Field -->
@if (auth()->user()->level=="user")
<div class="form-group col-sm-6">
    {!! Form::label('harga_penawaran', 'Harga Penawaran:') !!}
    {!! Form::number('harga_penawaran', null, ['class' => 'form-control']) !!}

    {!! Form::hidden('is_selected', 0) !!}
</div>
@endif

@if (auth()->user()->level=="admin")
<!-- Is Selected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_selected', 'Is Selected:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_selected', 0) !!}
        {!! Form::checkbox('is_selected', '1', null) !!}
    </label>
</div>

    {!! Form::hidden('harga_penawaran', null, ['class' => 'form-control']) !!}
@endif

@if (auth()->user()->level=="user")
{!! Form::hidden('lelangId', $lelangId) !!}
@endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('penawaran.detail', [$lelangId]) }}" class="btn btn-default">Cancel</a>
</div>

