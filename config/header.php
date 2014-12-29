<!DOCTYPE HTML>
<html> 
	<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
 <body>

    <header>

    <ul>

<?php    if( checkSession() ){
    echo "<ll> <a href='home.php'> {$_SESSION['username']} </a> </li>";
}
    else{ ?>
    <li> <a href='login.php'> Login </a> </li>
<?php
    }
?> 
    </ul>
 

        <a href='/'> <span class='logo' >Panyar </span> </a>

	</header>


