<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_total', 'Sub Total:') !!}
    {!! Form::number('sub_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penghapusan_id', 'Penghapusan Id:') !!}
    {!! Form::number('penghapusan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Barangs Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barangs_id', 'Barangs Id:') !!}
    {!! Form::number('barangs_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detailPenghapusan.index') }}" class="btn btn-default">Cancel</a>
</div>
