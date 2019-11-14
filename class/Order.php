<?php

/**
 * Description of Order
 *
 * @author U s E r Â¨
 */
class Order {

    public $id;
    public $orderedAt;
    public $firstName;
    public $lastName;
    public $email;
    public $phoneNumber;
    public $address;
    public $city;
    public $country;
    public $postalCode;
    public $package;
    public $amount;
    public $price_summery;
    public $status;
    public $paymentStatusCode;
    public $deliveryStatus;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT *  FROM `orders` WHERE `id`='" . $id . "'";

            $db = new Database();

            $result = mysql_fetch_assoc($db->readQuery($query));

            $this->id = $result['id'];
            $this->orderedAt = $result['ordered_at'];
            $this->firstName = $result['first_name'];
            $this->lastName = $result['last_name'];
            $this->email = $result['email'];
            $this->phoneNumber = $result['phone_number'];
            $this->address = $result['address'];
            $this->city = $result['city'];
            $this->country = $result['country'];
            $this->postalCode = $result['postal_code'];
            $this->package = $result['package'];
            $this->amount = $result['amount'];
            $this->price_summery = $result['price_summery'];
            $this->status = $result['status'];
            $this->paymentStatusCode = $result['payment_status_code'];
            $this->deliveryStatus = $result['delivery_status'];

