@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Barang {{ $barang->nama }}
        </h1>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="row" style="padding-left: 20px">
                    
                   
                    <table class="table table-bordered" >
                        <tr>
                            <td>Jumlah Aset</td>
                            <td>Keterangan</td>
                        </tr>
                        @foreach($det as $item)
                            <tr>
                                <td>{{$item->qty - $item->qty_terjual}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
