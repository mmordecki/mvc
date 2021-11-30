<?php
namespace App\Controller;


class PostController extends Controller {
    /*
    public function __construct() {
        
    }
    */
    
    public function indexAction() {
        echo __CLASS__;
    }
    public function viewAction() {
        echo __METHOD__." ".$_GET['id'];
    }
}