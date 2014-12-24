<?php
require('vendor/autoload.php');
use Panyar\User;

if ( isset( $_GET['id'] ) ) {

$user = new User();
$user->deleteById( $_GET['id'] );

}
header('location: clientInfo.php');

