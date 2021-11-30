<?php
//use App\Controller\IndexController;
require __DIR__."/config/Url.php";

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
    if($path[1] == "Helper") {
        include $_SERVER['DOCUMENT_ROOT'] . $ds ."app". $ds ."helpers" . $ds . $path[2] . '.php';
    }
});
$uri = $_SERVER['REQUEST_URI'];
$path = App\Helper\UrlManager::reverseUrl($uri);
echo "<br />\n".$uri." $path<br />\n";
$path = explode("/",$path);
//var_dump($path);
$classname = "App\\Controller\\".ucfirst($path[0])."Controller";
//echo $classname."<br />\n";
$controller = new $classname();
if(!isset($path[1])) {
    $controller->indexAction();
}else {
    $action = $path[1]."Action";
    $controller->$action();
}
//$_GET['my_value'] = 'test';
//echo "my value: ".$_GET['my_value'];
/*
if($_SERVER['REQUEST_URI'] == "/") {
    $queryurl = "/";
    $path = App\Helper\UrlManager::reverseUrl($queryurl);
    echo "path: $path";
    $classname = "App\\Controller\\".ucfirst($path[1])."Controller";
    $controller = new $classname();
}else {
    
}
*/
/*
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
        $urlargument = new App\Helper\UrlArguments();
        $args = $urlargument->getArgumentFromUrl($path);
        $action = $path[2]."Action";
        if(count($args) == 0) {
            $controller->$action();
        }else {
            $controller->$action($args);
        }
    }
    //var_dump($path);
}
*/