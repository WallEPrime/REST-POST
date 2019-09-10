<?php

Class Post {
    private $conn;

    private $table = 'tablename';

    //Post properties

    public $variable

    public function __construct($db)
    {
        $this->conn = $db;


    }


    //Get Posts

    public function read(){
        //query

        $query = 'SELECT column FROM ' . $this->table . '  p
        ';

        $stmt = $this->conn->prepare($query);

        //execute query

        $stmt->execute();

        return $stmt;
    }



}