<?php namespace Panyar;
use Panyar\DbConnect;
use \PDO;

class Category {


    protected $conn;

    public function __construct(){

        $this->conn = DbConnect::connect();
}

    public function fetchAll(){

        $stmt = $this->conn->prepare("SELECT * FROM category");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute();
        $row  = $stmt->fetchAll();
        return $row;
    }

}

