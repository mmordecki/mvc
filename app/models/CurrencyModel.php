<?php
namespace App\Model;

use App\Model\Model;

class CurrencyModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function showData() : array {
        $stmt = $this->conn->prepare("SELECT * FROM currency");
        $stmt->execute();
        
        $result = $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    
}