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
          <h4>Survey data</h4>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="datatable">
            <thead>
              <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Photo</td>
                <td>Jumlah Objek</td>
                <td>Suhu</td>
                <td>Daerah</td>
                <td>Provinsi</td>
                <td>Tanggal Survey</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              @foreach($array as $field)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $field['name'] }}</td>
                <td class="py-1 text-center">
                  <img src="{{ $field['photo'] }} alt="image" />
                </td>
                <td>{{ $field['objek'] }}</td>
                <td>{{ $field['temperature'] }} Celcius</td>
                <td>{{ $field['place_name'] }}</td>
                <td>{{ $field['state'] }}</td>
                <td>{{ $field['created_at'] }}</td>
                <td>
                  <a href="{{ route('survey.objek',$field['id']) }}" class="btn btn-primary btn-sm">Lihat detail <i class="fa fa-eye"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
                lat: data.list[0].latitude,
                lng: data.list[0].longtitude,
            },
            zoom:14
          });

          $.each(data.list,function(key,value){
            var marker = new google.maps.Marker({
                position:{
                    lat: value.latitude,
                    lng: value.longtitude,
                },
                map: map,
                draggable: true
              });
            marker.setDraggable(false);
            });
        });
        
    </script>
@endsection