<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control','placeholder'=>'Nama Barang']) !!}
</div>

<div class="form-group col-sm-6">
    <label for="file">Upload Image</label>
        <input type="file" name="file" class="form-control" multiple="true" required accept=".jpg, .jpeg">
    </div>

<!-- Stok Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('stok', 'Stok:') !!}
    {!! Form::number('stok', 0,['class' => 'form-control','readonly']) !!}
</div> -->

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umur_penyusutan', 'Umur Penyusutan:') !!}
    {!! Form::number('umur_penyusutan', null, ['class' => 'form-control','placeholder'=>'Tahun']) !!}
</div>

<!-- Harga Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control']) !!}
    <input type="number" name="harga" class="form-control" min="0">

</div> -->

<!-- Tgl Expired Field -->






@section('scripts')
    <script type="text/javascript">
        $('#tgl_expired').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })

        $(document).ready(function() {
        // Mendapatkan referensi ke input file
        const fileInput = document.getElementById('fileInput');

        // Menambahkan event listener saat file dipilih
        fileInput.addEventListener('change', function() {
            const files = fileInput.files;
            const allowedExtensions = /(\.jpg|\.jpeg)$/i; // Ekstensi yang diizinkan (hanya JPG)

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileName = file.name;

                // Cek apakah file memiliki ekstensi JPG
                if (!allowedExtensions.exec(fileName)) {
                    alert('Hanya file JPG yang diperbolehkan.');
                    fileInput.value = ""; // Mengosongkan input file jika ekstensi tidak sesuai
                    return;
                }
            }
        });
    });
    </script>
    
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
    <a href="{{ route('barangs.index') }}" class="btn btn-danger">Cancel</a>
</div>