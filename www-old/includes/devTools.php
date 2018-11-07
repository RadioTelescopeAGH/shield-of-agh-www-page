<?php

class DevTools{

    public function p($array, $plain = true, $type = false, $exit = false){
        if($plain) header('Content-Type: text/plain');
        if($type) var_dump($array);
        else print_r($array);
        if($exit) exit;
    }

}