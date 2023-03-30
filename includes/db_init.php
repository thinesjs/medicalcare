<?php

class DB
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:
                host=localhost;
                dbname=medicalcare', 
                'root',
                ''
            );
        } catch( PDOException $error ) {
            die("error: database connection");
        }
    }

    public static function connect()
    {
        return new self(); 
    }

    //select helper
    public function select( $sql, $data = [], $is_list = false )
    {
        $statement = $this->db->prepare( $sql );
        $statement->execute($data);

        if ( $is_list ) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
    }

    // insert helper
    public function insert( $sql, $data = [] )
    {
        $statement = $this->db->prepare( $sql );
        $statement->execute( $data );
        return $this->db->lastInsertId();
    }

    // update helper
    public function update( $sql, $data = [] )
    {
        $statement = $this->db->prepare( $sql );
        $statement->execute( $data );
        return $statement->rowCount();
    }

    // delete helper
    public function delete( $sql, $data = [] )
    {
        $statement = $this->db->prepare( $sql );
        $statement->execute( $data );
        return $statement->rowCount();
    }
}