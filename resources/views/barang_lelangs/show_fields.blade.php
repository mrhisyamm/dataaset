<!-- Nama Barang Field -->
<div class="form-group">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    <p>{{ $barangLelang->nama_barang }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $barangLelang->jumlah }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $barangLelang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $barangLelang->updated_at }}</p>
</div>

