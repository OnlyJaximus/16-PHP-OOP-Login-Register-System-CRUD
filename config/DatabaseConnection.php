<?php

class DatabaseConnection
{
    public $conn;

    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if (!$conn) {
            die("<h1>Database Connection Failed!</h1>");
        }
        // echo "Daaa";
        return  $this->conn = $conn;
    }
}
