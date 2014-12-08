<?php

// use define to name db config and see can we reference from conifguration file:w
//

$db=[ 
    "host" => "localhost",
    "db_name" => "panyar",
    "username" => "root",
    "password" => "root"
];

try {
    $conn = new PDO("mysql:dbname={$db['db_name']};host={$db['host']}",
        $db['username'], $db['password']);

}catch( Exception $e){
    print  $e->getMessage();
}



