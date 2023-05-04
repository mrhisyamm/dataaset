@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="box">
			<div class="box-body">
				<form role="form" method="get" action="{{ url('laporan-tanggal1') }}">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Dari Tanggal</label>
							<input type="date" value="{{ $dari }}" name="tanggal1" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari Tanggal">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Sampai Tanggal</label>
							<input type="date" value="{{ $sampai }}" name="tanggal2" class="form-control datepicker" id="exampleInputPassword1" placeholder="Sampai Tanggal">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-info">Cek</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- <div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				
				<center>
					<div style="width: 60%;height: 50%">
						<canvas id="myChart"></canvas>
					</div>
				</center>

			</div>
		</div>
	</div>
</div> -->
<?php
$tottotal = 0;
?>

@if(isset($data))
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3>Data Pembelian</h3>
			</div>
			<div class="box-body">
				
				<table class="table table-stripped">
					<thead>
						<tr>
							<th>No</th>

				            <th>Tanggal</th>          
				            <th>jumlah Aset</th>
				            <th>Nama Aset</th>
				            <th>Total</th>

						</tr>
					</thead>
					<tbody>
						
						@foreach($data as $e=>$dt)
						<?php 
						$tottotal += $dt->total; 
						?>
						<tr>
							<td>{{$e + 1 }}</td>
							@foreach ($dt->detailpembelians as $ds)
				            <td><?php echo date('d F Y', strtotime($dt->tanggal)); ?></td>
				            <td>{!! $ds->qty !!}</td> 
				            <td>{{$ds->barangs($ds->barangs_id)->nama}}</td>
				            <td class="text-left">Rp. {!! number_format($dt->total,2,",",".") !!}</td>   
						@endforeach
						@endforeach
						<tr>
							<td colspan="4"><center><h3><b>Total Pembelian</b></h3></center></td>
							<td><h3><b>Rp. {{ str_replace(',','.',number_format($tottotal,0)) }}</b></h3></td>
							
						</tr>
					</tbody>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endif

@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('Chart.js') }}"></script>

<script>
	
</script>

@endsection