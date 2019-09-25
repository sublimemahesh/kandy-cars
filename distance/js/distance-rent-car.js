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

var droplocation = document.getElementById('destination');
var dropAutocomplete = new google.maps.places.Autocomplete(droplocation, options);

var dropAutocompleteLocation = (dropAutocomplete, options);

var returnlocation = document.getElementById('office');
var returnAutocomplete = (returnlocation, options);



$(document).ready(function () {


    google.maps.event.addListener(returnAutocomplete, 'place_changed', function () {

        pickup = $('#origin').val();
        office = $('#office').val();
        package_id = $('#package_id').val();
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
            $('#office').css("disabled", true);
            calDropHome();
        }

    });
});

google.maps.event.addListener(dropAutocompleteLocation, 'place_changed', function () {

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

        calHomePrice()

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


$("#office,#select_method,#select_method_drop,#origin").change(function () {

    var pickup = $('#office').val();

    var select_method = $('#select_method').val();
    var select_method_drop = $('#select_method_drop').val();

    if (pickup) {

        calPrice();

        $('#price_hide').show();
        $('#tax_hide').show();
        $('.total_price_hide').show();
        $('#select_method_append').empty();
        $('#select_method_append').append(select_method);
        $('#select_office_append').append(pickup);
        $('#select_method_drop_append').append(select_method_drop);
    }

    if (select_method == '') {

        $('.collect_office').css("display", "none");
        $('#your_location').css("display", "none");

        $('#distance_hide').css("display", "none");
        $('#ex_per_km_hide').css("display", "none");
        $('#distance_price_hide').css("display", "none");
        $('#driver_charge_hide').css("display", "none");
        $('#package_charge_hide').css("display", "none");
        $('#select_method_pick_up_hide').css("display", "none");
        $('#select_method_drop_hide').css("display", "none");
        $('#price_id').css("display", "none");
        $('#tax').css("display", "none");
        $('.total_price').css("display", "none");
        $('#select_office_append').css("display", "none");

        $('#price_hide').css("display", "none");
        $('#tax_hide').css("display", "none");
        $('.total_price_hide').css("display", "none");
        $('#select_office_append').empty();
        $('#select_method_drop_append').empty();
        $('#select_office_drop_append').empty();


    } else if (select_method == 'Collect From Office') {


        $('.collect_office').show();
        $('#your_location').css("display", "none");
        $('#select_method_pick_up_hide').show();


        $('#distance_hide').css("display", "none");
        $('#ex_per_km_hide').css("display", "none");
        $('#distance_price_hide').css("display", "none");
        $('#driver_charge_hide').css("display", "none");
        $('#package_charge_hide').css("display", "none");
        $('#select_method_pick_up_hide').css("display", "none");
        $('#select_method_drop_hide').css("display", "none");
        $('#select_method_pick_up_hide').show();
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


        $('.collect_office').show();
        $('#your_location').show();
        $('#distance_hide').css("display", "none");
        $('#ex_per_km_hide').css("display", "none");
        $('#distance_price_hide').css("display", "none");
        $('#package_charge_hide').css("display", "none");
        $('#select_method_pick_up_hide').css("display", "none");
        $('#select_method_drop_hide').css("display", "none");
        $('#select_method_pick_up_hide').show();
        $('#driver_charge_hide').css("display", "none");
        $('#price_hide').show();
        $('#tax_hide').show();
        $('.total_price_hide').show();
        $('#destination').val(' ');

    }

    if (select_method_drop == '') {
        $('.drop_office').css("display", "none");
        $('#drop_office_2').css("display", "none");
        $('#your_drop_location').css("display", "none");
        $('#select_method_drop_hide').css("display", "none");
        $('#destination').empty();


    } else if (select_method_drop == 'Drop From Office' && select_method == 'Home Delivery') {

        $('#select_method_drop_hide').show();
        $('#distance_hide').show();
        $('#ex_per_km_hide').show();
        $('#distance_price_hide').show();
        $('#return_office').show();
        $('#package_charge_hide').show();
        $('.drop_office').show();
        $('#distance_price_hide').show();
        $('#select_method_pick_up_hide').show();
        $('#driver_charge_hide').show();
        $('.drop_office').show();

        $('#driver_charge_hide').hide();

        $('#select_method_append').empty();
        $('#select_method_drop_append').empty();
        $('#select_office_append').empty();

        $('#select_method_append').append(select_method);
        $('#select_method_drop_append').append('Drop From Office');
        $('#select_office_append').append(pickup);
        $('#select_office_drop_append').append(pickup);


        $('#select_method_drop_append').empty();

    } else if (select_method_drop == 'Drop From Office') {

        $('.drop_office').show();
        $('#your_drop_location').hide();

        $('#select_office_drop_append').empty();
        $('#select_office_append').empty();
        $('#select_method_append').empty();
        $('#select_method_drop_append').empty();
        $('#select_office_append').empty();
        $('#select_office_drop_append').empty();

        $('#return_office').show();
        $('#select_method_drop_hide').show();
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

        $('.drop_office').show();
        $('#your_drop_location').show();
        $('#select_method_drop_hide').show();
        $('#distance_hide').show();
        $('#ex_per_km_hide').show();
        $('#distance_price_hide').show();
        $('#package_charge_hide').css("display", "none");
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
            url: "../../distance/ajax/distance-rent-car.php",
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
                $('#table-bar').show();
                $('#price_id').empty();
                $('#tax').empty();
                $('.total_price').empty();
                $('.payment').empty();
                if (pickup) {
                    calPrice();
                }


            }
        });

    }

});

