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

    public function fetchByClient( $name ){

        $stmt = $this->conn->prepare("SELECT * FROM course, client 
            Where course.id = client.id
            AND client.username = :name");
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute( array( ":name" => $name ) );
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

        $stmt = $this->conn->prepare("REPLACE INTO course
            (courseName, description, startTime, endTime,
            startDate, endDate, fee, categoryId, note, photo, id) VALUES
            (:courseName, :description, :startTime, :endTime,
            :startDate, :endDate, :fee, :categoryId, :note, :photo, :id)");
            $stmt->execute( array(
            ':courseName' => $courseName,
            ':description' => $description,
            ':startTime' => $startTime,
            ':endTime' => $endTime,
            ':startDate' => $startDate,
            ':endDate' => $endDate,
            ':fee' => $fee,
            ':categoryId' => $category,
            ':note' => $note,
            ':photo' => $photo,
            ':id' => $id
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

    public function edit( $data ){

        extract($data);

        $stmt = $this->conn->prepare("UPDATE course
            set courseName = :courseName,
            description = :description,
            startTime = :startTime,
            endTime = :endTime,
            startDate = :startDate,
            endDate = :endDate,
            fee = :fee,
            categoryId = :categoryId,
            note = :note,
            photo = :photo
            WHERE courseId = :courseId");
        $stmt->execute( array(
            'courseId' => $courseId,
            'courseName' => $courseName,
            'description' => $description,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'fee' => $fee,
            'categoryId' => $category,
            'note' => $note,
            'photo' => $photo
        ) );
    }


    public function deleteById( $id ) {

        $stmt = $this->conn->prepare("DELETE FROM course 
            WHERE courseId = :id");
        $stmt->execute( array ( ":id" => $id ) );

    }

    public function checkPhotoPath ( $path, $id){

        if( $path == 'image/' ){
            $course = SELF::fetchById( $id );
            return $course->photo;
        }else{
            return $path;
        }
    }
}

