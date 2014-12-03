<?php
require("header.php");
require("config/config.inc.php");    
require("User.php");
require("FormController.php");

$msg = array(); 
$error = false;
    if( isset($_GET['signup']) ){

            $username = $_GET['username'];
            $password = $_GET['password'];
            $passwordRe = $_GET['passwordRe'];
            $email = $_GET['email'];

            if( empty($_GET['username']) && empty($_GET['password']) ){
                $error = true;
                $msg["allRequire"] = "Please fill all the fields";
            }
            
            $form = new FormController($username, $password, $passwordRe, $email);
            $user = new User($conn);

            if(!$form->passwordMatch()  ){
                $error = true;
                $msg["passwordMatch"] = "password are not match";
            }
                
            if( $form->userExist( new User($conn))  ){
                $error = true;
                $msg["userExist"] = "User already exist";
            } 

            if($error == false){
                $user = new User($conn);
                $user->insertAllRoll($username, $password, $email);
                var_dump($user);

           }
    }

    
?>
<section class="content">
 	<div>
    <FORM class="login_form" method="GET" action="signup.php">
		<div> 
		<label for="username"> Username </label>
		<input type="text" name="username" id="username" /> 
        <span><?php echo $msg['userExist'] ?></span>
	</div>
	<div>
		<label for="password"> Password:</label>
		<input type="password" name="password" id="password" /><br/>
	</div>
	<div>
		<label for="passwordRe"> Confirm Password:</label>
		<input type="passwordRe" name="passwordRe" id="passwordRe" /><br/>
        <span><?php echo $msg['passwordMatch'] ?></span>
	</div>
	<div>
		<label for="email"> Email </label>
		<input type="email" name="email" id="email" /><br/>
	</div>
	<div>
		<input type="submit" value="Signup" name="signup" />
        <span><?php echo $msg['allRequire'] ?></span>
	</div>
    </FORM>
</section>

