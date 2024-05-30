<?php

class Database
{
    private $host;
    private $dbName;
    private $username;
    private $password;
    public $conn;

    public function __construct($host, $dbName, $username, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");

        return $this->conn;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$db = new Database("localhost", "tul_wa", "root", "");

$conn = $db->connect();