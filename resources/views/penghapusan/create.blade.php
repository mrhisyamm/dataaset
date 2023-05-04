    @extends('layouts.app')

@section('content')
    <section class="content-header">
        <h4>
            Penghapusan Aset
        </h4>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="card">
        @include('flash::message')
            

            <div class="card-body">
                <div class="row">
                <form action="{{route('penghapusan.store')}}" method="post" enctype="multipart/form-data">
                {!! Form::open(['route' => 'penghapusan.store']) !!}
                        
                        @include('penghapusan.fields')

                    {!! Form::close() !!}
                </form>
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
            $('#subtotal').val(parseInt($('#harga').val())*parseInt($('#qty').val()));
            $('#qty').val(parseInt($('#qty').val()));
          

            $("#daftar").append('<div class="row">'+
                '<div class="col-md-1">'+i+'.'+'</div>'+
                '<div class="col-md-2">'+
                '<input type="hidden" name="id[]" value="'+$('#id').val()+'">'+
                '<input type="text" readonly class="form-control" name="nama[]" value="'+$('#nama').val()+'"></div>'+
                // '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="harga[]" value="'+$('#harga').val()+'"></div>'+
                '<div class="col-md-1 "><input type="text" readonly class="text-right form-control qty" name="qty[]" value="'+$('#qty').val()+'"></div>'+
                '<div class="col-md-2"><input type="text" readonly class="form-control" name="keterangan[]" value="'+$('#keterangan').val()+'"></div>'+
                // '<div class="col-md-2 "><input type="text" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></div>'+
            '</div>');
            i++;
            $('#barangs_id').val('');
            $('#nama').val('');
            $('#harga').val('');
            $('#qty').val('');
            $('#keterangan').val('');
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
</script>
@endsection