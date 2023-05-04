<script src="{{asset('jquery-3.2.1.min.js')}}" type='text/javascript'></script>
<script src="{{asset('select2/dist/js/select2.min.js')}}" type='text/javascript'></script>

<link href="{{asset('select2/dist/css/select2.min.css')}}" rel='stylesheet' type='text/css'>
<!-- Tanggal Field -->
<div class="form-group col-sm-2">
    {!! Form::label('tgl', 'Tanggal:') !!}
    {!! Form::date('tanggal', \Carbon\Carbon::now(), ['class' => 'form-control','readonly']) !!}
</div>

<div class="form-group col-md-12">
<div class="row" >
<div class="col-md-2">

<div id='result'></div>
    {!! form :: label('Barang') !!}
        {!! Form::select('barangs_id', $barang, null, ['class' => 'form-control','onchange' => 'ubahData()','id'=>'barangs_id', 'placeholder'=>'Pilih Barang']) !!}
   
    </div>
     {!! Form::hidden('_nama', null, ['class' => 'form-control','id'=>'nama','placeholder'=>'Nama']) !!}
     {!! Form::hidden('_id', null, ['class' => 'form-control','id'=>'id','placeholder'=>'id']) !!}
        

    <!-- <div class="form-group col-md-2">
         {!! form :: label('Harga') !!}
        {!! Form::number('_harga', null, ['class' => 'form-control','readonly','id'=>'harga','placeholder'=>'Harga']) !!}
    </div> -->
    <!-- <div class="form-group col-md-2">
         {!! form :: label('Jumlah Aset saat Ini') !!}
        {!! Form::number('_stok', null, ['class' => 'form-control','readonly','id'=>'stok','placeholder'=>'Sisa Stok']) !!}
        </div> -->
    <div class="form-group col-md-2">
         {!! form :: label('Jumlah') !!}
        {!! Form::number('_qty', 0, ['class' => 'form-control','id'=>'qty','placeholder'=>'Jumlah','autocomplete'=>'off']) !!}
    </div>
        <!-- {!! Form::hidden('_subtotal', null, ['class' => 'form-control','id'=>'subtotal','placeholder'=>'Subtotal']) !!} -->
    <div class="form-group col-md-2">
         {!! form :: label('Keterangan') !!}
        <select name="keterangan" id="keterangan" class="form-control">
        <option selected>--pilih keterangan--</option>
        <option value="hilang">hilang</option>
        <option value="rusak">rusak</option>
        <option value="lelang">lelang</option>
        <option value="hibah">hibah</option>
       
     </select>
    </div>

    <div class="form-group col-md-4">
    <label for="file">Bukti Aset</label>
        <input type="file" name="file" class="form-control" multiple="true" require="">
    </div>

    <div class="form-group col-md-2">
        <button class="btn btn-sm btn-info" id="btn-tambah">Tambah</button>
    </div>
</div>
</div>

<div class="form-group col-md-12">
    <h4>Daftar Penghapusan</h4>
    <div class="row" style="border-bottom: 1px solid #eeeeee;margin-bottom: 15px;padding-bottom: 5px;">
        <div class="col-md-1">No</div>
        <div class="col-md-2">Nama Aset</div>
        <!-- <div class="col-md-2">Harga</div> -->
        <div class="col-md-1">Jumlah</div>
        <div class="col-md-2">Keterangan</div>
        <!-- <div class="col-md-2">Subtotal (Rp)</div> -->
    </div>
    <div id="daftar">

    </div>
</div>
<div class="form-group col-sm-6">
</div>
<!-- Total Field -->
<!-- <div class="form-group col-sm-3">
    {!! Form::label('ttl', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control','readonly','id'=>'total']) !!}
</div> -->


<!-- Total Field -->


<!-- Total Field -->

    {!! Form::hidden('jumlah', null, ['class' => 'form-control','id'=>'jumlah']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
    <a href="{!! route('penghapusan.index') !!}" class="btn btn-danger">Cancel</a>
</div>

<script>
    function ubahData() { 
      var barangid = document.getElementById('barangs_id').value;
      var hasil = search(barangid);
    }
    function search(barangid) {
        <?php foreach($nom_barang as $nom){ ?>
            if(barangid == <?php echo $nom->id;  ?>) {
                document.getElementById('id').value='<?php echo $nom->id ?>';
                // document.getElementById('harga').value=<?php echo $nom->harga ?>;
                document.getElementById('nama').value='<?php echo $nom->nama ?>';
                document.getElementById('stok').value='<?php echo $nom->stok ?>';
                document.getElementById('keterangan').value='<?php echo $nom->keterangan ?>';
            }
        <?php } ?>  
    }
</script>
<script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#barangs_id").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#selUser option:selected').text();
                var userid = $('#selUser').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });
</script>