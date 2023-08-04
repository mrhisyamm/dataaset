@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h4 class="pull-left">Barang</h4>
        <h1 class="pull-right">
           <a class="btn btn-info pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('barangs.create') }}">Tambah</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body">
                    @include('barangs.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection