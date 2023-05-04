<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $detailPenghapusan->qty }}</p>
</div>

<!-- Sub Total Field -->
<div class="form-group">
    {!! Form::label('sub_total', 'Sub Total:') !!}
    <p>{{ $detailPenghapusan->sub_total }}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $detailPenghapusan->total }}</p>
</div>

<!-- Penjualans Id Field -->
<div class="form-group">
    {!! Form::label('penjualans_id', 'Penjualans Id:') !!}
    <p>{{ $detailPenghapusan->penjualans_id }}</p>
</div>

<!-- Barangs Id Field -->
<div class="form-group">
    {!! Form::label('barangs_id', 'Barangs Id:') !!}
    <p>{{ $detailPenghapusan->barangs_id }}</p>
</div>

