@extends('templates.master')

@section('title','Slide')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('category.add') }}" class="btn btn-primary">Tambahkan Kategori</a>
				<br><br>
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Kategori</h4>
						<hr>
						<div class="table-responsive">
							<table class="table table-bordered" id="datatable">
								<thead>
									<tr>
										<td>No</td>
										<td>Title</td>
										<td>Gambar</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $field)
									<tr>
										<td width="10">{{ $loop->index + 1 }}</td>
										<td>{{ $field->title }}</td>
										<td width="200"><img src="{{ asset('images/icon/'.$field->icon_category) }}" alt="" class="images_clear"></td>
										<td width="50">
											<a href="{{ route('category.delete',$field->id) }}" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i> Hapus</a>
											<a href="{{ route('category.edit',$field->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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
	</div>
	<br><br>
@endsection