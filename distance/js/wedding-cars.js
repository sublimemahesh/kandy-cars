var office;
var pickup;
var destination;
var select_method;
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
var total_distance_cal = 0.00;
var total_distance_calculate = 0.00;


google.maps.event.addListener(pickupAutocomplete, 'place_changed', function () {

    pickup = $('#origin').val();
    office = $('#office').val();

    package_id = $('#package_id').val();
    if (pickup && !office) {
        swal({
            title: "Hey",
            text: "Please select the nearest office",
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
        $('#office').css("disabled", );
        calDropHome();
    }
});
google.maps.event.addListener(returnAutocomplete, 'place_changed', function () {
    calDistance();
});

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
        $('#package-tot').val("0");
        $('#package-distance').val("0");
    } else {
        $.ajax({
            url: "../../../../../../distance/ajax/distance-rent-car.php",
            type: "POST",
            data: {
                package_id: package_id,
                action: 'GETTHEPACKAGEBYID'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                $('#pick_up_date').val('');
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
                    $('#package-tot').val(data.charge);
                    $('#package-distance').val(data.km);
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
                calPrice()
            }
        });

    }

});



$("#select_method").change(function () {

    var pickup = $('#office').val();
    var select_method = $('#select_method').val();
//        var select_method_drop = $('#select_method_drop').val();

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

        $('.collect_office').css("display", "none");
        $('#your_location').css("display", "none");

//            $('#distance_hide').css("display", "none");
//            $('#ex_per_km_hide').css("display", "none");
//            $('#distance_price_hide').css("display", "none");
//            $('#driver_charge_hide').css("display", "none");
//            $('#package_charge_hide').css("display", "none");
//            $('#select_method_pick_up_hide').css("display", "none");
//            $('#select_method_drop_hide').css("display", "none");
//            $('#select_method_drop_hide').css("display", "none");
//            $('#tax').css("display", "none");
//            $('.total_price').css("display", "none");
//            $('#select_office_append').css("display", "none");

        $('#price_hide').css("display", "none");
        $('#tax_hide').css("display", "none");
        $('.total_price_hide').css("display", "none");
        $('#select_office_append').empty();
        $('#select_method_append').empty();


    } else if (select_method == 'Collect From Office') {


        $('.collect_office').css("display", "block");
        $('#your_location').css("display", "none");
        $('#select_method_pick_up_hide').css("display", "block");
        $('#pickup_hide').hide();

//            $('#distance_hide').css("display", "none");
//            $('#ex_per_km_hide').css("display", "none");
//            $('#distance_price_hide').css("display", "none");
//            $('#driver_charge_hide').css("display", "none");
//            $('#package_charge_hide').css("display", "none");
//            $('#select_method_pick_up_hide').css("display", "none");
//            $('#select_method_drop_hide').css("display", "none");
//            $('#select_method_pick_up_hide').css("display", "block");
//            $('#deliver_charge_hide').hide();

//            $('#select_office_append').empty();
//            $('#select_office_append').append(pickup);


        $('#select_method_append').empty();
        $('#select_method_append').append(select_method);
        $('#deliver_charge_number').val("0");
        $('#distance-tot').val("0");

        $('#deliver_charge_hide').hide();
        calPrice();
//
//
//            $('#distance').empty();
//            $('#ex_per_km').empty();
//            $('#distance_price').empty();
//            $('#driver_charge').empty();
//            $('#deliver_charge').empty();
//            $('#origin').val(' ');
//
//            $('#package_charge').empty();
//            $('#tax').empty();
//            $('.total_price').empty();
//
//            $('#price_id').empty();
//            $('#tax').empty();
//            $('.total_price').empty();



    } else if (select_method == 'Home Delivery') {

        $('.collect_office').css("display", "block");
        $('#your_location').css("display", "block");

        $('#select_method_append').empty();
        $('#select_office_append').empty();
        $('#select_office_drop_append').empty();

        $('#select_method_append').append(select_method);
        $('#select_office_append').append(pickup);



//            $('#distance_hide').css("display", "none");
//            $('#ex_per_km_hide').css("display", "none");
//            $('#distance_price_hide').css("display", "none");
//            $('#package_charge_hide').css("display", "none");
//            $('#select_method_pick_up_hide').css("display", "none");
//            $('#select_method_drop_hide').css("display", "none");
//            $('#select_method_pick_up_hide').css("display", "block");
//            $('#driver_charge_hide').css("display", "none");
//            $('#price_hide').css("display", "block");
//            $('#tax_hide').css("display", "block");
//            $('.total_price_hide').css("display", "block");
//            $('#destination').val(' ');

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

$('#wrapper').on('change', '#office', function () {
    var pickup = $('#office').val();
    //empty
    calPrice();
    $('#select_office_append').empty();
    $('#select_office_append').append(pickup);
});


$("#decoration,.destination").click(function () {
    var decoration = $('#decoration').val();

    if (decoration == 1) {
        $('#iteam_show').css("display", "block")
    } else {
        $('#iteam_show').css("display", "none");
        $('#dec_price').val("0");
        $('#deco_charge_hide').hide();
        calPrice();
    }
});

$(".decoration_btn").click(function () {

    var decoration_price = $(this).attr("decoration-price");
    var decoration_price_string = $(this).attr("decoration-price-string");

    $('#deco_charge_hide').show();
    $('#decoration_price_append').empty();
    $('#decoration_price_append').append("Rs:" + decoration_price_string);
    $('#dec_price').val(decoration_price);
    calPrice();
});

function calPrice() {
    $('#loading').show();
    var dec_price = $('#dec_price').val();
    var office = $('#office').val();
    var package_id = $('#package_id').val();
    var deliver_charge = $('#deliver_charge_number').val();
    var extra_price = $('#extra_price').val();

    $.ajax({
        url: "../../../../../../distance/ajax/wedding-calculations.php",
        type: "POST",
        data: {
            office: office,
            dec_price: dec_price,
            package_id: package_id,
            deliver_charge: deliver_charge,
            extra_price: extra_price,
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
            $('#loading').hide();
        }
    });

}

function calDropHome() {
    $('#loading').show();

    var dis_tototal = $('#distance-tot').val();
    var package_distance = $('#package-distance').val();

    $.ajax({
        url: "../../../../../../distance/ajax/wedding-calculations.php",
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
//            $('#distance_id').empty();

            total_distance_calculate = parseFloat(total_distance_cal) + parseFloat(jsonStr.distance_numbers) + parseFloat(dis_tototal);


//            $('#ex_per_km').empty();
//            $('#driver_charge').empty();
            $('#deliver_charge').empty();
            $('#destination_distance_append').empty();
//            $('#distance_price').empty();
            $('#package_charge').empty();
            $('.payment').empty();
            $('#pickup').empty();

            //Show val
//            $('#distance_hide').show();
//      $('#ex_per_km_hide').show();      
//            $('#distance_price_hide').show();
//            $('#driver_charge_hide').show();
            $('#package_charge_hide').show();
            $('#deliver_charge_hide').show();
            $('#pickup_hide').show();
            //Append

            $('#destination_distance_append').append(jsonStr.distance);
            $('#distance-tot').val(jsonStr.distance_numbers);

//            $('#ex_per_km').append('Rs: ' + jsonStr.ex_per_km);
//            $('#distance_price').append('Rs: ' + jsonStr.distance_price);
//            $('#driver_charge').append('Rs: ' + jsonStr.driver_charge);
            $('#deliver_charge').append('Rs: ' + jsonStr.driver_charge);
            $('#deliver_charge_number').val(jsonStr.driver_charge);
            $('#pickup').append(pickup);

            $('#package_charge').append('Rs: ' + jsonStr.charge);



            if (package_distance > (total_distance_calculate * 2)) {
                $('#loading').hide();
                calPrice();
            } else {
                swal({
                    title: "Are you sure?",
                    text: "Additional Charge will be added to extra mileage!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                        function (isConfirm) {
                            var package_id = $('#package_id').val();
                            if (isConfirm) {
                                var dif = (total_distance_calculate * 2) - package_distance;
                                $.ajax({
                                    url: "../../../../../../distance/ajax/wedding-calculations.php",
                                    type: "POST",
                                    data: {
                                        extra_km: dif,
                                        package_id: package_id,
                                        action: 'EXTRA_KM_PRICE'
                                    },
                                    dataType: "JSON",
                                    success: function (jsonStr) {
//                                                    alert(dif + "--" + jsonStr.extra_price);
                                        $('#extra_mileage_hide').show();
                                        $('#extra_price_hide').show();


                                        $('#extra_mileage_append').empty();
                                        $('#extra_price_append').empty();

                                        $('#extra_price').val(jsonStr.extra_price);
                                        $('#extra_mileage_append').append(dif + " Km");
                                        $('#extra_price_append').append("Rs:" + jsonStr.extra_price_string);




                                        $('#destination_distance_append').empty();
                                        $('#destination_distance_append').append(total_distance_calculate + "km");
                                        $('#distance-tot').val(total_distance_calculate);

                                        $('#loading').hide();



                                        calPrice();
                                    }
                                });
                            } else {
                                $('#origin').val("");
                                $('#loading').hide();
                            }
                        });
            }


        }
    });
}

function calDistance() {

    var select_method = $('#select_method').val();

    if (select_method == '') {
        swal({
            title: "Error",
            text: "Please select the method you take the vehicle",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        }, );
        $('#destination').val("");
    } else if (select_method == 'Collect From Office') {
        var office = $('#office').val();
        if (!office) {
            swal({
                title: "Error",
                text: "Please select your nearest office",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else {
            $.ajax({
                url: "../../../../../../distance/ajax/distance-wedding.php",
                type: "POST",
                data: {
                    pickup: office,
                    destination: destination
//                        package_id: package_id,
////                      decoration_id: decoration_id,
//                        selection_type: selection_type
                },
                dataType: "JSON",
                success: function (jsonStr) {
                    if (jsonStr.status) {
                        $('#destination_distance_append').empty();
                        $('#destination_distance_append').append(jsonStr.distance);
//
//                    $('#Price').empty();
//                    $('#Price').append(jsonStr.price);
//                    $('#loading').hide();

                    }
                }
            });
        }
    } else if (select_method == 'Home Delivery') {
        var origin = $('#origin').val();
        if (!origin) {
            swal({
                title: "Error",
                text: "Please select your location",
                type: 'error',
                timer: 3000,
                showConfirmButton: false
            }, );
            $('#destination').val("");
        } else {
            $.ajax({
                url: "../../../../../../distance/ajax/distance-wedding.php",
                type: "POST",
                data: {
                    pickup: origin,
                    destination: destination
//                        package_id: package_id,
////                decoration_id: decoration_id,
//                        selection_type: selection_type
                },
                dataType: "JSON",
                success: function (jsonStr) {
                    if (jsonStr.status) {
                        $('#destination_distance_append').empty();
                        $('#destination_distance_append').append(jsonStr.distance);
//
//                    $('#Price').empty();
//                    $('#Price').append(jsonStr.price);
//                    $('#loading').hide();
//
                    }
                }
            });
        }
    }




//        $('#loading').show();




}

$("#add-destination").click(function () {
    $('#loading').show();
    var select_method = $('#select_method').val();

    var dis_tot_now = 00;
    var destination = $('#destination').val();

    if (!destination) {
        $('#loading').show();
        swal({
            title: "Error",
            text: "Location is empty",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        }, );
        $('#destination').val("");
        $('#loading').hide();
    } else {

        var package_distance = $('#package-distance').val();

        var lasttr = $('#myTable tr:last').attr('place-value');

        if (!lasttr) {
            if (select_method == 'Collect From Office') {
                firstpickup = $('#office').val();
            } else if (select_method == 'Home Delivery') {
                firstpickup = $('#origin').val();
            }
            dis_tot_now = $('#distance-tot').val();

        } else {
            firstpickup = lasttr;
            dis_tot_now = 0.00;
        }

        $.ajax({

            url: "../../../../../../distance/ajax/wedding-distance-between.php",
            type: "POST",
            data: {
                pickup: firstpickup,
                dis_tot: dis_tot_now,
                destination: destination,
            },
            dataType: "JSON",
            success: function (jsonStr) {
                if (jsonStr.status) {
                    $('#loading').hide();
                    total_distance_cal = parseFloat(total_distance_cal) + parseFloat(jsonStr.distance_numbers) + parseFloat(dis_tot_now);

                    var dis = jsonStr.distance_numbers;

                    if (package_distance > (total_distance_cal * 2)) {
                        $('table').show();
                        $('.destination').show();
                        $(".inc").append('<tr class="remove-col" place-value="' + destination + '"><td scope="row"><p class="pull-left">' + destination + ' </p></td><td scope="row"> <input type="hidden" name="txtpick_up_location" class="pick_up_location" distance-between="' + jsonStr.distance_numbers + '" id="txtpick_up_location" value="' + destination + '  "> <p>' + jsonStr.distance + '</p> </td></tr>  ');
                        $('#destination').val("");

                        $('#destination_distance_append').empty();
                        $('#destination_distance_append').append(total_distance_cal + "km");
                        $('#distance-tot').val(total_distance_cal);

                        $('#drop_location_append').empty();
                        $('#drop_location_append').append(destination);
                        $('#destination_hide').show();


                    } else {
                        swal({
                            title: "Are you sure?",
                            text: "Additional Charge will be added to extra mileage!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes, I am sure!',
                            cancelButtonText: "No, cancel it!",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                                function (isConfirm) {
                                    var package_id = $('#package_id').val();
                                    if (isConfirm) {
                                        var dif = (2 * total_distance_cal) - package_distance;
                                        $.ajax({
                                            url: "../../../../../../distance/ajax/wedding-calculations.php",
                                            type: "POST",
                                            data: {
                                                extra_km: dif,
                                                package_id: package_id,
                                                action: 'EXTRA_KM_PRICE'
                                            },
                                            dataType: "JSON",
                                            success: function (jsonStr) {
//                                                    alert(dif + "--" + jsonStr.extra_price);
                                                $('#extra_mileage_hide').show();
                                                $('#extra_price_hide').show();


                                                $('#extra_mileage_append').empty();
                                                $('#extra_price_append').empty();

                                                $('#extra_price').val(jsonStr.extra_price);
                                                $('#extra_mileage_append').append(dif + " Km");
                                                $('#extra_price_append').append("Rs:" + jsonStr.extra_price_string);



                                                $('table').show();
                                                $('.destination').show();
                                                $(".inc").append('<tr class="remove-col" place-value="' + destination + '"><td scope="row"><p class="pull-left">' + destination + ' </p></td><td scope="row"> <input type="hidden" name="txtpick_up_location" class="pick_up_location" distance-between="' + dis + '" id="txtpick_up_location" value="' + destination + '  "> <p>' + dis + " Km" + '</p> </td></tr>  ');
                                                $('#destination').val("");

                                                $('#destination_distance_append').empty();
                                                $('#destination_distance_append').append(total_distance_cal + "km");
                                                $('#distance-tot').val(total_distance_cal);


                                                $('#drop_location_append').empty();
                                                $('#drop_location_append').append(destination);
                                                $('#destination_hide').show();



                                                calPrice();
                                            }
                                        });
                                    } else {
                                        $('#destination').val("");
                                    }
                                });
                    }


                }
            }
        });





////
////
////        var pick_up_location = $('#origin').val();
//        $('#drop_location_append').empty();
//        $('#drop_location_append').append(destination);


    }


});

$("#clear-destination").click(function () {
    $('#myTable tbody > tr').remove();
    $('#myTable').hide();


    $('#destination_hide').css("display", "none");
    $('#drop_location_append').empty();

    $('#deliver_charge').empty();
    $('#deliver_charge_hide').css("display", "none");
    $('#deliver_charge_number').val("0.00");

    $('#extra_mileage_hide').css("display", "none");
    $('#extra_mileage_append').empty();


    $('#extra_price_hide').css("display", "none");
    $('#extra_price_append').empty();
    $('#extra_price').val("0.00");

    $('#destination_distance_append').empty();

    $('#pickup_hide').css("display", "none");
    $('#pickup').empty();

    $('#origin').val("");

    calPrice();


});
$("#next").click(function () {

    var pick_up_date = $('#pick_up_date').val();
    var select_method = $('#select_method').val();
    var office = $('#office').val();
    var dis_tot = $('#distance-tot').val();


    if (!pick_up_date) {
        swal({
            title: "Error",
            text: "Please select pickup Date / Time",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else if (!select_method) {
        swal({
            title: "Error",
            text: "Please select select how you take the vehicle.",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else if (!office) {
        swal({
            title: "Error",
            text: "Please select the nearest office.",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else if (dis_tot === "0") {
        swal({
            title: "Error",
            text: "Please select at least one destination.",
            type: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    } else {
        $('#customer_panel').css("display", "block");
        $('#package_panel').css("display", "none");

    }

});

$("#back").click(function (event) {
    event.preventDefault();

    $('#customer_panel').css("display", "none");
    $('#package_panel').css("display", "block");
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

//        $("#summery-append").val("");
//        $("#summery-append").val(summery);

        $.ajax({
            type: 'POST',
            url: '../../../../../../distance/ajax/pay-wedding.php',
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