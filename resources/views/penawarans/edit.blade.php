@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penawaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penawaran, ['route' => ['penawarans.update', $penawaran->id], 'method' => 'patch']) !!}

                        @include('penawarans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection