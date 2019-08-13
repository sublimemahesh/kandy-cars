var options = {
//  types: ['(cities)'],
    componentRestrictions: {country: "lk"}
};
var pickuplocation = document.getElementById('origin');

var pickupAutocomplete = new google.maps.places.Autocomplete(pickuplocation, options);

var returnlocation = document.getElementById('destination');
var returnAutocomplete = new google.maps.places.Autocomplete(returnlocation, options);

google.maps.event.addListener(pickupAutocomplete, 'place_changed', function () {

    var originId = $('#origin').val();
    $('#destination').val(originId);

});

$(document).ready(function () {

    jQuery('#pickup-date, #drop-date, #search-to-date').datetimepicker(); 
    
    google.maps.event.addListener(returnAutocomplete, 'place_changed', function () {
        var originId = $('#origin').val();

        var destinationId = $('#destination').val();
        if (destinationId !== originId) {
            $('.new-window').show();
            $('#msg').fadeIn().delay(3000);

        }
    }); 
});
//date calculation
$('#drop-date').change(function () {
    var pickupdate = $('#pickup-date').val();
    var dropdate = $('#drop-date').val();

    var pickupdate1 = pickupdate.replace("/", ",");
    var pickupdate1 = pickupdate1.replace("/", ",");

    var dropdate1 = dropdate.replace("/", ",");
    var dropdate1 = dropdate1.replace("/", ",");


    var firstDate = new Date(pickupdate1);
    var secondDate = new Date(dropdate1);

    var oneDay = 24 * 60 * 60 * 1000;

    var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));
    $('#days').val(diffDays);


    $('#loading-img').show();
    $('.loading').fadeOut().delay(500);
    calPrice();


});

function calPrice() {
    var chargeperday = $('#charge_per_day').val();
    var noofdays = $('#days').val();
    var totalprice = chargeperday * noofdays;
    $('#Price').val(totalprice);


}

//Initialize tooltips
$('.nav-tabs > li a[title]').tooltip();
//Wizard
$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

    var $target = $(e.target);
    if ($target.parent().hasClass('disabled')) {
        return false;
    }
});

