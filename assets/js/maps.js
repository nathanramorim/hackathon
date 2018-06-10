$(function(){

    var map;
    var maker;


    var agents = {
        01 : {
            "name" : "Wagner Ferreira",
            "sector": "SAMU",
            "location": {
                "latitude": -19.895305905081138,
                "longitude": -43.929491905590794
            }
        },
        02 : {
            "name": "Nathan Amorim",
            "sector": "SAMU",
            "location": {
                "latitude": -19.895305905081138,
                "longitude": -43.929491905590794
            }
        },
        03: {
            "name": "Mariana",
            "sector": "SUFIS",
            "location": {
                "latitude": -19.995305905082138,
                "longitude": -43.929491905590794
            }
        },
        04: {
            "name": "Fatinha",
            "sector": "SUFIS",
            "location": {
                "latitude": -19.975305905082138,
                "longitude": -43.939491905590794
            }
        },
        05: {
            "name": "Washington",
            "sector": "SUFIS",
            "location": {
                "latitude": -19.975305905082138,
                "longitude": -43.729491905590794
            }
        },
        06: {
            "name": "Matheus",
            "sector": "SUFIS",
            "location": {
                "latitude": -19.892761,
                "longitude": -43.9310583
            }
        },
        07: {
            "name": "Matheus",
            "sector": "SUFIS",
            "location": {
                "latitude": -19.8891492,
                "longitude": -43.9406821
            }
        },
        08: {
            "name": "Matheus",
            "sector": "SUFIS",
            "location": {
                "latitude": -19.9045239,
                "longitude": -43.952001
            }
        }



    };
    
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
                zoom: 13,
                fullscreenControl: true,
                fullscreenControlOptions: 'RIGHT_TOP'
            });
            var positions = [];
            $.each(agents, function(item,value,args){
                positions.push(
                   {
                       position: new google.maps.LatLng(value.location.latitude, value.location.longitude),
                       type: image,
                       title: value.name                       
                    }
                );
            });
            $.each(positions, function (item, value, args) {
                marker = new google.maps.Marker({
                    position: value.position,
                    map: map,
                    icon: value.type,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    title:value.title
                });
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
                console.log(response.rows[0].elements[0].distance.value);
                console.log(response.rows[0].elements[0].duration.text);
            }
        }
    
    }
    const infowindow = new google.maps.InfoWindow();
    utMaps.initMap();
});