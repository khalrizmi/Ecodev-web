@extends('templates.master')

@section('title','Dashboard')

@section('content')
	  <div class="row">
	    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
	      <div class="card card-statistics">
	        <div class="card-body">
	          <div class="clearfix">
	            <div class="float-left">
	              <i class="mdi mdi-backup-restore text-danger icon-lg"></i>
	            </div>
	            <div class="float-right">
	              <p class="mb-0 text-right">Kategori</p>
	              <div class="fluid-container">
	                <h3 class="font-weight-medium text-right mb-0">{{ $cat }}</h3>
	              </div>
	            </div>
	          </div>
	          <p class="text-muted mt-3 mb-0">
	            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Kategori Survey
	          </p>
	        </div>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
	      <div class="card card-statistics">
	        <div class="card-body">
	          <div class="clearfix">
	            <div class="float-left">
	              <i class="mdi mdi-sticker text-warning icon-lg"></i>
	            </div>
	            <div class="float-right">
	              <p class="mb-0 text-right">Survey</p>
	              <div class="fluid-container">
	                <h3 class="font-weight-medium text-right mb-0">{{ $sur }}</h3>
	              </div>
	            </div>
	          </div>
	          <p class="text-muted mt-3 mb-0">
	            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Survey yang telah di lakukan
	          </p>
	        </div>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
	      <div class="card card-statistics">
	        <div class="card-body">
	          <div class="clearfix">
	            <div class="float-left">
	              <i class="mdi mdi-account text-success icon-lg"></i>
	            </div>
	            <div class="float-right">
	              <p class="mb-0 text-right">User</p>
	              <div class="fluid-container">
	                <h3 class="font-weight-medium text-right mb-0">{{ $mem }}</h3>
	              </div>
	            </div>
	          </div>
	          <p class="text-muted mt-3 mb-0">
	            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> User yang terdaftar
	          </p>
	        </div>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
	      <div class="card card-statistics">
	        <div class="card-body">
	          <div class="clearfix">
	            <div class="float-left">
	              <i class="mdi mdi-alarm-light text-info icon-lg"></i>
	            </div>
	            <div class="float-right">
	              <p class="mb-0 text-right">Kata</p>
	              <div class="fluid-container">
	                <h3 class="font-weight-medium text-right mb-0">{{ $wor }}</h3>
	              </div>
	            </div>
	          </div>
	          <p class="text-muted mt-3 mb-0">
	            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Kata yang telah di blokir
	          </p>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-lg-7 grid-margin stretch-card">
	      <!--weather card-->
	      <div class="card card-weather">
	        <div class="card-body">
	          <div class="weather-date-location">
	            <h3>{{ date("D") }}</h3>
	            <p class="text-gray">
	              <span class="weather-date">{{ date("d M Y") }}</span>
	              <span class="weather-location">Bogor, Indonesia</span>
	            </p>
	          </div>
	          <div class="weather-data d-flex">
	            <div class="mr-auto">
	              <h4 class="display-4">Ecology Development
	              <p>
	                Aktivator Wirausaha
	              </p>
	            </div>
	          </div>
	        </div>
	        <div class="card-body p-0">
	          <div class="d-flex weakly-weather">
	            <div class="weakly-weather-item">
	              <p class="mb-0">
	                Sun
	              </p>
	              <i class="mdi mdi-weather-cloudy"></i>
	              <p class="mb-0">
	                30°
	              </p>
	            </div>
	            <div class="weakly-weather-item">
	              <p class="mb-1">
	                Mon
	              </p>
	              <i class="mdi mdi-weather-hail"></i>
	              <p class="mb-0">
	                31°
	              </p>
	            </div>
	            <div class="weakly-weather-item">
	              <p class="mb-1">
	                Tue
	              </p>
	              <i class="mdi mdi-weather-partlycloudy"></i>
	              <p class="mb-0">
	                28°
	              </p>
	            </div>
	            <div class="weakly-weather-item">
	              <p class="mb-1">
	                Wed
	              </p>
	              <i class="mdi mdi-weather-pouring"></i>
	              <p class="mb-0">
	                30°
	              </p>
	            </div>
	            <div class="weakly-weather-item">
	              <p class="mb-1">
	                Thu
	              </p>
	              <i class="mdi mdi-weather-pouring"></i>
	              <p class="mb-0">
	                29°
	              </p>
	            </div>
	            <div class="weakly-weather-item">
	              <p class="mb-1">
	                Fri
	              </p>
	              <i class="mdi mdi-weather-snowy-rainy"></i>
	              <p class="mb-0">
	                31°
	              </p>
	            </div>
	            <div class="weakly-weather-item">
	              <p class="mb-1">
	                Sat
	              </p>
	              <i class="mdi mdi-weather-snowy"></i>
	              <p class="mb-0">
	                32°
	              </p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <!--weather card ends-->
	    </div>
	    <div class="col-lg-5 grid-margin stretch-card">
	      <div class="card">
	        <div class="card-body">
	          <h2 class="card-title text-primary mb-5">Baru Saja Melakukan Survey</h2>
			  <table class="table table-striped">
			  	<tr>
			  		<td>Profile</td>
			  		<td>Name</td>
			  		<td>Aksi</td>
			  	</tr>
			  	@foreach($array as $field)
			  	<tr>
			  	<td class="py-1 text-center">
                  <img src="{{ $field['photo'] }} alt="image" />
                </td>
                <td>{{ $field['name'] }}</td>
                <td><a href="{{ route('survey.objek',$field['id']) }}" class="btn btn-primary btn-sm">Lihat Survey <i class="fa fa-eye"></i></a></td>
                </tr>
			  	@endforeach
			  </table>
	        </div>
	      </div>
	    </div>
	  </div>
@endsection