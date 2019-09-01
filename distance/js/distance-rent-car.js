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

        if (pickup && !office) {

            swal({
                title: "Hey",
                text: "Please select pickup location first",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else if (pickup === office) {
            swal({
                title: "Hey",
                text: "Please select differnt destination",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else {

        }

    });

    $('#wrapper').on('change', '#pick_up_date ,#drop_up_date,#destination,#office', function () {


        var pickup = $('#office').val();

        //Pick up date
        var pick_up_date = $('#pick_up_date').val();
        var drop_up_date = $('#drop_up_date').val();
        var destination = $('#destination').val();
        var select_method = $('#select_method').val();


        if (!pick_up_date) {
            
            var d = new Date();
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
             

        } else {
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
        }


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
        $('#origin').empty();

        $('.select_method_drop_append').append(select_method_drop);
        $('#select_method_append').append(select_method);
        $('.select_office_append').append(pickup);

        $('#select_office_val').val(pickup);
        $('#select_method_drop').val(select_method);
        $('#select_method_drop').val(select_method_drop);

        var office = $('#office').val();
        var package_id = $('#package_id').val();

        $.ajax({
            url: "distance/ajax/distance-rent-car.php",
            type: "POST",
            data: {
                office: office,
                package_id: package_id,
                action: 'OFFICE_PRICE'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                //Empty value
                $('#price_id').empty();
                $('#tax').empty();
                $('#total_price').empty();

                //Append
                $('#price_id').append(jsonStr.price);
                $('#tax').append(jsonStr.tax);
                $('#total_price').append(jsonStr.total_price);


            }
        });

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
            $('#destination').empty();
            $('#origin').empty();


        } else if (select_method == 'Collect From Office') {


            $('.collect_office').css("display", "block");
            $('#your_location').css("display", "none");

            $('#distance_id').empty();
            $('#price_id').empty();
            $('#ex_km').empty();
            $('#ex_per_km').empty();
            $('#driver_charge').empty();
            $('#distance').empty();
            $('#distance_price').empty();
            $('#destination').empty();



        } else if (select_method == 'Home Delivery') {

            $('.collect_office').css("display", "block");
            $('#your_location').css("display", "block");
            $('#destination').empty();


        }

        if (select_method_drop == '') {
            $('.drop_office').css("display", "none");
            $('#drop_office_2').css("display", "none");
            $('#your_drop_location').css("display", "none");
            $('#destination').empty();

        } else if (select_method_drop == 'Collect From Office') {

            $('.drop_office').css("display", "block");
            $('#drop_office_2').css("display", "none");
            $('#your_drop_location').css("display", "none");

            $('#destination').empty();

        } else if (select_method_drop == 'Home Delivery') {
            $('.drop_office').css("display", "block");
            $('#drop_office_2').css("display", "block");
            $('#your_drop_location').css("display", "block");
            $('#destination').empty();
        }

    });



    $("#origin").click(function () {


        var package_id = $('#package_id').val();
        var office = $('#office').val();
        var pickup = $('#origin').val();

        $.ajax({
            url: "distance/ajax/distance-rent-car.php",
            type: "POST",
            data: {
                pickup: pickup,
                office: office,
                package_id: package_id,
                action: 'DISTANCE_BY_HOME_DELIVERY'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                //Empty value
                $('#distance_id').empty();
                $('#price_id').empty();
                $('#ex_km').empty();
                $('#ex_per_km').empty();
                $('#driver_charge').empty();
                $('#distance').empty();
                $('#distance_price').empty();
                $('#package_charge').empty();
                $('#tax').empty();
                $('#total_price').empty();

                //Show val
                $('#distance_hide').show();
                $('#ex_per_km_hide').show();
                $('#distance_price_hide').show();
                $('#driver_charge_hide').show();
                $('#package_charge_hide').show();

                //Append
                $('#distance').append(jsonStr.distance);
                $('#distance_price').append(jsonStr.distance_price);
                $('#ex_km').append(jsonStr.ex_per_km + ' Km');
                $('#ex_per_km').append(jsonStr.ex_per_km);
                $('#price_id').append(jsonStr.price);
                $('#driver_charge').append(jsonStr.driver_charge);
                $('#tax').append(jsonStr.tax);
                $('#total_price').append(jsonStr.total_price);
                $('#package_charge').append(jsonStr.charge);
            }

        });

    });

    $("#destination").click(function () {

        var package_id = $('#package_id').val();
        var office = $('#office').val();
        var destination = $('#destination').val();

        pickup = $('#origin').val();
        if (!pickup) {

            $.ajax({
                url: "distance/ajax/distance-rent-car.php",
                type: "POST",
                data: {
                    destination: destination,
                    office: office,
                    package_id: package_id,
                    action: 'DISTANCE_DROP_HOME_DELIVERY'
                },
                dataType: "JSON",
                success: function (jsonStr) {
                    //Empty value
                    $('#distance_id').empty();
                    $('#price_id').empty();
                    $('#ex_km').empty();
                    $('#ex_per_km').empty();
                    $('#driver_charge').empty();
                    $('#distance').empty();
                    $('#distance_price').empty();
                    $('#tax').empty();
                    $('#total_price').empty();
                    $('#package_charge').empty();

                    //Show val
                    $('#distance_hide').show();
                    $('#ex_per_km_hide').show();
                    $('#distance_price_hide').show();
                    $('#driver_charge_hide').show();
                    $('#package_charge_hide').show();

                    //Append 
                    $('#tax').append(jsonStr.tax);
                    $('#total_price').append(jsonStr.total_price);
                    $('#distance').append(jsonStr.distance);
                    $('#distance_price').append(jsonStr.distance_price);
                    $('#ex_km').append(jsonStr.ex_per_km + ' Km');
                    $('#ex_per_km').append(jsonStr.ex_per_km);
                    $('#price_id').append(jsonStr.price);
                    $('#driver_charge').append(jsonStr.driver_charge);
                    $('#package_charge').append(jsonStr.charge);
                }

            });
        } else {

            $.ajax({
                url: "distance/ajax/distance-rent-car.php",
                type: "POST",
                data: {
                    pickup: pickup,
                    destination: destination,
                    office: office,
                    package_id: package_id,
                    action: 'DISTANCE_PICK_UP_DROP_HOME_DELIVERY'
                },
                dataType: "JSON",
                success: function (jsonStr) {

                    //Empty value
                    $('#distance_id').empty();
                    $('#price_id').empty();
                    $('#ex_km').empty();
                    $('#ex_per_km').empty();
                    $('#driver_charge').empty();
                    $('#distance').empty();
                    $('#distance_price').empty();
                    $('#tax').empty();
                    $('#total_price').empty();
                    $('#package_charge').empty();

                    //Show val
                    $('#distance_hide').show();
                    $('#ex_per_km_hide').show();
                    $('#distance_price_hide').show();
                    $('#driver_charge_hide').show();
                    $('#package_charge_hide').show();

                    //Append
                    $('#tax').append(jsonStr.tax);
                    $('#total_price').append(jsonStr.total_price);
                    $('#distance').append(jsonStr.distance);
                    $('#distance_price').append(jsonStr.distance_price);
                    $('#ex_km').append(jsonStr.ex_per_km + ' Km');
                    $('#ex_per_km').append(jsonStr.ex_per_km);
                    $('#price_id').append(jsonStr.price);
                    $('#driver_charge').append(jsonStr.driver_charge);
                    $('#package_charge').append(jsonStr.charge);
                }

            });
        }


    });


});