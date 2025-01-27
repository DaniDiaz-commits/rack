<?php

namespace Danie\Rack\Database;

use PDO;
use PDOException;

class Database {
    private $host = "localhost";
    private $dbname = "examen6db";
    private $user = "root";
    private $password = "";
    private $conn;

    public function __construct()
    {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo "Error de conexión: {$e->getMessage()}";
        }
    }

    public function __destruct() {
        $this->conn = null;
    }

    public function getConnection() {
        return $this->conn;
    }
}
