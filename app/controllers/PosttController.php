<?php
namespace App\Controller;

class PosttController extends Controller {
    /*
    public function __construct() {
        
    }
    */
    
    public function indexAction() {
        echo __METHOD__." ".$_GET['year'].' '.$_GET['category'];
    }
}