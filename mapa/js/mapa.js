x = navigator.geolocation;
var options = {
    enableHighAccuracy: true
  };
x.getCurrentPosition(success, failure, options);

function success(position) {
  var myLat = position.coords.latitude;
  document.getElementById("lat").innerHTML = myLat;
  var myLong = position.coords.longitude;
  document.getElementById("long").innerHTML = myLong;
  var accu = position.coords.accuracy;
  document.getElementById("accu").innerHTML = accu;
  //Obtener arreglo coordenadas
  var coords = new google.maps.LatLng(myLat, myLong);

  var mapOptions = {
    zoom: 15,
    center: coords,
    mapTypeControl: false,
    navigationControlOptions: {
        style: google.maps.NavigationControlStyle.SMALL
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  
  }

  var map = new google.maps.Map(document.getElementById("map"), mapOptions);
  var marker = new google.maps.Marker({
    map:map,
    position: coords
  });

 document.getElementById("lat2").value=myLat;
 document.getElementById("long2").value=myLong;
}

function failure(){
    alert("Por favor permita la localización del dispositivo");

}