$("#select_method,#select_method_drop").click(function () {


    var pick_up_date = $('#pick_up_date').val();

    if (!pick_up_date || pick_up_date == 'Pick up Date / Time') {

        swal({
            title: "Hey",
            text: "Please select pickup Pick up Date / Time",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    }

});


function calPrice() {

    var office = $('#office').val();
    var package_id = $('#package_id').val();

    $.ajax({
        url: "../../distance/ajax/distance-rent-car.php",
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
            $('.total_price').empty();
            $('.payment').empty();
            //Append
            $('#price_id').append('Rs: ' + jsonStr.price);
            $('#tax').append('Rs: ' + jsonStr.tax);
            $('.total_price').append('Rs: ' + jsonStr.total_price);
            $('.payment').val(jsonStr.payment);
        }
    });
}

function  calHomePrice() {

//    var select_method_drop = $('#select_method_drop').val();

    if (pickup != null && destination != null) {

        $.ajax({
            url: "../../distance/ajax/distance-rent-car.php",
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
                $('#ex_per_km').empty();
                $('#driver_charge').empty();
                $('#deliver_charge').empty();
                $('#distance').empty();
                $('#distance_price').empty();
                $('#package_charge').empty();
                $('#tax').empty();
                $('.total_price').empty();
                $('.payment').empty();

                //Show val
                $('#distance_hide').show();
                $('#ex_per_km_hide').show();
                $('#distance_price_hide').show();
                $('#driver_charge_hide').show();
                $('#package_charge_hide').show();
                $('#deliver_charge_hide').show();

                //Append
                $('#distance').append(jsonStr.distance);
                $('#ex_per_km').append('Rs: ' + jsonStr.ex_per_km);
                $('#distance_price').append('Rs: ' + jsonStr.distance_price);
                $('#driver_charge').append('Rs: ' + jsonStr.driver_charge);
                $('#deliver_charge').append('Rs: ' + jsonStr.deliver_charge);
                $('#price_id').append('Rs: ' + jsonStr.price);
                $('#tax').append('Rs ' + jsonStr.tax);

                $('.total_price').append('Rs: ' + jsonStr.total_price);
                $('#package_charge').append('Rs: ' + jsonStr.charge);
                $('.payment').val(jsonStr.payment);
                $('#loading').hide();
            }

        });
    } else {

        $('#loading').show();
        $.ajax({
            url: "../../distance/ajax/distance-rent-car.php",
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
                $('#ex_per_km').empty();
                $('#driver_charge').empty();
                $('#deliver_charge').empty();
                $('#distance').empty();
                $('#distance_price').empty();
                $('#package_charge').empty();
                $('#tax').empty();
                $('.total_price').empty();
                $('.payment').empty();

                //Show val
                $('#distance_hide').show();
                $('#ex_per_km_hide').show();
                $('#distance_price_hide').show();
                $('#driver_charge_hide').show();
                $('#package_charge_hide').show();
                $('#deliver_charge_hide').show();

                //Append
                $('#distance').append(jsonStr.distance);
                $('#ex_per_km').append('Rs: ' + jsonStr.ex_per_km + ' km');
                $('#distance_price').append('Rs: ' + jsonStr.distance_price);
                $('#driver_charge').append('Rs: ' + jsonStr.driver_charge);
                $('#deliver_charge').append('Rs: ' + jsonStr.deliver_charge);
                $('#price_id').append('Rs: ' + jsonStr.price);
                $('#tax').append('Rs ' + jsonStr.tax);

                $('.total_price').append('Rs: ' + jsonStr.total_price);
                $('#package_charge').append('Rs: ' + jsonStr.charge);
                $('.payment').val(jsonStr.payment);
                $('#loading').hide();
            }

        });

    }
}

