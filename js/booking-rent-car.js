$(document).ready(function () {

    $("#pick_up_date ,#select_method,#drop_up_date,#drop_location").change(function () {

        //Pick up date
        var pick_up_date = $('#pick_up_date').val();
        var select_method = $('#select_method').val();
        var drop_up_date = $('#drop_up_date').val();
        var drop_location = $('#drop_location').val();
        var pick_up_time = $('#pick_up_time').val();
        var drop_time = $('#drop_time').val();

        if (select_method == 'Home Delivery') {
            $('#location_hide').show();
        } else if (select_method == 'null') {

        }

        //empty
        $('#select_method_append').empty();
        $('#pick_up_date_append').empty();
        $('#drop_location_append').empty();
        $('#pick_up_time_append').empty();
        $('#drop_time_append').empty();
        $('#drop_up_date_append').empty();

        //append val
        $('#select_method_append').append(select_method);
        $('#pick_up_date_append').append(pick_up_date);
        $('#drop_location_append').append(drop_location);
        $('#pick_up_time_append').append(pick_up_time);
        $('#drop_time_append').append(drop_time);
        $('#drop_up_date_append').append(drop_up_date);
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