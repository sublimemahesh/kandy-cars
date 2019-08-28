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

        pickup = $('#office').val();
        pickup_org = $('#origin').val();
        alert(pickup_org);
        destination = $('#destination').val();
        package_id = $('#package_id').val();

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
            url: "distance/ajax/distance-rent-car.php",
            type: "POST",
            data: {
                pickup: pickup,
                destination: destination,
                package_id: package_id
            },
            dataType: "JSON",
            success: function (jsonStr) {
                if (jsonStr.status) {
                    $('#distance_id').empty();
                    $('#price_id').empty();


                    $('#distance_id').append(jsonStr.distance);
                    $('#price_id').append(jsonStr.price);
                    $('#loading').hide();
                }
            }
        });

    }

    $("#pick_up_date ,#select_method,#drop_up_date,#destination,#select_method,#office").click(function () {

        //Pick up date
        var pick_up_date = $('#pick_up_date').val();
        var select_method = $('#select_method').val();
        var drop_up_date = $('#drop_up_date').val();
        var destination = $('#destination').val();
        var select_method = $('#select_method').val();
        var office = $('#office').val();
        var dates = $('#dates').val();

        var pick_update = new Date(pick_up_date);
        var drop = new Date();

        var drop = drop.setDate(pick_update.getDate() + parseInt(dates))

        var drop_date = ('yy-dd-mm', new Date(drop));
        alert(drop_date);
        jQuery('.date-time-picker-drop').datetimepicker({
            dateFormat: 'yy-dd-mm',
            minDate: drop_date,
            maxDate: drop_date,
            defaultDate: drop_date,
            defaultTime: '23:00',
            minTime: '23:00'
        });


        if (select_method == 0) {
            $('#collect_office').css("display", "none");
            $('#collect_office_2').css("display", "none");
            $('#your_location').css("display", "none");

        } else if (select_method == 'Collect From Office') {

            $('#collect_office').css("display", "block");
            $('#collect_office_2').css("display", "none");
            $('#your_location').css("display", "none");



        } else if (select_method == 'Home Delivery') {
            $('#collect_office').css("display", "none");
            $('#collect_office_2').css("display", "block");
            $('#your_location').css("display", "block");
        }

        //empty
        $('#select_method_append').empty();
        $('#pick_up_date_append').empty();
        $('#drop_location_append').empty();
        $('#drop_up_date_append').empty();
        $('#select_office_append').empty();

        //append val
        $('#select_method_append').append(select_method);
        $('#pick_up_date_append').append(pick_up_date);
        $('#drop_location_append').append(destination);
        $('#drop_up_date_append').append(drop_up_date);
        $('#select_office_append').append(office);
        $('#drop_up_date').val(drop_date);
    });
});