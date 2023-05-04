<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $barang->nama }}</p>
</div>

<!-- Stok Field -->
<div class="form-group">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{{ $barang->stok }}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <p>{{ $barang->satuan }}</p>
</div>

<!-- Harga Beli Field -->
<div class="form-group">
    {!! Form::label('harga_beli', 'Harga Beli:') !!}
    <p>{{ $barang->harga_beli }}</p>
</div>

<!-- Harga Field -->
<div class="form-group">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $barang->harga }}</p>
</div>


