<?php

require('vendor/autoload.php');
require('config/helperFunction.php');
session_start();

require("config/header.php");

if( !checkSession() ){

    header("Location: index.php");

}
