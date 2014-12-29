<?php


function createAnswer( $name, $value ){

        echo " <tr> <td> <label> $name   </label> </td>
        <td>  $value  </td> </tr> ";
}

function checkIsset( $varName ){

    if ( isset( $varName ) ){

        return $varName;

    }else{

        return null;
    }
}

function checkSession(){

    return isset( $_SESSION['username'] );

}

function setSessionCookie( $name, $value){

    $_SESSION[$name] = $value;
    setcookie($name, $value, time()+( 60*60*24*30 ) );

}

