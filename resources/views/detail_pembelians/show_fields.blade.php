<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $detailPembelian->qty }}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $detailPembelian->subtotal }}</p>
</div>

<!-- Pembelians Id Field -->
<div class="form-group">
    {!! Form::label('pembelians_id', 'Pembelians Id:') !!}
    <p>{{ $detailPembelian->pembelians_id }}</p>
</div>

<!-- Barangs Id Field -->
<div class="form-group">
    {!! Form::label('barangs_id', 'Barangs Id:') !!}
    <p>{{ $detailPembelian->barangs_id }}</p>
</div>

