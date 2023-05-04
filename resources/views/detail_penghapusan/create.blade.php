@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail penghapusan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'detailPenghapusan.store']) !!}

                        @include('detail_penghapusan.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
