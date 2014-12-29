<?php namespace Panyar;
use Panyar\DbConnect;
use \PDO;


class Admin{
    protected $conn;

    public function __construct(){
        $this->conn = DbConnect::connect();
    }


    public function fetchReport() {

        $sql = "SELECT username, joinDate, paymentExpireDate, email, count( courseId ) as ownCourse
            FROM client, report, course
            WHERE client.id = report.id
            AND client.id = course.id
            GROUP BY course.id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute();
        $row = $stmt->fetchAll();

        return $row;

    }

}

