<?php namespace Panyar;
use Panyar\DbConnect;
use Panyar\Query;
use \PDO;


class Admin implements Query{
    protected $conn;

    public function __construct(){
        $this->conn = DbConnect::connect();
    }

    public function fetchAll()
    {

    }
    public function fetchBYName( $name ){

        $stmt = $this->conn->prepare("SELECT * FROM admin where
            adminName = :name");

        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute(array(':name' => $name));
        $row  = $stmt->fetch();
        return $row;


    }

    public function fetchById( $id ){

    }

    public function fetchReport( $action = NULL) {

        $sql = "SELECT username, joinDate, paymentExpireDate, email, count( courseId ) as ownCourse
            FROM client, report, course
            WHERE client.id = report.id
            AND client.id = course.id
            GROUP BY course.id ";
        switch ($action) {
            case 'course':
             $add = ' Order By ownCourse DESC';
             $sql = $sql. $add;
             break;
            case 'date':
             $add = 'ORDER BY joinDate ASC';
             $sql = $sql . $add;
             break;
            case 'expire':
             $add = 'ORDER BY paymentExpireDate ASC';
             $sql = $sql . $add;
            default:
                break;
        }
              $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;

    }

    public function queryExistUser( $username, $password ){

        $sql = "SELECT * FROM admin WHERE adminName= :username
            ANd password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode( PDO::FETCH_OBJ );
        $stmt->execute( array( ":username" => $username, ":password" => $password) );
        $row = $stmt->fetchAll();

        return $row;

    }


}

