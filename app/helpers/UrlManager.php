<?php
namespace App\Helper;
//require __DIR__."/../../config/Url.php";

class UrlManager {
    public static function to($url, $data=array()) {
        global $urls;
        //var_dump($urls);
        /*
        foreach($urls as $key=>$u){
            if($key == $url){
                return $urls[$key];
            }
        }
        return $url;
        */
        foreach($data as $key=>$value) {
            $url = $url."/".$value;
        }
        return $url;
        
    }
    public static function reverseUrl($url) {
        global $urls;
        $urls_copy = array();
        foreach($urls as $key => $val)
        {
            $urls_copy[htmlentities($key)] = htmlentities($val);
        }
        if(strlen($url) > 1) {
            $url = substr($url, 1);
        }
        $path = explode("/",$url);
        $perform_url = "";
        foreach($urls_copy as $k=>$u){
            $perform_url = "";
            $k_path = explode("/",$k);
            $u_path = explode("/",$u);
            $result = array_diff($path,$k_path);
            if(count($result) == 0 && count(array_diff($k_path,$path)) == 0) {
                /*echo "<br />\n 0: $urls[$k] $k<br />\n";
                var_dump($k_path);
                var_dump($path);
                var_dump($urls);
                var_dump($urls_copy);
                var_dump(array_diff($path,$k_path));
                var_dump(array_diff($k_path,$path));
                echo "<br />\n 0.5:<br />\n";*/
                return $urls_copy[$k];
            }else {
                //echo count($path)." == ".count($k_path)."<br />\n";
                //var_dump($k_path);
                //var_dump($path);
                if(count($path) == count($k_path)) {
                    for($i=0;$i<count($k_path);$i++) {
                        if($k_path[$i] == "") {
                            break;
                        }
                        if($k_path[$i] == $path[$i]) {
                            //echo "<br />\n 1: $k_path[$i] == $path[$i]<br />\n";
                            if(($i+1) == count($k_path))
                                return $urls_copy[$k];
                            continue;
                        }
                        $p_explode = explode(":",str_replace(array("&lt;","&gt;"), "", $k_path[$i]));
                        if(count($p_explode) == 2) {
                            preg_match('/'.$p_explode[1].'/', $path[$i], $matches, PREG_OFFSET_CAPTURE);
                            if(count($matches) == 0) {
                                break;
                            }else {
                                if($p_explode[0] != "controller" && $p_explode[0] != "action") {
                                    $_GET[$p_explode[0]] = $matches[0][0];
                                    //echo "<br />\n 2: $p_explode[0], ".$matches[0][0]."<br />\n";
                                    //$perform_url = $perform_url.$p_explode[0]."/".$matches[0][0]."/";
                                    //$i++;
                                }else {
                                    //echo "<br />\n 3: $perform_url, ".$matches[0][0]."<br />\n";
                                    $perform_url = $perform_url.$matches[0][0]."/";
                                }
                                if(($i+1) == count($k_path)){
                                    if($perform_url == "") {
                                        return $urls_copy[$k];
                                    }else {
                                        return substr($perform_url, 0,strlen($perform_url)-1);
                                    }
                                }
                                //var_dump($matches[0][0]);
                                continue;
                            }
                        }else {
                            $pos = strpos($k_path[$i], "&lt;");
                            if($pos !== false) {
                                $string = str_replace(array("&lt;","&gt;"), "", $k_path[$i]);
                                $_GET[$string] = $path[$i];
                                //echo "<br />\n 4: ".$urls_copy[$k]."<br />\n";
                                if(($i+1) >= count($k_path))
                                    return $urls_copy[$k];
                            }
                        }
                    }
                }
            }
            //$perform_url = "";
        }
    }
}
