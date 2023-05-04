@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h4>
            Pembelian
        </h4>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="row" style="padding-left: 20px">
                    @include('pembelians.show_fields')
                    <a href="{{ route('pembelians.index') }}"><button class="btn btn-danger btn-sm">Back</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
