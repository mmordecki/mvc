<?php
namespace App\Controller;

use App\Model\CurrencyModel;

class IndexController extends Controller {
    /*
    public function __construct() {
        
    }
    */
    
    public function indexAction() {
        $currency = new CurrencyModel();
        $this->render("index",["jeden" => "dfsddfs","dwa" => "dfdsfd"]);
    }
}