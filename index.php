<?php
//use App\Controller\IndexController;

echo $_SERVER['DOCUMENT_ROOT']."<br />\n";
echo $_SERVER['REQUEST_URI']."<br />\n";
echo $_SERVER['QUERY_STRING']."<br />\n";
echo $_SERVER['PATH_INFO']."<br />\n";
echo DIRECTORY_SEPARATOR."<br />\n";
echo __DIR__."<br />\n";

spl_autoload_register(function ($class_name) {
    //echo "nazwa klasy $class_name<br />\n";
    $ds = DIRECTORY_SEPARATOR;
    $path = explode(DIRECTORY_SEPARATOR, $class_name);
    //var_dump($path);
    if($path[1] == "Controller") {
        include $_SERVER['DOCUMENT_ROOT'] . $ds ."app". $ds ."controllers" . $ds . $path[2] . '.php';
    }
    if($path[1] == "Model") {
        include $_SERVER['DOCUMENT_ROOT'] . $ds ."app". $ds ."models" . $ds . $path[2] . '.php';
    }
});

if($_SERVER['REQUEST_URI'] == "/") {
    $index = new App\Controller\IndexController();
    $index->indexAction();
}else {
    $path = explode("/",$_SERVER['PATH_INFO']);
    $classname = "App\\Controller\\".ucfirst($path[1])."Controller";
    $controller = new $classname();
    if(!isset($path[2])) {
        $controller->indexAction();
    }else {
        $action = $path[2]."Action";
        $controller->$action();
    }
    //var_dump($path);
}