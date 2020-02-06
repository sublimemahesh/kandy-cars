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

    });



    $("#append").click(function () {

        if (!$('#destination').val()) {

            swal({
                title: "Hey",
                text: "Please enter the destination",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else {
            var destination = $('#destination').val();
            $('table').show();
            $('.destination').show();
            $(".inc").append('<tr class="remove-col"><td scope="row"><input type="hidden" name="destination" class="destination" value="' + destination + '"><p class="pull-left">' + destination + ' </p></td><td scope="row"> <input type="hidden" name="txtpick_up_location" class="pick_up_location"  id="txtpick_up_location" value="' + destination + '  "> <a href="#" class="remove_this" id="data-id' + destination + '" > <p  >Remove <i class="fa fa-times fa-icion-s " aria-hidden="true"></i></p></a> </td></tr>  ');


            var pick_up_location = $('#origin').val();


            //empty
            $('#pick_up_location_append').empty();
            $('#drop_location_append').empty();

            //append
            $('#pick_up_location_append').append(pick_up_location);
            $('#drop_location_append').append(destination);
        }


    });


    $("#decoration,.destination").click(function () {
        var decoration = $('#decoration').val();

        if (decoration == 1) {
            $('#iteam_show').css("display", "block")
        } else {
            $('#iteam_show').css("display", "none")
        }
    });

    //Remove table row
    $("#myTable").on('click', '.remove-col', function () {
        $(this).closest('tr').remove();
    });
});