<?php namespace Panyar;
use Panyar\DbConnect;
use Panyar\Query;
use \PDO;


class Course Implements Query{

protected $conn;

    public function __construct() {

        $this->conn = DbConnect::connect();

    }

    public function fetchAll(){

        $stmt = $this->conn->prepare("SELECT * FROM course");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute();
        $row  = $stmt->fetchAll();
        return $row;
    }

    public function fetchJointALl(){

        $stmt = $this->conn->prepare("SELECT * FROM course, client 
            Where course.id = client.id");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute();
        $row  = $stmt->fetchAll();
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

    public function InsertAll( $data ){

        extract($data);

        $stmt = $this->conn->prepare("INSERT INTO course
            (courseName, description, startTime, endTime,
            startDate, endDate, fee, categoryId, note) VALUES
            (:courseName, :description, :startTime, :endTime,
            :startDate, :endDate, :fee, :categoryId, :note)");
            $stmt->execute( array(
            'courseName' => $courseName,
            'description' => $description,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'fee' => $fee,
            'categoryId' => $category,
            'note' => $note
        ) );
    }

    public function fetchByCategory( $category ) {

        $stmt = $this->conn->prepare("SELECT * FROM 
            course co, category ca, client
            Where co.categoryId = ca.categoryId
            AND co.id = client.id
            AND  ca.categoryName = :categoryName");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute( array ( ":categoryName" => $category ) );
        $row  = $stmt->fetchAll();
        return $row;

    }

    public function fetchByOwner( $owner ){

        $stmt = $this->conn->prepare("SELECT * FROM
            course where id = :id");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute( array ( ":id" => $owner ) );
        $row  = $stmt->fetchAll();
        return $row;


    }
}

