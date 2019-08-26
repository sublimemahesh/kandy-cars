var vehicle;
var pickup;
var destination;
var vehicleId;


var options = {
//  types: ['(cities)'],
    componentRestrictions: {country: "lk"}
};

var pickuplocation = document.getElementById('origin');  
var pickupAutocomplete = new google.maps.places.Autocomplete(pickuplocation, options);
var returnlocation = document.getElementById('destination');
var returnAutocomplete = new google.maps.places.Autocomplete(returnlocation, options);


$(document).ready(function () { 
   
    google.maps.event.addListener(returnAutocomplete, 'place_changed', function () {

        pickup = $('#origin').val();  
        destination = $('#destination').val();
        packageId = $('#packageId').val();


        if (destination && !pickup) {

            swal({
                title: "Hey",
                text: "Please select pickup location first",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else if (destination === pickup) {
            swal({
                title: "Hey",
                text: "Please select differnt destination",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else {
            calPrice();
        }
    });
});

function calPrice() {
    $('#loading').show();
    $.ajax({
        url: "distance/ajax/distance.php",
        type: "POST",
        data: {
            pickup: pickup,
            destination: destination, 
            packageId: packageId
        },
        dataType: "JSON",
        success: function (jsonStr) {
            if (jsonStr.status) {
                $('#DistanceId').val(jsonStr.distance);
                $('#Price').val(jsonStr.price);
                $('#loading').hide();

            }
        }
    });




}