function mapLocation() {
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var srilanka = new google.maps.LatLng(7.8731, 80.7718);
    var mapOptions = {
      zoom: 7,
      center: srilanka
    };
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    directionsDisplay.setMap(map);
    google.maps.event.addDomListener(document.getElementById('routebtn'), 'click', calcRoute);
  }

  function calcRoute() {
    var start = new google.maps.LatLng(6.1395, 80.1063);
    //var end = new google.maps.LatLng(38.334818, -181.884886);
    var end = new google.maps.LatLng(6.0535, 80.2210);
    var request = {
      origin: start,
      destination: end,
      travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        directionsDisplay.setMap(map);
      } else {
        alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
      }
    });
  }
  

  google.maps.event.addDomListener(window, 'load', initialize);
}
mapLocation();