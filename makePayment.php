<?php
require("vendor/autoload.php");
require("config/header.php");

use Panyar\Payment;

$msg = array();

if( isset ($_POST['purchase'] ) ){

    $paymentType = $_POST['paymentType'];
    $pincode = $_POST['pincode'];
    $id = 1; ////////////////////////////// !!!///////////

    if( empty( $_POST['paymentType'] ) OR empty( $_POST['pincode'] ) ) {
            $msg["allRequire"] = "Please fill all the fields";
        }

    if( isset ($_POST['purchase'] ) AND $msg == null ){

        $data = array(
            'paymentType' => $paymentType,
            'pincode' => $pincode,
            'id' => $id );

        $payment = new Payment();
        $payment->insertAll( $data );
        header('location: invoice.php');

    }
}
?>
<section class="content">
    <div class="contentWrapper">
    <div>
    <FORM class="login_form" method='POST' action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div> 
        <label for='paymentType'>  Select Payment type </label>
        <select name='paymentType' >
        <option> Visa </option>
        <option> Paypal </option>
        <option> Master card </option>
        </select>
    </div>

    <div>
        <label for='pincode'> Enter Pin Code:</label>
        <input type='text' name='pincode'  /><br/>
    </div>
<div>
        <input type="submit" value='Purchase' name='purchase' />
        <span class='messageError' ><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null ) ?></span>
    </div>
    </FORM>
</section>
</div>

<?php
        require("config/footer.php");
?>



