$(document).ready(function () {

    $("#pick_up_date ,#pick_up_time,#origin,#drop_time,#selection_type,#decoration").change(function () {

        //Pick up date
        var pick_up_date = $('#pick_up_date').val();
        var pick_up_time = $('#pick_up_time').val();
        var pick_up_location = $('#origin').val();

        var drop_time = $('#drop_time').val();
        var selection_type = $('#selection_type').val();



        //empty
        $('#pick_up_date_append').empty();
        $('#pick_up_time_append').empty();
        $('#pick_up_location_append').empty();
        $('#drop_location_append').empty();
        $('#drop_time_append').empty();
        $('#selection_type_append').empty();



        //append val
        $('#pick_up_date_append').append(pick_up_date);
        $('#pick_up_location_append').append(pick_up_location);
        $('#drop_location_append').append(drop_location);
        $('#pick_up_time_append').append(pick_up_time);
        $('#drop_time_append').append(drop_time);
        $('#selection_type_append').append(selection_type);

    });
    $("#decoration_btn").click(function () {
        var decoration = $('#decoration_name').val();
        $('#decoration_append').empty();
        $('#decoration_append').append(decoration);
    });

    $("#append").click(function () {
        var data_val = $('#destination').val();
        $('table').show();
        $('.destination').show();
        $(".inc").append('<tr class="remove-col"><td scope="row"><p>' + data_val + ' </p></td><td scope="row"> <input type="hidden" name="txtpick_up_location" class="pick_up_location"  id="txtpick_up_location" value="' + data_val + '  "> <a href="#" class="remove_this" id="data-id' + data_val + '" > <p  >Remove<i class="fa fa-times fa-icion-s " aria-hidden="true"></i></p></a> </td></tr>  ');
        return false;
    });


    $("#decoration,.destination").click(function () {
        var decoration = $('#decoration').val();

        if (decoration == 1) {
            $('#iteam_show').css("display", "block")
        } else {
            $('#iteam_show').css("display", "none")
        }

    });
});

$(document).ready(function () {
    jQuery(document).on('click', '.remove_this', function () {
        $('.remove-col').parent().remove();
        return false;
    });
});