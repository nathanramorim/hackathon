<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -19.918184732516185, lng: -43.959961799999974},
          zoom: 12,
          fullscreenControl: true,
          fullscreenControlOptions: 'RIGHT_TOP'
        });
        var image = 'assets/img/icons/placeholder.png';
        var marker = new google.maps.Marker({
            position: {lat: -19.918184732516185, lng: -43.959961799999974},
            map: map,
            icon:image,
            draggable: false,
            animation: google.maps.Animation.DROP,
            title: 'Mariana'
        });
       
        var infowindow = new google.maps.InfoWindow();

        marker.addListener('click', function(){
            infowindow.setContent('Olá');
            infowindow.open(map, marker);
        });



        // medir distancia

        var origin1 = new google.maps.LatLng(55.930385, -3.118425);
        var origin2 = 'Greenwich, England';
        var destinationA = 'Stockholm, Sweden';
        var destinationB = new google.maps.LatLng(50.087692, 14.421150);

        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix(
        {
            origins: [origin1, origin2],
            destinations: [destinationA, destinationB],
            travelMode: 'DRIVING',
        }, callback);

        function callback(response, status) {
         console.log(response);
        }

      }
    </script>
    
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk9twfMGeLwysX3RkDC6hYmB-kUu14UsE&callback=initMap"></script>
  </body>
</html>