<?php
require("config/config.inc.php");

class User{

    protected $conn; 

    public function __construct($conn){ 

        $this->conn = $conn; 
    
    }  

   public function SearchByName($name){

       $stmt = $this->conn->prepare("SELECT id  FROM user where
           userName = :name");

       $stmt->execute(array(':name' => $name));

       if($stmt->rowCount() > 0 ) return true;
       else return false;
   }

    public function insertAllRoll($username, $password, $email){
        $sql = "INSERT INTO user (username, password,
            email) VALUES (:username, :password, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute( array(":username" => $username, ":password" => $password,
            ":email" => $email) );
    }

}




