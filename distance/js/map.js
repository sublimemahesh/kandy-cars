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
var firstpickup = "";
var aaa = 0.00;

$(document).ready(function () {

//    append();

//    google.maps.event.addListener(pickupAutocomplete, 'place_changed', function () {
//        $('#pick_up_location_append').empty();
//        pickup = $('#origin').val();
//        $('#pick_up_location_append').append(pickup);
//    });
//
//    google.maps.event.addListener(returnAutocomplete, 'place_changed', function () {
//
//        $('#drop_location_append').empty();
//        destination = $('#destination').val();
//        $('#drop_location_append').append(destination);
////        package_id = $('#package_id').val();
////        pick_up_date = $('#pick_up_date').val();
////        drop_up_date = $('#drop_up_date').val();
////        vehicle_id = $('#vehicle_id').val();
////        selection_type = $('#selection_type').val();
//        if (destination && !pickup) {
//
//            swal({
//                title: "Error",
//                text: "Please select pickup location first",
//                type: 'error',
//                timer: 3000,
//                showConfirmButton: false
//            }, );
//            $('#destination').val("");
//        } else if (destination === pickup) {
//            swal({
//                title: "Hey",
//                text: "Please select differnt destination",
//                type: 'error',
//                timer: 3000,
//                showConfirmButton: false
//            }, );
//            $('#destination').val("");
//        } else {
//            calPrice();
//        }
//    });

    $('#wrapper').on('change', '#pick_up_date', function () {

        var pick_up_date = $('#pick_up_date').val();
        var hours = parseInt($('#hours').val());

        if (!pick_up_date) {
            $('#drop_up_date_append').empty();
            $('#drop_up_date').val("");
        } else {


            var pick_update = new Date(pick_up_date);


            var date = pick_update.setHours(pick_update.getHours() + hours);

            var d = new Date(date);
            var day = d.getDate();
            var month = d.getMonth() + 1;
            var year = d.getFullYear();
            var hour = d.getHours();
            var minutes = d.getMinutes();
            if (day < 10) {
                day = "0" + day;
            }
            if (month < 10) {
                month = "0" + month;
            }
            if (hour < 10) {
                hour = "0" + hour;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }

            var dropDate = year + "/" + month + "/" + day + " " + hour + ":" + minutes;

//empty first
            $('#pick_up_date_append').empty();
            $('#drop_up_date_append').empty();

            $('#pick_up_date_append').append(pick_up_date);
            $('#drop_up_date_append').append(dropDate);
            $('#drop_up_date').val(dropDate);
        }
    });

    $('#wrapper').on('change', '#packages', function () {

        var package_id = $('#packages').val();
        var pick_up_date = $('#pick_up_date').val();
        var pickup = $('#office').val();

//    if (!pick_up_date) {
//
//        swal({
//            title: "Hey",
//            text: "Please select pickup Pick up Date / Time",
//            type: 'error',
//            timer: 3000,
//            showConfirmButton: false
//        }, );
//    } else {
        if (package_id == 0) {
            $('#table-bar').hide();
        } else {
            $.ajax({
                url: "distance/ajax/distance-rent-car.php",
                type: "POST",
                data: {
                    package_id: package_id,
                    action: 'GETTHEPACKAGEBYID'
                },
                dataType: "JSON",
                success: function (jsonStr) {

                    $('#pick_up_date').val('Pick up Date / Time');
                    $('#drop_up_date_append').empty();
                    $('#pick_up_date_append').empty();
                    $('#drop_up_date_append').append('----/--/-- 00:00:00');
                    $('#pick_up_date_append').append('----/--/-- 00:00:00');
                    $('#drop_up_date').val('----/--/-- 00:00:00');


                    var html = '<tr>';
                    $.each(jsonStr, function (i, data) {
                        html += '<td>' + data.title + '</td>';
                        html += '<td>' + data.dates + '</td>';
                        html += '<td>' + data.km + ' Km</td>';
                        html += '<td> Rs:' + data.charge + '.00</td>';
                        html += '<input type="hidden" id="package_id" value="' + data.id + '">';

                        $('#dates').val(data.dates);
                    });
                    html += '</tr>';
                    $('#package_body').empty();
                    $('#package_body').append(html);
                    $('#table-bar-display').css("display", "none");
                    $('#table-bar').css("display", "block");
                    $('#price_id').empty();
                    $('#tax').empty();
                    $('.total_price').empty();
                    $('.payment').empty();

                }
            });

        }

    });



    $("#select_method").change(function () {

        var pickup = $('#office').val();
        var select_method = $('#select_method').val();
        var select_method_drop = $('#select_method_drop').val();

        if (pickup) {


//
//            $('#price_hide').css("display", "block");
//            $('#tax_hide').css("display", "block");
//            $('.total_price_hide').css("display", "block");
//            $('#select_method_append').empty();
//            $('#select_method_append').append(select_method);
//            $('#select_office_append').append(pickup);
//            $('#select_method_drop_append').append(select_method_drop);
        }

        if (select_method == '') {

//            $('.collect_office').css("display", "none");
//            $('#your_location').css("display", "none");
//
//            $('#distance_hide').css("display", "none");
//            $('#ex_per_km_hide').css("display", "none");
//            $('#distance_price_hide').css("display", "none");
//            $('#driver_charge_hide').css("display", "none");
//            $('#package_charge_hide').css("display", "none");
//            $('#select_method_pick_up_hide').css("display", "none");
//            $('#select_method_drop_hide').css("display", "none");
//            $('#select_method_drop_hide').css("display", "none");
//            $('#price_id').css("display", "none");
//            $('#tax').css("display", "none");
//            $('.total_price').css("display", "none");
//            $('#select_office_append').css("display", "none");
//
//            $('#price_hide').css("display", "none");
//            $('#tax_hide').css("display", "none");
//            $('.total_price_hide').css("display", "none");
//            $('#select_office_append').empty();
//            $('#select_method_drop_append').empty();
//            $('#select_office_drop_append').empty();


        } else if (select_method == 'Collect From Office') {


            $('.collect_office').css("display", "block");
            $('#your_location').css("display", "none");
            $('#select_method_pick_up_hide').css("display", "block");


            $('#distance_hide').css("display", "none");
            $('#ex_per_km_hide').css("display", "none");
            $('#distance_price_hide').css("display", "none");
            $('#driver_charge_hide').css("display", "none");
            $('#package_charge_hide').css("display", "none");
            $('#select_method_pick_up_hide').css("display", "none");
            $('#select_method_drop_hide').css("display", "none");
            $('#select_method_pick_up_hide').css("display", "block");
            $('#deliver_charge_hide').hide();

            $('#select_method_drop_append').empty();
            $('#select_office_append').empty();
            $('#select_office_append').append(pickup);

            $('#distance').empty();
            $('#ex_per_km').empty();
            $('#distance_price').empty();
            $('#driver_charge').empty();
            $('#deliver_charge').empty();
            $('#origin').val(' ');

            $('#package_charge').empty();
            $('#tax').empty();
            $('.total_price').empty();

            $('#price_id').empty();
            $('#tax').empty();
            $('.total_price').empty();



        } else if (select_method == 'Home Delivery') {

            $('#select_method_append').empty();
            $('#select_office_append').empty();
            $('#select_office_drop_append').empty();

            $('#select_method_append').append(select_method);
            $('#select_office_append').append(pickup);


            $('.collect_office').css("display", "block");
            $('#your_location').css("display", "block");
            $('#distance_hide').css("display", "none");
            $('#ex_per_km_hide').css("display", "none");
            $('#distance_price_hide').css("display", "none");
            $('#package_charge_hide').css("display", "none");
            $('#select_method_pick_up_hide').css("display", "none");
            $('#select_method_drop_hide').css("display", "none");
            $('#select_method_pick_up_hide').css("display", "block");
            $('#driver_charge_hide').css("display", "none");
            $('#price_hide').css("display", "block");
            $('#tax_hide').css("display", "block");
            $('.total_price_hide').css("display", "block");
            $('#destination').val(' ');

        }

        if (select_method_drop == '') {
            $('.drop_office').css("display", "none");
            $('#drop_office_2').css("display", "none");
            $('#your_drop_location').css("display", "none");
            $('#select_method_drop_hide').css("display", "none");
            $('#destination').empty();


        } else if (select_method_drop == 'Drop From Office' && select_method == 'Home Delivery') {

            $('#select_method_drop_hide').css("display", "block");
            $('#distance_hide').css("display", "block");
            $('#ex_per_km_hide').css("display", "block");
            $('#distance_price_hide').css("display", "block");
            $('#driver_charge_hide').hide();
            $('#return_office').css("display", "block");
            $('#package_charge_hide').css("display", "block");

            $('#distance_price_hide').css("display", "block");


            $('#select_method_pick_up_hide').css("display", "block");
            $('#driver_charge_hide').css("display", "block");

            $('#select_method_append').empty();
            $('#select_method_drop_append').empty();
            $('#select_office_append').empty();

            $('#select_method_append').append(select_method);
            $('#select_method_drop_append').append('Drop From Office');
            $('#select_office_append').append(pickup);
            $('#select_office_drop_append').append(pickup);


            $('#select_method_drop_append').empty();

        } else if (select_method_drop == 'Drop From Office') {

            $('.drop_office').css("display", "block");
            $('#your_drop_location').css("display", "none");

            $('#select_office_drop_append').empty();
            $('#select_office_append').empty();
            $('#select_method_append').empty();
            $('#select_method_drop_append').empty();
            $('#select_office_append').empty();
            $('#select_office_drop_append').empty();

            $('#return_office').css("display", "block");
            $('#select_method_drop_hide').css("display", "block");
            $('.drop_office').css("display", "block");
            $('#your_drop_location').css("display", "none");
            $('#package_charge_hide').css("display", "none");
            $('#select_method_drop_append').append(select_method_drop);
            $('#select_method_append').append(select_method);
            $('#select_office_append').append(pickup);
            $('#select_office_drop_append').append(pickup);
            $('#origin').val(' ');
            $('#destination').val(' ');


        } else if (select_method_drop == 'Home Delivery') {
            $('#select_method_drop_append').empty();
            $('#select_method_append').empty();
            $('#select_office_append').empty();
            $('#select_office_append').empty();
            $('#price_id').empty();
            $('#tax').empty();
            $('.total_price').empty();

            $('#select_method_append').append(select_method);
            $('#select_office_append').append(pickup);

            $('#select_method_drop_append').append(select_method_drop);

            $('.drop_office').css("display", "block");
            $('#drop_office_2').css("display", "block");
            $('#your_drop_location').css("display", "block");
            $('#select_method_drop_hide').css("display", "block");
            $('#distance_hide').css("display", "block");
            $('#ex_per_km_hide').css("display", "block");
            $('#distance_price_hide').css("display", "block");
            $('#package_charge_hide').css("display", "none");
        }


    });

    $("#select_method").click(function () {

        var pick_up_date = $('#pick_up_date').val();

        if (!pick_up_date) {
          
            swal({
                title: "Hey",
                text: "Please select pickup Pick up Date / Time",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            });
        }
    });

});