function calDropHome() {
    $('#loading').show();
    $.ajax({
        url: "../../distance/ajax/distance-rent-car.php",
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
            $('#ex_per_km').empty();
            $('#driver_charge').empty();
            $('#deliver_charge').empty();
            $('#distance').empty();
            $('#distance_price').empty();
            $('#package_charge').empty();
            $('#tax').empty();
            $('.total_price').empty();
            $('.payment').empty();
            //Show val
            $('#distance_hide').show();
            $('#ex_per_km_hide').show();
            $('#distance_price_hide').show();
            $('#driver_charge_hide').show();
            $('#package_charge_hide').show();
            $('#deliver_charge_hide').show();
            //Append
            $('#distance').append(jsonStr.distance);
            $('#ex_per_km').append('Rs: ' + jsonStr.ex_per_km);
            $('#distance_price').append('Rs: ' + jsonStr.distance_price);
            $('#driver_charge').append('Rs: ' + jsonStr.driver_charge);
            $('#deliver_charge').append('Rs: ' + jsonStr.deliver_charge);
            $('#price_id').append('Rs: ' + jsonStr.price);
            $('#tax').append('Rs ' + jsonStr.tax);

            $('.total_price').append('Rs: ' + jsonStr.total_price);
            $('.payment').val(jsonStr.payment);

            $('#package_charge').append('Rs: ' + jsonStr.charge);
            $('#loading').hide();
        }
    });
}

$("#next").click(function () {

    var pick_up_date = $('#pick_up_date').val();
    var select_method = $('#select_method').val();
    var select_method_drop = $('#select_method_drop').val();
    var office = $('#office').val();


    if (!pick_up_date || pick_up_date == 'Pick up Date / Time') {
        swal({
            title: "Hey",
            text: "Please select pickup Pick up Date / Time",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else if (!select_method) {
        swal({
            title: "Hey",
            text: "Please select take a vehicle.",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else if (!select_method_drop) {
        swal({
            title: "Hey",
            text: "Please select drop a vehicle.",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else if (!office) {
        swal({
            title: "Hey",
            text: "Please select a office.",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else {
        $('#customer_panel').show();
        $('#package_panel').css("display", "none");

    }

});


$("#pay").click(function (event) {
    event.preventDefault();
    var captchacode = $('#captchacode').val();
    if (!$('#first_name').val() || $('#first_name').val().length === 0) {
        swal({
            title: "Error!",
            text: "Please enter your first name..!",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#last_name').val() || $('#last_name').val().length === 0) {
        swal({
            title: "Error!",
            text: "Please enter your last name..!",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#email').val() || $('#email').val().length === 0) {
        swal({
            title: "Error!",
            text: "Please enter your email..!",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#phone_number').val() || $('#phone_number').val().length === 0) {
        swal({
            title: "Error!",
            text: "Please enter your phone number..!",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#city').val() || $('#city').val().length === 0) {
        swal({
            title: "Error!",
            text: "Please enter your city..!",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#address').val() || $('#address').val().length === 0) {
        swal({
            title: "Error!",
            text: "Please enter your address..!",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if (!$('#captchacode').val() || $('#captchacode').val().length === 0) {
        swal({
            title: "Error!",
            text: "Please enter the captcha code",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if ($('#captchacode').val() != captchacode) {
        swal({
            title: "Error!",
            text: "captcha code wrong..!",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else if ($('#agree').prop("checked") == false) {
        swal({
            title: "Error!",
            text: "Please accept our term and conditions",
            type: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    } else {
        var fname = $('#first_name').val();
        var lname = $('#last_name').val();
        var address = $('#address').val();
        var package_id = $('#package_id').val();
        var city = $('#city').val();
        var country = $('#country').val();
        var email = $('#email').val();
        var phone = $('#phone_number').val();
        var amount = $('#amount').val();
        var price_summery = $("#price-summery").html(); 
        var postal_code = $('#postal_code').val();
        var captchacode = $('#captchacode').val();

        $.ajax({
            type: 'POST',
            url: '../../distance/ajax/pay.php',
            dataType: "json",
            data: {
                fname: fname,
                lname: lname,
                address: address,
                city: city,
                country: country,
                package_id: package_id,
                email: email,
                phone: phone,
                postal_code: postal_code,
                amount: amount,
                captchacode: captchacode,
                price_summery: price_summery,
                option: 'PAY'
            },
            success: function (result) {
                if (result.status == 'success') {
                    $("#payments").submit();

                } else if (result.status == 'error') {
                    swal({
                        title: "Error!",
                        text: "Please enter correct captchacode.",
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    return false;
                }
            }
        });
    }
});
$("#back").click(function (event) {
    event.preventDefault();

    $('#customer_panel').css("display", "none");
    $('#package_panel').show();
});

$("#country").change(function () {
    if ($("#country").val() == "Sri Lanka (à·�à·Šâ€�à¶»à·“ à¶½à¶‚à¶šà·�à·€)") {
        $(".postal_code").addClass('hidden');
    } else {
        $(".postal_code").removeClass('hidden');
    }
});

$("#country").blur(function () {
    if ($("#country").val() == "Sri Lanka (à·�à·Šâ€�à¶»à·“ à¶½à¶‚à¶šà·�à·€)") {
        $(".postal_code").addClass('hidden');
    } else {
        $(".postal_code").removeClass('hidden');
    }
});