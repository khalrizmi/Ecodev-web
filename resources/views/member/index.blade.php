@extends('templates.master')

@section('title','Kata')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Daftar User</h4>
						<hr>
						<table class="table table-bordered table-striped table-hover" id="datatable">
							<thead>
								<tr>
				                  <th>Profile</th>
				                  <th>Name</th>
				                  <th>Email</th>
				                  <th>Created</th>
				                </tr>
							</thead>
							<tbody>
							@foreach($data as $field)
								<tr>
		                          <td class="py-1 text-center">
		                            <img src="{{ $field->photo }} alt="image" />
		                          </td>
		                          <td>
		                            {{ $field->name }}
		                          </td>
		                          <td>
		                            {{ $field->email }}
		                          </td>
		                          <td>
		                            {{ $field->created_at }}
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