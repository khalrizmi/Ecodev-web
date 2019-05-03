@extends('templates.master')

@section('title','Kata')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('words.add') }}" class="btn btn-primary">Tambah Kata</a>
				<br><br>
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Daftar Kata</h4>
						<hr>
						<table class="table table-bordered table-striped table-hover" id="datatable">
							<thead>
								<tr>
									<td>No</td>
									<td>Kata</td>
									<td>Tanggal Di Tambahkan</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
							@foreach($data as $field)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $field->words }}</td>
									<td>{{ $field->created_at }}</td>
									<td class="text-center">
										<a href="{{ route('words.delete',$field->id) }}" class="btn btn-danger btnDelete">Hapus <i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@include('component.delete_alert')
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop