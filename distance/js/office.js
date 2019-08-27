var pickup;
var destination; 

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
 
    });
});
 