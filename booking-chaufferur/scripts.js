
//--------------------------------------------------check one by one on blur--------------------------------------------------
jQuery(document).ready(function () {

    jQuery("#txtFullName").blur(function () {
        validateEmpty("txtFullName", "spanFullName");
    });
    
    jQuery("#txtPickUpDate").blur(function () {
        validateEmpty("txtPickUpDate", "spanPickUpDate");
    });

    jQuery("#txtEmail").blur(function () {
        ValidateEmail("txtEmail", "spanEmail");
    });

    jQuery("#txtDropOfDateTime").blur(function () {
        validateEmpty("txtDropOfDateTime", "spanDropDateTime");
    });

    jQuery("#txtNumAdult").blur(function () {
        validateEmpty("txtNumAdult", "spanNumAdult");
    });
    
    jQuery("#txtAccommodation").blur(function () {
        validateEmpty("txtAccommodation", "spanAccommodation");
    });

    jQuery("#captchacode").blur(function () {
        validateEmpty("captchacode", "capspan");
    });

    jQuery("#btnSubmit").bind('click', function () {

        if (!validate()) {
            return;
        }

        jQuery("#checking").show();
        sendForm();
    });

    jQuery('.input-validater').keypress(function (e) {
        if (e.keyCode == 13) {

            if (!validate()) {
                return;
            }

            jQuery("#checking").show();
            sendForm();
        }
    });

});


//--------------------------------------------------function to check button click --------------------------------------------------

function validate() {
    if (
            validateEmpty("txtPickUpDate", "spanPickUpDate") &
            validateEmpty("txtPickUpDate", "spanPickUpDate") &
            validateEmpty("txtFullName", "spanFullName") &
            validateEmpty("txtDropOfDateTime", "spanDropDateTime") &
            validateEmpty("txtNumAdult", "spanNumAdult") &
            validateEmpty("txtNumChild", "spanNumChild") &
            validateEmpty("txtAccommodation", "spanAccommodation") &
            ValidateEmail("txtEmail", "spanEmail") &
            validateEmpty("captchacode", "capspan")
            )
    {
        return true;
    } else {
        return false;
    }
}



//--------------------------------------------------Ajax call --------------------------------------------------


function sendForm() {

    var destination = [];
    $(".destination").each(function () {
        destination.push($(this).val());
    });

    jQuery.ajax({
        url: "booking-form/send-email.php",
        cache: false,
        dataType: "json",
        type: "POST",
        data: {
            captchacode: jQuery('#captchacode').val(),
            visitor_pickup_date_time: jQuery('#txtPickUpDate').val(),
            visitor_accomadation: jQuery('#txtAccommodation').val(),
            visitor_decoration: jQuery('#txtDecoration').val(),
            visitor_destination: destination,
            visitor_name: jQuery('#txtFullName').val(),
            visitor_email: jQuery('#txtEmail').val(),
            visitor_number_adults: jQuery('#txtNumAdult').val(),
            visitor_number_child: jQuery('#txtNumChild').val()


        },
        success: function (html) {
            var status = html.status;
            var msg = html.msg;

            if (status == "incorrect") {

                jQuery("#capspan").addClass("notvalidated");
                jQuery("#capspan").html(msg);
                jQuery("#capspan").show();
                jQuery("#checking").fadeOut(2000);

            } else if (status == "correct") {
                jQuery("#checking").hide();
                jQuery("#dismessage").html(msg).delay(1000).show(1000);

                jQuery('#captchacode').val("");
                jQuery('#txtPickUpDate').val("");
                jQuery('#txtEmail').val("");
                jQuery('#txtPickUpTime').val("");
                jQuery('#txtDropOfDateTime').val("");
            }


        }
    });
}

//-----------------   function to check empty -------------------------------------------------------

function validateEmpty(field, validatorspan)
{
    if (jQuery('#' + field).val().length != 0)
    {
        jQuery('#' + validatorspan).addClass("validated");
        jQuery('#' + validatorspan).removeClass("notvalidated");
        jQuery('#' + validatorspan).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatorspan).text("");

        return true;
    } else
    {
        jQuery('#' + validatorspan).addClass("notvalidated");
        jQuery('#' + validatorspan).removeClass("validated");
        jQuery('#' + validatorspan).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatorspan).text("This field can not be empty");

        return false;
    }
}

//--------------------------------------------------function to check email--------------------------------------------------

function ValidateEmail(field, validatordiv)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (jQuery('#' + field).val().match(mailformat))
    {
        jQuery('#' + validatordiv).addClass("validated");
        jQuery('#' + validatordiv).removeClass("notvalidated");
        jQuery('#' + validatordiv).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatordiv).text("");
        return true;
    } else
    {
        jQuery('#' + validatordiv).addClass("notvalidated");
        jQuery('#' + validatordiv).removeClass("validated");
        jQuery('#' + validatordiv).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatordiv).text("You have entered an invalid Email Address");

        return false;
    }
}
