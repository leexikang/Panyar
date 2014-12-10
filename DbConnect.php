<?php
require("config.inc.php");

class dbconnect{

    public function  __construct(){
    }

    public static function connect(){
/*        $db=[
            "host" => "localhost",
            "db_name" => "panyar",
            "username" => "root",
            "password" => "root"
        ]; */
        try {
            $conn = new pdo("mysql:dbname={ dbname };host={ host }",
        username, password);
            return $conn;

        }catch( exception $e){
            print  $e->getmessage();
        }
    }


}
