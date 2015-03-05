<?php
require('vendor/autoload.php');
require('config/helperFunction.php');
session_start();
require("config/header.php");
if( checkSession() ){

    header('location: index.php');
}



use Panyar\Validation;
use Panyar\User;

$msg = array();
    if( isset($_POST['signup']) ){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordRe = $_POST['passwordRe'];
            $email = $_POST['email'];

            if( empty($_POST['username'] ) OR empty( $_POST ['password'] )
                OR empty( $_POST ['email'] )  ){
                $msg["allRequire"] = "Please fill all the fields";
                }


            if( !Validation::passwordMatch($password, $passwordRe )  ){
                $msg["passwordMatch"] = "password are not match";
            }

            if( Validation::checkExistance( new User(), $username)  ){
                $msg["userExist"] = "User already exist";
            }

            if( $msg == null AND isset( $_POST ['signup'] ) ){
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email
                );

                $user = new User();
               if( $userId = $user->insertAll($data) ){

                   setSessionCookie( 'id', $userId);
                   setSessionCookie( 'username', $username );
                   header('Location: makePayment.php');
            }

           }
    }


?>
<section class="content">
    <div class="contentWrapper">
 	<div>
    <FORM class="login_form" method='POST' action="<?php echo $_SERVER['PHP_SELF'] ?> ">
		<div>
		<label for="username"> Username </label>
		<input type="text" name="username" id="username" />
        <span class='messageError'><?php  echo (isset($msg['userExist']) ? $msg['userExist'] : null )  ?></span>
	</div>
	<div>
		<label for="password"> Password:</label>
		<input type="password" name="password" id="password" /><br/>
	</div>
	<div>
		<label for="passwordRe"> Confirm Password:</label>
		<input type="password" name="passwordRe" id="passwordRe" /><br/>
        <span class='messageError'><?php echo (isset($msg['passwordMatch']) ? $msg['passwordMatch'] : null ) ?></span>
	</div>
	<div>
		<label for="email"> Email </label>
		<input type="email" name="email" id="email" /><br/>
	</div>
	<div>
		<input type="submit" value="Signup" name="signup" />
        <span class='messageError'><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null ) ?></span>
	</div>
    </FORM>
</section>
</div>

<?php
require("config/footer.php");
?>

