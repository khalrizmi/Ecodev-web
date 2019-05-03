@extends('templates.master')

@section('title','Pengumuman')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Pengumuman</h4>
						<form action="{{ route('announcement.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Title</label>
								<input type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>
							</div>
							<div class="form-group">
								<label>Content</label>
								<textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
							</div>						
		  					<button class="btn btn-success">Kirim Pesan Siaran</button>
		  					<a href="{{ route('slide.index') }}" class="btn btn-secondary">Batal</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop