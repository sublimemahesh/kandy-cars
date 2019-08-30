var office;
var pickup;
var destination;
var select_method;
var select_method_drop;


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
        office = $('#office').val();
        package_id = $('#package_id').val();
        destination = $('#destination').val();

        if (destination && !office) {

            swal({
                title: "Hey",
                text: "Please select pickup location first",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else if (destination === office) {
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


    $("#pick_up_date ,#drop_up_date,#destination,#office").mouseleave(function () {

        var pickup = $('#office').val();

        //Pick up date
        var pick_up_date = $('#pick_up_date').val();
        var drop_up_date = $('#drop_up_date').val();
        var destination = $('#destination').val();
        var select_method = $('#select_method').val();

        var dates = $('#dates').val();

        var pick_update = new Date(pick_up_date);
        var drop = new Date(pick_up_date);

        var drop = drop.setDate(pick_update.getDate() + parseInt(dates) - 1);

        var drop_date = new Date(drop);


        var d = new Date(drop_date);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = year + "/" + month + "/" + day + " 23:59:00";

        //empty

        $('#select_method_append').empty();
        $('.select_office_append').empty();
        $('#pick_up_date_append').empty();
        $('#drop_location_append').empty();
        $('#drop_up_date_append').empty();


        //append val 
        $('#select_method_append').append(select_method);

        $('#pick_up_date_append').append(pick_up_date);
        $('#drop_location_append').append(destination);
        $('#drop_up_date_append').append(drop_up_date);
        $('.select_office_append').append(pickup);
        $('#select_office_val').val(pickup);

        $('#drop_up_date').val(date);
        $('#loading').hide();
    });

    $("#office,#select_method,#select_method_drop").change(function () {

        var pickup = $('#office').val();

        var select_method = $('#select_method').val();
        var select_method_drop = $('#select_method_drop').val();



        $('.select_office_append').empty();
        $('.select_method_drop_append').empty();
        $('#select_method_append').empty();

        $('.select_method_drop_append').append(select_method_drop);
        $('#select_method_append').append(select_method);
        $('.select_office_append').append(pickup);

        $('#select_office_val').val(pickup);
        $('#select_method_drop').val(select_method);
        $('#select_method_drop').val(select_method_drop);


    });
    $("#packages").change(function () {

        var package_id = $('#packages').val();

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

                    var html = '<tr>';
                    $.each(jsonStr, function (i, data) {
                        html += '<td>' + data.title + '</td>';
                        html += '<td>' + data.dates + '</td>';
                        html += '<td>' + data.km + ' Km</td>';
                        html += '<td> Rs:' + data.charge + '.00</td>';
                    });
                    html += '</tr>';
                    $('#package_body').empty();
                    $('#package_body').append(html);
                    $('#table-bar').show();
                }
            });
        } 
    });

    $("#select_method,#select_method_drop").click(function () {
        
        var select_method = $('#select_method').val();
        var select_method_drop = $('#select_method_drop').val();


        if (select_method == '') {
            $('.collect_office').css("display", "none");
            $('#your_location').css("display", "none");

        } else if (select_method == 'Collect From Office') {

            $('.collect_office').css("display", "block");
            $('#your_location').css("display", "none");


        } else if (select_method == 'Home Delivery') {

            $('.collect_office').css("display", "block");
            $('#your_location').css("display", "block");
        }

        if (select_method_drop == '') {
            $('.drop_office').css("display", "none");
            $('#drop_office_2').css("display", "none");
            $('#your_drop_location').css("display", "none");

        } else if (select_method_drop == 'Collect From Office') {

            $('.drop_office').css("display", "block");
            $('#drop_office_2').css("display", "none");
            $('#your_drop_location').css("display", "none");

        } else if (select_method_drop == 'Home Delivery') {
            $('.drop_office').css("display", "block");
            $('#drop_office_2').css("display", "block");
            $('#your_drop_location').css("display", "block");

        }

    });

    function calPrice() {

        $.ajax({
            url: "distance/ajax/distance-rent-car.php",
            type: "POST",
            data: {
                office: office,
                pickup: pickup,
                destination: destination,
                package_id: package_id,
                select_method_drop: 'Home Delivery',
                select_method: 'Home Delivery',
                action: 'CALLPRICEFROMOFFICE'
            },
            dataType: "JSON",
            success: function (jsonStr) {
                if (jsonStr.status) {
                    $('#distance_id').empty();
                    $('#price_id').empty();
                    $('.distance_all').empty();
                    $('#ex_km').empty();
                    $('#ex_per_km').empty();
                    $('#driver_charge').empty();


                    $('#distance_all').append(jsonStr.distance_all + ' Km');
                    $('.distance').append(jsonStr.distance);
                    $('#ex_km').append(jsonStr.ex_km + ' Km');
                    $('#ex_per_km').append(jsonStr.ex_per_km);
                    $('#price_id').append(jsonStr.price);
                    $('#driver_charge').append(jsonStr.driver_charge);

                }
            }
        });
    }

    function calPriceFromOffice() {

        $.ajax({
            url: "distance/ajax/distance-rent-car.php",
            type: "POST",
            data: {
                office: office,
                pickup: pickup,
                package_id: package_id,
                select_method_drop: 'Home Delivery',
                select_method: 'Home Delivery',
                action: 'CALLPRICEFROMHOMEDELIVER'
            },
            dataType: "JSON",
            success: function (jsonStr) {
                if (jsonStr.status) {
                    $('#distance_id').empty();
                    $('#price_id').empty();
                    $('.distance_all').empty();
                    $('#ex_km').empty();
                    $('#ex_per_km').empty();
                    $('#driver_charge').empty();


                    $('#distance_all').append(jsonStr.distance_all + ' Km');
                    $('.distance').append(jsonStr.distance);
                    $('#ex_km').append(jsonStr.ex_km + ' Km');
                    $('#ex_per_km').append(jsonStr.ex_per_km);
                    $('#price_id').append(jsonStr.price);
                    $('#loading').hide();
                    $('#driver_charge').append(jsonStr.driver_charge);
                }
            }
        });


    }
    function calPriceHomeDelivery() {

        $.ajax({
            url: "distance/ajax/distance-rent-car.php",
            type: "POST",
            data: {
                office: office,
                pickup: pickup,
                destination: destination,
                package_id: package_id,
                drop_vehivle_location: drop_vehivle_location,
                select_method_drop: select_method_drop,
                select_method: select_method,
                action: 'CALLPRICEFROMDROPVEHICLE'
            },
            dataType: "JSON",
            success: function (jsonStr) {
                if (jsonStr.status) {
                    $('#distance_all').empty();
                    $('#price_id').empty();
                    $('.distance').empty();
                    $('#ex_km').empty();
                    $('#ex_per_km').empty();
                    $('#driver_charge').empty();

                    $('#distance_all').append(jsonStr.distance_all + ' Km');
                    $('.distance').append(jsonStr.distance);
                    $('#ex_km').append(jsonStr.ex_km + ' Km');
                    $('#ex_per_km').append(jsonStr.ex_per_km);
                    $('#price_id').append(jsonStr.price);
                    $('#loading').hide();
                    $('#driver_charge').append(jsonStr.driver_charge);
                }
            }
        });


    }

});