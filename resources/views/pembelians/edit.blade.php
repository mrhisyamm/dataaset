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
                   {!! Form::model($pembelian, ['route' => ['pembelians.update', $pembelian->id], 'method' => 'patch']) !!}

                        @include('pembelians.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection