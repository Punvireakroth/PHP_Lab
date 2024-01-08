<?php

// Connect to the database, and execute a query
class Database
{

    public $connection;


    public function __construct()
    {
        // connect to mysql database
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }


    public function query($query)
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}
