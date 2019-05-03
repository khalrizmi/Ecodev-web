@extends('templates.master')

@section('title','Tambah Kata')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Tambah Kata</h4>
						<hr>
						<form action="{{ route('words.store') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="">Kata</label>
								<input type="text" class="form-control" required name="words">
							</div>
							<button type="submit" class="btn btn-primary">Tambah Kata</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop