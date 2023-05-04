@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h4>
            Penghapusan Aset
        </h4>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="row" style="padding-left: 20px">
                    @include('penghapusan.show_fields')
                    <div class="form-group">
                    <a href="{{ route('penghapusan.index') }}"><button class="btn btn-danger">Back</button></a>
                    <!-- <a href="{{action('PenghapusanController@pdf', $penghapusan->id)}}" target="_blank"><b><button class="btn btn-success">Print</button></b></a> -->
                </div>
            </div>
        </div>
    </div>
@endsection
