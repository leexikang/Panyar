<?php
require("config/config.inc.php");
require("vendor/autoload.php");
require("config/header.php");

$msg = array();
    if( isset($_GET['signup']) ){

            $username = $_GET['username'];
            $password = $_GET['password'];
            $passwordRe = $_GET['passwordRe'];
            $email = $_GET['email'];

            if( empty($_GET['username'] ) OR empty( $_GET['password'] )
                OR empty( $_GET['email'] )  ){
                $msg["allRequire"] = "Please fill all the fields";
                }

            $form = new FormController($username, $password, $passwordRe, $email);

            if(!$form->passwordMatch()  ){
                $msg["passwordMatch"] = "password are not match";
            }

            if( $form->userExist( new User())  ){
                $msg["userExist"] = "User already exist";
            }

            if( $msg == null AND isset( $_GET['signup'] ) ){
                $user = new User();
                $user->insertAllRoll($username, $password, $email);
           }
    }


?>
<section class="content">
    <div class="contentWrapper">
 	<div>
    <FORM class="login_form" method="GET" action="signup.php">
		<div> 
		<label for="username"> Username </label>
		<input type="text" name="username" id="username" /> 
        <span><?php echo (isset($msg['userExist']) ? $msg['userExist'] : null )  ?></span>
	</div>
	<div>
		<label for="password"> Password:</label>
		<input type="password" name="password" id="password" /><br/>
	</div>
	<div>
		<label for="passwordRe"> Confirm Password:</label>
		<input type="passwordRe" name="passwordRe" id="passwordRe" /><br/>
        <span><?php echo (isset($msg['passwordMatch']) ? $msg['passwordMatch'] : null ) ?></span>
	</div>
	<div>
		<label for="email"> Email </label>
		<input type="email" name="email" id="email" /><br/>
	</div>
	<div>
		<input type="submit" value="Signup" name="signup" />
        <span><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null ) ?></span>
	</div>
    </FORM>
</section>
</div>

<?php
require("config/footer.php");
?>

