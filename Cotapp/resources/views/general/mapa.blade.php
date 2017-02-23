@extends('principal')


@section('content')
  <style>
		 #maps{
				 overflow:auto !important;
				 position:absolute !important;

    


    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;

		 }

  </style>

<center>
    
    <h3>Proximos Juegos Cotapp <small>Haz click sobre el marcador</small></h3>
  
    <div style="width: 60%; height: 60%;" id="maps"></div>

  </center>

    <script>
      function initMap() {
        var uluru = {lat: 21.5040623, lng: -104.8993259};
        var map = new google.maps.Map(document.getElementById('maps'), {
          zoom: 15,
          center: uluru
        });
        
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });

        var content = "<h4>Equipo 1 vs Equipo 2 <br> 16/07/2016 <br> 4:00pm</h4>";          
 
        this.addInfoWindow(marker, content);

      }


      function addInfoWindow(marker, content){
 
  var infoWindow = new google.maps.InfoWindow({
    content: content
  });
 
  google.maps.event.addListener(marker, 'click', () => {
    infoWindow.open(this.map, marker);
  });
 
}
    </script>
   



@stop()

