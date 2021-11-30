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
        //var_dump($currency->showData());
        $this->render("index",["currencyData" => $currency->showData(),"dwa" => "dfdsfd"]);
    }
    
    public function productAction() {
        //var_dump($_GET["id"]);
        $id = $_GET["id"];
        $this->render("product",["id" => $id]);
    }
}