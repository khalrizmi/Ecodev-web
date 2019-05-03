@extends('templates.master')

@section('title','Survey')

@section('link')
    <style>
     #map-canvas {
       width: 100%;
       height: 400px;
       background-color: grey;
     }
    </style>
  
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
        <div class="col-md-12">
          <div class="card">
           <div class="card-body">
             <h4>Maps Survey</h4>
             <div id="map-canvas" style="width: 100%;"></div>
           </div>
         </div>
        </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4>Detail Survey</h4>
            <table class="table table-bordered">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $member->name }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $member->email }}</td>
              </tr>
              <tr>
                <td>Daerah</td>
                <td>:</td>
                <td>{{ $survey->place_name }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $survey->address }}</td>
              </tr>
              <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td>{{ $survey->state }}</td>
              </tr>
              <tr>
                <td>Suhu</td>
                <td>:</td>
                <td>{{ $survey->temperature }} Celcius</td>
              </tr>
              <tr>
                <td>Ketinggian</td>
                <td>:</td>
                <td>{{ $survey->sea_level }}</td>
              </tr>
              <tr>
                <td>Jumlah Objek</td>
                <td>:</td>
                <td>{{ count($data) }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div><br><br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4>Daftar Objek</h4>
            <div class="row">
              @foreach($data as $field)
              <div class="col-md-4">
                <img src="{{ asset('images/objek/'.$field->photo) }}" style="width: 100%; margin-bottom: 10px;">
                <h5>{{ $field->name }}</h5>
                <p>{{ $field->description }}</p>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places" type="text/javascript"></script>
    <script type="text/javascript">
        $.get( "{{ url('api/survey/list_maps/all/uptoyou') }}", function( data ) {
          console.log();
          var map = new google.maps.Map (document.getElementById('map-canvas'),{
            center:{
                lat: {{ $survey->latitude }},
                lng: {{ $survey->longtitude }},
            },
            zoom:16,
          });
          var marker = new google.maps.Marker({
                position:{
                    lat: {{ $survey->latitude }},
                    lng: {{ $survey->longtitude }},
                },
                map: map,
                draggable: true
              });
            marker.setDraggable(false);
        });
        
    </script>
@endsection