            return $result;
        }
    }

    public function create() {

        $query = "INSERT INTO `orders` ("
                . "`ordered_at`,"
                . "`first_name`,"
                . "`last_name`,"
                . "`email`,"
                . "`phone_number`,"
                . "`address`,"
                . "`city`,"
                . "`country`,"
                . "`postal_code`,"
                . "`package`,"
                . "`amount`,"
                . "`price_summery`,"
                . "`status`) VALUES  ("
                . "'" . $this->orderedAt . "', "
                . "'" . $this->firstName . "', "
                . "'" . $this->lastName . "', "
                . "'" . $this->email . "', "
                . "'" . $this->phoneNumber . "', "
                . "'" . $this->address . "', "
                . "'" . $this->city . "', "
                . "'" . $this->country . "', "
                . "'" . $this->postalCode . "', "
                . "'" . $this->package . "', "
                . "'" . $this->amount . "', "
                . "'" . $this->price_summery . "', "
                . "'" . $this->status . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $last_id;
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `orders`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getPaidOrders() {

        $query = "SELECT * FROM `orders` WHERE `status`='1' ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function updateResponse($id, $status) {

        $query = "UPDATE `orders` SET "
                . "`status` ='" . $status . "' "
                . " WHERE `id` = '" . $id . "'";
        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `orders` WHERE id="' . $this->id . '"';

        $db = new Database();
        return $db->readQuery($query);
    }

    public function getLastID() {

        $query = "SELECT `id` FROM `orders` ORDER BY `id` DESC LIMIT 1";
        $db = new Database();
        $result = mysql_fetch_assoc($db->readQuery($query));

        return $result['id'];
    }

    function updatePaymentStatusCodeAndStatus() {

        $query = "UPDATE  `orders` SET "
                . "`payment_status_code` ='" . $this->paymentStatusCode . "', "
                . "`status` ='" . $this->status . "' "
                . " WHERE `id` = '" . $this->id . "'  ";
        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function markAsDelivered() {

        $query = "UPDATE  `orders` SET "
                . "`delivery_status` ='1' "
                . " WHERE `id` = '" . $this->id . "'  ";
        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deleteOrder() {

        $query = 'DELETE FROM `orders` WHERE id="' . $this->id . '"';

        $db = new Database();
        return $db->readQuery($query);
    }

    public function getPaymentStatusCode($order) {

        $query = "SELECT `payment_status_code` FROM `orders` WHERE `id` = $order";

        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));

        return $result["payment_status_code"];
    }

    function sendOrderMail() {

        $PRODUCT = new Product($this->package);
        $PACKAGE = new Package($this->package);
        $PRODUCT_TYPE = new ProductType($PACKAGE->vehicle);
        $VEHICKE_TYPE = new VehicleType($PRODUCT_TYPE->type);

        $status = "";
        if ($this->paymentStatusCode == 2 && $this->status == 1) {
            $status = "Successfull.";
        } else {
            $status = "Unsuccessfull. Please resume your order.";
        }

        $comany_name = "kandycars";
        $website_name = "www.kandycars.lk";
        $comConNumber = "+94 77 365 7856";
        $comEmail = "booking@kandycars.lk";
        $site_link = "http://" . $_SERVER['HTTP_HOST'];


        $subject = 'KANDY CARS Sri Lanka : Booking Reference Number - ' . $this->id;
        $from = 'booking@kandycars.lk'; // give from email address
        $replay = 'booking@kandycars.lk';

        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $comEmail . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">

            <title>Promotional email template</title>
    </head>

    <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
            <tr>
                <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                        <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="40"></td>
                                        <td width="144">
                                            <a href= "' . $site_link . '" target="_blank"> '
                . '<img src=""' . $site_link . '/contact-form/img/logo.png" border="0" alt=""/>
                                        </a>
                                    </td>
                                    <td width="393">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="46" align="right" valign="middle">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="67%" align="right">
                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:18px; " >
                                                                    <a href= "' . $site_link . '" style="color:#68696a; text-decoration:none; text-transform: uppercase;">
                                                                        <h4>' . $website_name . '</h4>
                                                                    </a>
                                                                </font>
                                                            </td>
                                                            <td width="4%">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr>
                         
                    </tr>
                    <tr>
                        <td align="center" valign="middle">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="2%">&nbsp;</td>
                                    <td width="96%" align="center" style="border-bottom:1px solid #000000" height="50">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:18px;text-align:center; " >
                                            <h4> KANDY CARS Sri Lanka  </h4>
                                        </font>
                                    </td>
                                    <td width="2%">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="5%">&nbsp;</td>
                                    <td width="90%" valign="middle">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; ">
                                            <b style="color:#333333;">Client Number/Reference Number - ' . $this->id . '</b><br />
                                              <br />
                                               Hey there, Mr ' . $this->firstName . ',
                                              <br />
                                        </font>
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="5%">&nbsp;</td>
                                    <td width="90%" valign="middle">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px;text-align: justify " >
                                            Thank you for making a reservation with us, your vehicle will be reserved for you and hope you have gone through our Terms and Conditions.
                                            Your reservation details are as shown below, go through them again and, if you have made any mistakes, contact us by Mobile Phone ( direct calls/whatsapp/viber - (+94) 71 351 1350 ) Only , (because email contact might take time ) within 30 minutes of reservation to make modifications to your reservation. 
                                         
                                        </font>
                                        
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="5%">&nbsp;</td>
                                    <td width="90%" valign="middle">
                                     <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px;text-align: justify " >
                                              Booking can not be modified or cancelled thereafter, any payment made will not be refunded  in such cases.
                                        </font>
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="5%">&nbsp;<br /><br /></td>
                                    <td width="90%" valign="middle">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                            The details of your Order are shown below.
                                        </font>
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                            </table>
                            <table style="max-width:660px" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                    <tr>
                                        <td bgcolor="#FFFFFF">
                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="color:#6d6e70;font-family:Arial,Helvetica,sans-serif;font-size:18px;font-style:normal;font-weight:bold;line-height:28px;padding:30px 40px 0px 40px" align="left">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="padding:25px 25px 0px 25px" bgcolor="#eeeeee">
                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="font-family:Open Sans,Helvetica,Arial,sans-serif;color:#333333;font-weight:600;text-align:center;font-size:22px;line-height:24px;padding-bottom:15px;padding-top:0;margin:0;border-bottom:1px solid #dddddd" align="center"><span><u>Booking Details.</u></span></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>

                                                                                            ' . $this->price_summery . '
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#6d6e70;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-style:normal;font-weight:500;line-height:28px;padding:15px 40px 0px 40px; text-align: justify" align="left">
                                                            (in case if you will cancel the reservation fully, a cancellation fee of 25% of total charge will be charged at this moment, and no charge will be applied for modifications on shifting the dates, but this will affect on the availability of the vehicle you have chosen, but in case if the duration is changed, either dates are deduced or added, we will charge accordingly, 20% of daily rental for deduced dates and , 100% of daily rental for added dates, in such cases your daily rental will be calculated by dividing the Rental for the period by the number of the dates of the package)
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="2%">&nbsp;</td>
                                    <td width="96%" style="border-top:1px solid #000000" >

                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                            <h4>&nbsp;&nbsp;&nbsp;Your Details</h4>
                                        </font>
                                        <ul>
                                           <li>
                                            
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Vehicle  : ' .             $PRODUCT_TYPE->name        . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    First Name : ' . $this->firstName . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Last Name : ' . $this->lastName . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Email : ' . $this->email . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Contact No : ' . $this->phoneNumber . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Address : ' . $this->address . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    City : ' . $this->city . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Country : ' . $this->country . '
                                                </font>
                                            </li>


                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Total Amount: ' . $this->amount . ' LKR
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Ordered At : ' . $this->orderedAt . '
                                                </font>
                                            </li>
                                         
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Payment Status : ' . $status . '
                                                </font>
                                            </li>

                                        </ul>
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:red; font-size:14px; " >
                                            PLEASE DO NOT DELETE THIS E-MAIL , keep it as a proof and submit on counter when picking up the vehicle, submitting the email as a proof is a must. As it only has the reference number.

                                        </font>
                                        <br>
                                            <br>
                                                <br>

                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Thank You<br>
                                                            Best Regards<br>
                                                                KANDY CARS<br>
                                                                    <a href="https://www.KandyCars.lk" target="_blank">Kandy Cars Online Private Limited</a><br>
                                                                        <a href="https://www.Import.KandyCars.lk" target="_blank">Import Kandy Cars Online Private Limited</a><br>

                                                                            <p>
                                                                                Mobile - +94713511350
                                                                            </p>
                                                                            <p>
                                                                                Email - keer20180511@gmail.com
                                                                            </p>
                                                                            <p>
                                                                                Email - keerthi@kandycars.lk
                                                                            </p>
                                                                            <p>
                                                                                This is a System, thus do not reply this, any replies will go unanswered.
                                                                                Use above contact details to contact instead.
                                                                            </p> 
                                                                            <p><a href="https://www.KandyCars.lk/term-and-condition-package.php?id=' . $VEHICKE_TYPE->id . '" target="_blank" >Term and Conditions</a></p>
                                                                            </font>

                                                                            </td>
                                                                            <td width="2%">&nbsp;</td>
                                                                            </tr>
                                                                            </table>



                                                                            </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><img src="' . $site_link . '/PROMO-GREEN2_02/img/PROMO-GREEN2_07.jpg" width="598" height="7" style="display:block" border="0" alt=""/></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td width="2%" align="center">&nbsp;</td>
                                                                                            <td width="29%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>Phone No : <br/> ' . $comConNumber . ' </strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="2%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>|</strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="30%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>Website : <br/> ' . $website_name . '  </strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="2%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>|</strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="25%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>E-mail :  <br/> ' . $comEmail . '</strong>
                                                                                                </font>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                                                                        <tr>
                                                                                            <td>&nbsp;</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td width="3%" align="center">&nbsp;</td>
                                                                                            <td width="28%" align="center"><font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " > Â© ' . date('Y') . ' Copyright ' . $comany_name . '</font> </td>
                                                                                            <td width="10%" align="center"></td>
                                                                                            <td width="3%" align="center"></td>
                                                                                            <td width="30%" align="right">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " >
                                                                                                    <a href="http://sublime.lk/">
                                                                                                        web solution by: Synotec Holdings (Pvt) Ltd.</a>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="5%">&nbsp;</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                             </table></td>
                                         </tr>
                                    </table>
                                 </body>
                           </html>';

        $arr = array();

        if (mail($this->email, $subject, $html, $headers)) {

            $arr['status'] = "Your message has been sent successfully";
        } else {
            $arr['status'] = "Could not be sent your message";
        }

        return $arr;
    }

    function sendOrderMailToAdmin() {

        $PRODUCT = new Product($this->package);
        $PACKAGE = new Package($this->package);
        $PRODUCT_TYPE = new ProductType($PACKAGE->vehicle);
        $VEHICKE_TYPE = new VehicleType($PRODUCT_TYPE->type);
        $status = "";
        if ($this->paymentStatusCode == 2 && $this->status == 1) {
            $status = "Successfull.";
        } else {
            $status = "Unsuccessfull.";
        }

        $comany_name = "kandycars";
        $website_name = "www.kandycars.lk";
        $comConNumber = "+94 77 365 7856";
        $comEmail = "booking@kandycars.lk";
        $site_link = "http://" . $_SERVER['HTTP_HOST'];


        $subject = 'Website Order Enquiry  - #' . $this->id;
        $from = 'booking@kandycars.lk';

        date_default_timezone_set('Asia/Colombo');
        $todayis = date("l, F j, Y, g:i a");

        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $this->email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $status = "";
        if ($this->paymentStatusCode == 2 && $this->status == 1) {
            $status = "Successfull.";
        } else {
            $status = "Unsuccessfull. Please resume your order.";
        }

        $comany_name = "kandycars";
        $website_name = "www.kandycars.lk";
        $comConNumber = "+94 77 365 7856";
        $comEmail = "keer20180511@gmail.com";
        $comEmail_1 = "keerthi@kandycars.lk";
        $comEmail_2 = "booking@kandycars.lk";

        $site_link = "http://" . $_SERVER['HTTP_HOST'];


        $subject = 'KANDY CARS Sri Lanka : Booking Reference Number - ' . $this->id;
        $from = 'booking@kandycars.lk'; // give from email address
        $replay = 'booking@kandycars.lk';

        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $comEmail . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">

            <title>Promotional email template</title>
    </head>

    <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
            <tr>
                <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                        <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="40"></td>
                                        <td width="144">
                                            <a href= "' . $site_link . '" target="_blank"> '
                . '<img src=""' . $site_link . '/contact-form/img/logo.png" border="0" alt=""/>
                                        </a>
                                    </td>
                                    <td width="393">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="46" align="right" valign="middle">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="67%" align="right">
                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:18px; " >
                                                                    <a href= "' . $site_link . '" style="color:#68696a; text-decoration:none; text-transform: uppercase;">
                                                                        <h4>' . $website_name . '</h4>
                                                                    </a>
                                                                </font>
                                                            </td>
                                                            <td width="4%">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr>
                         
                    </tr>
                    <tr>
                        <td align="center" valign="middle">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="2%">&nbsp;</td>
                                    <td width="96%" align="center" style="border-bottom:1px solid #000000" height="50">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:18px;text-align:center; " >
                                            <h4> KANDY CARS Sri Lanka  </h4>
                                        </font>
                                    </td>
                                    <td width="2%">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="5%">&nbsp;</td>
                                    <td width="90%" valign="middle">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; ">
                                            <b style="color:#333333;">Client Number/Reference Number - ' . $this->id . '</b><br />
                                              <br />
                                               Hey there, Mr ' . $this->firstName . ',
                                              <br />
                                        </font>
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="5%">&nbsp;</td>
                                    <td width="90%" valign="middle">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px;text-align: justify " >
                                            Thank you for making a reservation with us, your vehicle will be reserved for you and hope you have gone through our Terms and Conditions.
                                            Your reservation details are as shown below, go through them again and, if you have made any mistakes, contact us by Mobile Phone ( direct calls/whatsapp/viber - (+94) 71 351 1350 ) Only , (because email contact might take time ) within 30 minutes of reservation to make modifications to your reservation. 
                                         
                                        </font>
                                        
                                        
                                         <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px;text-align: justify " >
                                              Booking can not be modified or cancelled thereafter, any payment made will not be refunded  in such cases.
                                        </font>
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                                
                                 <tr>
                                    <td width="5%">&nbsp;</td>
                                    <td width="90%" valign="middle">
                                     <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px;text-align: justify " >
                                              Booking can not be modified or cancelled thereafter, any payment made will not be refunded  in such cases.
                                        </font>
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                                
                                <tr>
                                    <td width="5%">&nbsp;<br /><br /></td>
                                    <td width="90%" valign="middle">
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                            The details of your Order are shown below.
                                        </font>
                                    </td>
                                    <td width="5%">&nbsp;</td>
                                </tr>
                            </table>
                            <table style="max-width:660px" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                    <tr>
                                        <td bgcolor="#FFFFFF">
                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="color:#6d6e70;font-family:Arial,Helvetica,sans-serif;font-size:18px;font-style:normal;font-weight:bold;line-height:28px;padding:30px 40px 0px 40px" align="left">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="padding:25px 25px 0px 25px" bgcolor="#eeeeee">
                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="font-family:Open Sans,Helvetica,Arial,sans-serif;color:#333333;font-weight:600;text-align:center;font-size:22px;line-height:24px;padding-bottom:15px;padding-top:0;margin:0;border-bottom:1px solid #dddddd" align="center"><span><u>Booking Details.</u></span></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> 
                                            
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Vehicle  : ' .
                                                                 $PRODUCT_TYPE->name   . '
                                                </font>
                                             
                                                                                        </td>
                                                                                        <td>

                                                                                            ' . $this->price_summery . '
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#6d6e70;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-style:normal;font-weight:500;line-height:28px;padding:15px 40px 0px 40px; text-align: justify" align="left">
                                                            (in case if you will cancel the reservation fully, a cancellation fee of 25% of total charge will be charged at this moment, and no charge will be applied for modifications on shifting the dates, but this will affect on the availability of the vehicle you have chosen, but in case if the duration is changed, either dates are deduced or added, we will charge accordingly, 20% of daily rental for deduced dates and , 100% of daily rental for added dates, in such cases your daily rental will be calculated by dividing the Rental for the period by the number of the dates of the package)
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="2%">&nbsp;</td>
                                    <td width="96%" style="border-top:1px solid #000000" >

                                        <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                            <h4>&nbsp;&nbsp;&nbsp;Your Details</h4>
                                        </font>
                                        <ul>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    First Name : ' . $this->firstName . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Last Name : ' . $this->lastName . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Email : ' . $this->email . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Contact No : ' . $this->phoneNumber . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Address : ' . $this->address . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    City : ' . $this->city . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Country : ' . $this->country . '
                                                </font>
                                            </li>


                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Total Amount: ' . $this->amount . ' LKR
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Ordered At : ' . $this->orderedAt . '
                                                </font>
                                            </li>
                                            <li>
                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                    Payment Status : ' . $status . '
                                                </font>
                                            </li>

                                        </ul>
                                        <font style="font-family: Verdana, Geneva, sans-serif; color:red; font-size:14px; " >
                                            PLEASE DO NOT DELETE THIS E-MAIL , keep it as a proof and submit on counter when picking up the vehicle, submitting the email as a proof is a must. As it only has the reference number.

                                        </font>
                                        <br>
                                            <br>
                                                <br>

                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Thank You<br>
                                                            Best Regards<br>
                                                                KANDY CARS<br>
                                                                    <a href="https://www.KandyCars.lk" target="_blank">Kandy Cars Online Private Limited</a><br>
                                                                        <a href="https://www.Import.KandyCars.lk" target="_blank">Import Kandy Cars Online Private Limited</a><br>

                                                                            <p>
                                                                                Mobile - +94713511350
                                                                            </p>
                                                                            <p>
                                                                                Email - keer20180511@gmail.com
                                                                            </p>
                                                                            <p>
                                                                                Email - keerthi@kandycars.lk
                                                                            </p>
                                                                            <p>
                                                                                This is a System, thus do not reply this, any replies will go unanswered.
                                                                                Use above contact details to contact instead.
                                                                            </p> 
                                                                            <p><a href="https://www.KandyCars.lk/term-and-condition-package.php?id=' . $VEHICKE_TYPE->id . '" target="_blank" >Term and Conditions</a></p>
                                                                            </font>

                                                                            </td>
                                                                            <td width="2%">&nbsp;</td>
                                                                            </tr>
                                                                            </table>



                                                                            </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><img src="' . $site_link . '/PROMO-GREEN2_02/img/PROMO-GREEN2_07.jpg" width="598" height="7" style="display:block" border="0" alt=""/></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td width="2%" align="center">&nbsp;</td>
                                                                                            <td width="29%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>Phone No : <br/> ' . $comConNumber . ' </strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="2%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>|</strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="30%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>Website : <br/> ' . $website_name . '  </strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="2%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>|</strong>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="25%" align="center">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                                                                    <strong>E-mail :  <br/> ' . $comEmail . '</strong>
                                                                                                </font>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                                                                        <tr>
                                                                                            <td>&nbsp;</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td width="3%" align="center">&nbsp;</td>
                                                                                            <td width="28%" align="center"><font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " > Â© ' . date('Y') . ' Copyright ' . $comany_name . '</font> </td>
                                                                                            <td width="10%" align="center"></td>
                                                                                            <td width="3%" align="center"></td>
                                                                                            <td width="30%" align="right">
                                                                                                <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " >
                                                                                                    <a href="http://sublime.lk/">
                                                                                                        web solution by: Synotec Holdings (Pvt) Ltd.</a>
                                                                                                </font>
                                                                                            </td>
                                                                                            <td width="5%">&nbsp;</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                             </table></td>
                                         </tr>
                                    </table>
                                 </body>
                           </html>';

        $arr = array();

        if (mail($comEmail, $subject, $html, $headers) && mail($comEmail_1, $subject, $html, $headers) && mail($comEmail_2, $subject, $html, $headers)) {
            $arr['status'] = "Your message has been sent successfully";
        } else {
            $arr['status'] = "Could not be sent your message";
        }

        return $arr;
    }

    public function getOrdersByDeliveryStatus($status) {

        $query = "SELECT * FROM `orders` WHERE `delivery_status`='" . $status . "' AND `status`='1' AND `payment_status_code`='2'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getUnpaidOrders() {

        $query = "SELECT * FROM `orders` WHERE `status`='0' AND `payment_status_code` <> '2'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
