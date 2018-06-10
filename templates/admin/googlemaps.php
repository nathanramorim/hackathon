    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
     
    </style>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -19.918184732516185, lng: -43.959961799999974},
          zoom: 12
        });
        var image = 'assets/img/icons/placeholder.png';
        var marker = new google.maps.Marker({
            position: {lat: -19.918184732516185, lng: -43.959961799999974},
            map: map,
            icon:image,
            draggable: true,
            animation: google.maps.Animation.DROP,
            title: 'Mariana'
        });
       
        var infowindow = new google.maps.InfoWindow();

        marker.addListener('click', function(){
            infowindow.setContent('Olá');
            infowindow.open(map, marker);
        });

      }
    </script>
    