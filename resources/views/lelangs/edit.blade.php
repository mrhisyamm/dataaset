@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lelang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lelang, ['route' => ['lelangs.update', $lelang->id], 'method' => 'patch']) !!}

                        @include('lelangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection