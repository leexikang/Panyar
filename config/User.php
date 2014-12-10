<?php
require("config/DbConnect.php");
require("config/Query.php");


class User implements Query{

    protected $conn;
    public function __construct(){
        $this->conn = DbConnect::connect();
    }

    public function fetchALl(){

        $stmt = $this->conn->prepare("SELECT * FROM client");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute();
        $row  = $stmt->fetch();
        return $rows;

    }


    public function fetchByName($name){

        $stmt = $this->conn->prepare("SELECT * FROM client where
            userName = :name");

        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute(array(':name' => $name));
        $row  = $stmt->fetch();
        return $row;

    }

    public function fetchById( $id ){

        $stmt = $this->conn->prepare("SELECT * FROM client where
            id = :id");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute(array(':id' => $id ));
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

