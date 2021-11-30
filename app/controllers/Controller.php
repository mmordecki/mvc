<?php

namespace App\Controller;

class Controller {
    
    protected $layout = "layout";
    
    public function __construct(){
        
    }
    
    protected function showLayout($content) {
        require_once "views".DIRECTORY_SEPARATOR."layouts".DIRECTORY_SEPARATOR.$this->layout.".php";
    }
    
    public function render($filename, $data="") {
        //echo $_SERVER['DOCUMENT_ROOT']."<br />\n";
        $called_object = get_called_class();
        $path = explode(DIRECTORY_SEPARATOR, $called_object);
        $view_name = strtolower(str_replace("Controller","",$path[2]));
        //var_dump($path);
        //echo "fdsdsf $called_object<br />\n";
        //echo "nazwa klasy ".__CLASS__." ".get_called_class()."<br />\n";
        extract($data);
        ob_start();
        require_once "views".DIRECTORY_SEPARATOR.$view_name.DIRECTORY_SEPARATOR.$filename.".php";
        $content = ob_get_clean();
        //require_once "views".DIRECTORY_SEPARATOR.$view_name.DIRECTORY_SEPARATOR.$filename.".php";
        //$content = file_get_contents("views".DIRECTORY_SEPARATOR.$view_name.DIRECTORY_SEPARATOR.$filename.".php");
        $this->showLayout($content);
    }
    
}