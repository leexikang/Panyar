<?php

class Validation{

    public function __construct() {
    }

    public static function timeValidation($time) {

        $regEx = '/(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9])/';

        if( filter_var($time, FILTER_VALIDATE_REGEXP,
            array("options"=>array("regexp"=>$regEx))) ){

                return true;
            }else{ return false;}
    }


    public static function dateValidation($date) {
        $regEx = "/(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}/";

     if( filter_var($date, FILTER_VALIDATE_REGEXP,
         array("options"=>array("regexp"=>$regEx))) ){

             $Ddate = explode("-", $date);
             return checkdate($Ddate[1], $Ddate[0], $Ddate[2] );
            }else{
            return false;
            }
    }

    public static  function validateInt($integer){

        if( filter_var($integer, FILTER_VALIDATE_INT) ){

            return true;

            }else{
                return false;

            }

    }

    public static function passwordMatch($password, $passwordRe) {

        if( $password == $passwordRe){
            return true;
        }else return false;

    }

    public static function checkExistance( Query $obj, $name ){

        if( $obj->fetchByName( $name ) )
        {
            return true;

        }else{

            return false;

        }

    }

    public static function checkLogin ( User $user, $username, $password )
    {
        if( $user->queryExistUser( $username, $password ) ){
            return true;

        }else{
            return false;
        }
    }

    // check if variable is set if set return variable
    //
    public static function varIsset( $variable =null ){

        if ( isset( $variable ) ){

            return $variable;

        }else{

            return null;
        }
    }

}

