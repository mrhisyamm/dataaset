@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h4>
            Pembelian
        </h4>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="card">

            <div class="card-body">
                <div class="row">
                    {!! Form::open(['route' => 'pembelians.store']) !!}

                        @include('pembelians.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script>

    $(document).ready(function() {
        var i=1
        
        $('#btn-tambah').on('click',function(e){
            $('#subtotal').val(parseInt($('#harga_beli').val())*parseInt($('#qty').val()));
            $('#qty').val(parseInt($('#qty').val()));
          

            $("#daftar-penjualan").append('<div class="row">'+
                '<div class="col-sm-1">'+i+'.'+'</div>'+
                '<div class="col-md-2 "><input type="date" readonly class="text-right form-control" name="tanggal_beli[]" value="'+$('#tanggal_beli').val()+'"></div>'+
                '<div class="col-md-2"><input type="text" readonly class="form-control" name="nama[]" value="'+$('#nama').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="harga_beli[]" value="'+$('#harga_beli').val()+'"></div>'+
                '<div class="col-md-1"><input type="text" readonly class="text-right form-control qty" name="qty[]" value="'+$('#qty').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></div>'+
                 '<div class="col-md-1"><a href="#" class="btn btn-sm btn-danger removes">-</a></div>'+
            '</div>');
            i++;
            $('#tanggal_beli').val('');
            $('#barangs_id').val('');
            $('#nama').val('');
            $('#harga_beli').val('');
            $('#qty').val('');
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');

            var total = 0;
            $(".subtotal").each(function() {
                total += parseInt($(this).val());
            });
            $('#total').val(total);

            var jumlah = 0;
            $(".qty").each(function() {
                jumlah += parseInt($(this).val());
            });
            $('#jumlah').val(jumlah);

            


            
            e.preventDefault();
        })
    });
     $('#daftar-penjualan').on('click','.removes',function(){
        var last = $('#daftar-penjualan div').length;
        $(this).parent().parent().remove();
    });
</script>
@endsection