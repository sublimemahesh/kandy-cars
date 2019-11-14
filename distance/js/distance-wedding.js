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

    append();

    google.maps.event.addListener(returnAutocomplete, 'place_changed', function () {

        pickup = $('#origin').val();
        destination = $('#destination').val();
        package_id = $('#package_id').val();
        pick_up_date_time = $('#pick_up_date_time').val();
        drop_date_time = $('#drop_date_time').val();
        vehicle_id = $('#vehicle_id').val();
        selection_type = $('#selection_type').val();

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

    function append() {

        $("#pick_up_date_time,#drop_date_time,#selection_type,#origin,#destination").change(function () {

            selection_type = $('#selection_type').val();
            drop_date_time = $('#drop_date_time').val();
            pick_up_date_time = $('#pick_up_date_time').val();
            pick_up_location = $('#origin').val();
            destination = $('#destination').val();



            //empty
            $('#pick_up_date_time_append').empty();
            $('#drop_date_time_append').empty();
            $('#selection_type_append').empty();
            $('#pick_up_location_append').empty();
            $('#drop_location_append').empty();


            //append val
            $('#pick_up_date_time_append').append(pick_up_date_time);
            $('#drop_date_time_append').append(drop_date_time);
            $('#selection_type_append').append(selection_type);
            $('#pick_up_location_append').append(pick_up_location);
            $('#drop_location_append').append(destination);

            calPrice();

        });

    }

    $(".decoration_btn").click(function () {

        var decoration = $(this).attr('decoration_name');

        decoration_id = $(this).attr('decoration_id');
        $('#decoration_name_append').empty();
        $('#decoration_name_append').append(decoration);
        $('#exampleModal' + decoration_id).modal('hide');

        calPrice();
    });

    function calPrice() {

//        $('#loading').show();




        $.ajax({
            url: "../../../../../../distance/ajax/distance-wedding.php",
            type: "POST",
            data: {
                pickup: pickup,
                destination: destination,
                package_id: package_id,
//                decoration_id: decoration_id,
                selection_type: selection_type
            },
            dataType: "JSON",
            success: function (jsonStr) {
                if (jsonStr.status) {
                    $('#distance_append').empty();
                    $('#distance_append').append(jsonStr.distance);

                    $('#Price').empty();
                    $('#Price').append(jsonStr.price);
                    $('#loading').hide();

                }
            }
        });

    }




    $("#append").click(function () {

        var destination = $('#destination').val();
        $('table').show();
        $('.destination').show();
        $(".inc").append('<tr class="remove-col"><td scope="row"><p class="pull-left">' + destination + ' </p></td><td scope="row"> <input type="hidden" name="txtpick_up_location" class="pick_up_location"  id="txtpick_up_location" value="' + destination + '  "> <a href="#" class="remove_this" id="data-id' + destination + '" > <p  >Remove <i class="fa fa-times fa-icion-s " aria-hidden="true"></i></p></a> </td></tr>  ');


        var pick_up_location = $('#origin').val();


        //empty
        $('#pick_up_location_append').empty();
        $('#drop_location_append').empty();

        //append
        $('#pick_up_location_append').append(pick_up_location);
        $('#drop_location_append').append(destination);


        $.ajax({
            url: "../../../../../../distance/ajax/cal-hours.php",
            type: "POST",
            data: {
                pick_up_date_time: pick_up_date_time,
                drop_date_time: drop_date_time,
                package_id: package_id,
                vehicle_id: vehicle_id,
                action: 'CALHOURS'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                if (jsonStr.status) {
                    swal({
                        html: true,
                        title: "Info",
                        text: "Your Selected hovers are more than selecting package !",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, change !",
                        closeOnConfirm: false
                    }, function () {
                        $.ajax({
                            url: "delete/ajax/activity-photo.php",
                            type: "POST",
                            data: {
                                id: id,
                                option: 'delete'
                            },
                            dataType: "JSON",
                            success: function (jsonStr) {
                                if (jsonStr.status) {

                                    swal({
                                        title: "Deleted!",
                                        text: "Your imaginary file has been deleted.",
                                        type: 'success',
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                }
                            }
                        });
                    });
                }
            }
        });
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