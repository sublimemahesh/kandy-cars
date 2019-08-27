var vehicle;
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
    
    $("#pick_up_date ,#select_method,#drop_up_date,#destination,#selection_type").change(function () {

        //Pick up date
        var pick_up_date = $('#pick_up_date').val();
        var select_method = $('#select_method').val();
        var drop_up_date = $('#drop_up_date').val();
        var destination = $('#destination').val(); 
        var selection_type = $('#selection_type').val();
        alert(destination);
        if (select_method == 'Home Delivery') {
            $('#location_hide').show();
        } else if (select_method == 'null') {

        }

        //empty
        $('#select_method_append').empty();
        $('#pick_up_date_append').empty();
        $('#destination_append').empty();
        
        $('#drop_time_append').empty();
        $('#drop_up_date_append').empty();
        $('#type_append').empty();

        //append val
        $('#select_method_append').append(select_method);
        $('#pick_up_date_append').append(pick_up_date);
        $('#destination_append').append(destination); 
        $('#drop_up_date_append').append(drop_up_date);
        $('#type_append').append(selection_type);
    });

    $(".office_btn").click(function () {
        //Pick up method
        var select_office = $('#select_office').val();
        var your_location = $('#orign').val();

        //model hide
        $('#exampleModal').modal('hide');

        //append office empty
        $('#select_office_append').empty();

        //append value
        $('#select_office_append').append(select_office);
        $('#your_location_append').append(your_location);

    });

    $(".office_btn_1").click(function () {
        //Pick up method
        var select_office = $('#select_office_home_deliver').val();
        var your_location = $('#orign').val();

        //Model hide
        $('#exampleModal2').modal('hide');

        //empty append
        $('#select_office_append').empty();
        $('#your_location_append').empty();

        //appen val
        $('#select_office_append').append(select_office);
        $('#your_location_append').append(your_location);

    });

});