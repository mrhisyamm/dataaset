<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $detailPenjualan->qty }}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $detailPenjualan->subtotal }}</p>
</div>

<!-- Penjualans Id Field -->
<div class="form-group">
    {!! Form::label('penjualans_id', 'Penjualans Id:') !!}
    <p>{{ $detailPenjualan->penjualans_id }}</p>
</div>

<!-- Barangs Id Field -->
<div class="form-group">
    {!! Form::label('barangs_id', 'Barangs Id:') !!}
    <p>{{ $detailPenjualan->barangs_id }}</p>
</div>

