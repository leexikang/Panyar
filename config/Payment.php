<?php namespace Panyar;
use Panyar\DbConnect;
use \PDO;

/**
 *
 */
class Payment
{
    /**
     *
     */
    protected $conn;

    public function __construct()
    {
        $this->conn = DbConnect::connect();
    }

    public function insertAll( $data ){

        extract ( $data );

        $stmt = $this->conn->prepare(" INSERT INTO payment
            (paymentType, pincode, id) VALUES
            (:paymentType, :pincode, :id) " );
        $stmt->execute( array(
            ':paymentType' => $paymentType,
            ':pincode' => $pincode,
            ':id' => $id ) );

    }
}

