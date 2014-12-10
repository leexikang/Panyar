<?php
require("config/header.php");
?>
    <section class="main" >
<?php require("config/clientNav.php"); ?>
   <section class="content" >
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


    <div>

 	</section>
<br/>


<?php

require("config/footer.php");

?>
