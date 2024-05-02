<?php

class Database
{
    private string $host;
    private string $dbName;
    private string $username;
    private string $password;
    public mysqli $conn;

    public function __construct(string $host, string $dbName, string $username, string $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect(): mysqli
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

$db = new Database("localhost", "tul_wa", "root", "");

$db->connect();