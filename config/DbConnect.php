<?php

require("config.inc.php");

class DbConnect{

    public function  __construct(){
    }

    public static function connect(){
       try {
            $conn = new pdo("mysql:dbname=". db_name. ";host=". host ,
        username, password);
            return $conn;

        }catch( exception $e){
            print  $e->getmessage();
        }
    }


}
