<?php
require("config/DbConnect.php");
require("config/Query.php");

class Course Implements Query{

protected $conn;

    public function __construct() {

        $this->conn = DbConnect::connect();

    }

    public function fetchAll(){

        $stmt = $this->conn->prepare("SELECT * FROM course");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute();
        $row  = $stmt->fetch();
        return $row;
    }


    public function fetchById($id){

        $stmt = $this->conn->prepare("SELECT * FROM course where
            courseId = :id");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute(array(':id' => $id));
        $row  = $stmt->fetch();
        return $row;
    }

    public function fetchByName( $name ) {

        $stmt = $this->conn->prepare("SELECT * FROM course where
            courseName = :name");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute(array(':name' => $name ));
        $row  = $stmt->fetch();
        return $row;

    }
}

