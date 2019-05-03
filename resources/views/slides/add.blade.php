@extends('templates.master')

@section('title','Form Slide')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Slides Data</h4>
						<form action="{{ route('slide.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Title</label>
								<input type="text" class="form-control" name="title" value="{{ old('title') }}">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
							</div>
							<div class="form-group">
		  						<label for="">Photo</label>
		  						<input type="file" class="dropify" name="image_slide">
		  					</div>
		  					<button class="btn btn-success">Simpan</button>
		  					<a href="{{ route('slide.index') }}" class="btn btn-secondary">Batal</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop