<?php
namespace App\Controller;

class SiteController extends Controller {
    /*
    public function __construct() {
        
    }
    */
    
    public function indexAction() {
        echo __CLASS__;
    }
    
    public function aboutAction(){
        echo __METHOD__;
    }
}