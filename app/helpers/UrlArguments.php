<?php
namespace App\Helper;

class UrlArguments {
    public function getArgumentFromUrl($path) : array {
        $arguments = array_slice($path, 3);
        $args = array();
        for($i = 0;$i < count($arguments);$i++) {
            $args[$arguments[$i]] = $arguments[$i+1];
            $i++;
        }
        return $args;
    }
}