@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Pembelian
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailPembelian, ['route' => ['detailPembelians.update', $detailPembelian->id], 'method' => 'patch']) !!}

                        @include('detail_pembelians.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection