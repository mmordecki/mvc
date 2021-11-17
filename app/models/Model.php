<?php
namespace App\Model;

class Model {
    
    protected $servername = "localhost";
    
    protected $username = "root";
    
    protected $password = "";
    
    protected $dbname = "innovation";
    
    public $conn;
    
    public function __construct() {
        try {
            $this->conn = new \PDO("mysql:host=$this->servername;dbname=$this->dbname",
                $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //$this->createTableCurrency();
            //echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    /*
    private function createTableCurrency() : void {
        $sql = "CREATE TABLE IF NOT EXISTS currency (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                currency_code VARCHAR(3) NOT NULL,
                exchange_rate  VARCHAR(10) NOT NULL
                )";
        
        $this->conn->exec($sql);
    }
    */
}