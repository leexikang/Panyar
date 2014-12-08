<?php
require("config/config.inc.php");

class User{

    protected $conn;

    public function __construct($conn){

        $this->conn = $conn;

    }

   public function SearchByName($name){

       $stmt = $this->conn->prepare("SELECT * FROM client where
           userName = :name");

       $stmt->setFetchMode( PDO::FETCH_OBJ );
       $stmt->execute(array(':name' => $name));
       $row  = $stmt->fetch();
       return $row;

       }

    public function insertAllRoll($username, $password, $email){
        $sql = "INSERT INTO client (username, password,
            email) VALUES (:username, :password, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute( array(":username" => $username, ":password" => $password,
            ":email" => $email) );
    }

    public function queryExistUser($username, $password) {

        $sql = "SELECT * FROM client WHERE username = :username
            ANd password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute( array( ":username" => $username, ":password" => $password) );
        $row = $stmt->fetchAll();

        return $row;

    }
}


