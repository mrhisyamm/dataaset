@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h4>
            Barang
        </h4>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                <div class="row">
                <form action="{{route('barangs.store')}}" method="post" enctype="multipart/form-data">
                    {!! Form::open(['route' => 'barangs.store']) !!}

                        @include('barangs.fields')

                    {!! Form::close() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
