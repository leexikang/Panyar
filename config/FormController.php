<?php

class FormController {

    protected $username;
    protected $password;
    protected $passwordRe;
    protected $email;


    public function __construct($username, $password, $passwordRe = null , $email = null ) {


        $this->username = $username; 
        $this->password = $password; 
        $this->passwordRe = $passwordRe;
        $this->email = $email; 
    }

    public function passwordMatch() {

        if( $this->password == $this->passwordRe){
            return true;
        }else return false;

    }


    public function checkLogin ( User $user )
    {
        if( $user->queryExistUser( $this->username, $this->password ) ){
            return true;

        }else{
            return false;
        }
    }

}


