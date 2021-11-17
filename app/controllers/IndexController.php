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
    
    public function productAction(array $id = array()) {
        //var_dump($id);
        $this->render("product",["id" => $id["id"]]);
    }
}