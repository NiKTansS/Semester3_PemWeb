<?php
class Database
{
    private $host = "localhost";
    private $port = "5432"; // port default PostgreSQL
    private $username = "postgres"; 
    private $password = "(snta098)"; 
    private $database = "prakwebdb";
    public $conn;
    
    public function __construct()
    {
        $this->conn = pg_connect("host=$this->host port=$this->port dbname=$this->database user=$this->username password=$this->password");

        if (!$this->conn) {
            die("Connection failed: " . pg_last_error());
        }
    }
}
