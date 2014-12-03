<!DOCTYPE HTML>
<html> 
	<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
 <body>
 	<div>
	<FORM class="login_form" method="GET" action="FormController.php">
		<div> 
		<label for="username"> Username </label>
		<input type="text" name="username" id="username" /> 
		<span></span>
	</div>
	<div>
		<label for="password"> Password:</label>
		<input type="password" name="password" id="password" /><br/>
	</div>
	<div>
		<label for="passwordRe"> Confirm Password:</label>
		<input type="passwordRe" name="passwordRe" id="passwordRe" /><br/>
	</div>
	<div>
		<label for="email"> Email </label>
		<input type="email" name="email" id="email" /><br/>
	</div>
	<div>
		<input type="submit" value="Signup" />
	</div>
	</FORM>

 </body> 
 </html>
