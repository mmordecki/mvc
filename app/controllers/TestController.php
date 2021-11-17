<?php
namespace App\Controller;


class TestController extends Controller {
    
    public function __construct() {
        
    }
    
    public function indexAction() {
        $this->render("index",array("dfsddfs","dfdsfd"));
    }
}