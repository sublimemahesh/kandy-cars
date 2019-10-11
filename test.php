<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/class/include.php');
include './main-fuction.php';
?>
<html>

    <head>
        <meta charset="utf-8">
        <title>International Telephone Input</title>
        
 
    </head>

    <body>
        <h1>International Telephone Input</h1>
        <form>
            <input class="datepicker" name="phone" type="text">
            <button type="submit">Submit</button>
        </form>
        <script src="js/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <script>

            jQuery(document).ready(function () {

                $('.datepicker').datetimepicker({
 
                    format: 'DD/MM/YYYY'
                });
 
                $('#timepicker').datetimepicker({
                    //  inline: true,
                    format: 'hh:mm A'
                });
            });

        </script>  
    </body>

</html>
