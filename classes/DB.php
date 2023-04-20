<?php

class DB {
    private $server = 'localhost';
    private $database = 'best_new_records';
    private $username = 'root';
    private $password = '';

    private $conn;
    private $dsn;

    public function __construct() {
        $this->dsn = "mysql:host={$this->server};dbname={$this->database}";
        $this->conn = null;
    }

    public function open() {
        if ($this->conn === null){
            $options = array(
                PDO::MYSQL_ATTR_FOUND_ROWS => TRUE,
                PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION
            );
            $this->conn = new PDO($this->dsn, $this->username, $this->password, $options);
        }
        return $this->conn;
    }

    public function isOpen() {
        return $this->conn !== null;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function close() {
        $this->conn = null;
    }
}
?>