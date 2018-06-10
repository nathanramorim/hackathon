$(function(){

    var map;
    var maker;
    
    const infowindow = new google.maps.InfoWindow();
    const image = '../assets/img/icons/placeholder.png';
    
    const utMaps = {
        toggleBounce : function(){
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        },
        initMap : function(){
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -19.918184732516185, lng: -43.959961799999974 },
                zoom: 12,
                fullscreenControl: true,
                fullscreenControlOptions: 'RIGHT_TOP'
            });
    
            marker = new google.maps.Marker({
                position: { lat: -19.918184732516185, lng: -43.959961799999974 },
                map: map,
                icon: image,
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: 'Mariana'
            });
            
            marker.addListener('click', function () {
                infowindow.setContent('Olá');
                infowindow.open(map, marker);
            });
    
            // medir distancia
    
            var origin = new google.maps.LatLng(55.930385, -3.118425);
            
            var destination = new google.maps.LatLng(50.087692, 14.421150);
    
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: 'DRIVING',
                }, callback);
    
            function callback(response, status) {
                console.log(response.rows);
                console.log(response.rows[0].elements[0].distance.text);
                console.log(response.rows[0].elements[0].duration.text);
            }
        }
    
    }
    
    utMaps.initMap();
});


   



