@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h4>
            Penghapusan Aset
        </h4>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penghapusan, ['route' => ['penghapusan.update', $penjualan->id], 'method' => 'patch']) !!}

                        @include('penghapusan.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection