<?php

namespace Core;

class Request {

public function get ($key, $default = null, $prefixo = null) {

    return isset($_GET[$key]) ? 
    
    ($prefixo ?: null) . $_GET[$key] : $default;

}

public function post ($key, $default = null, $prefixo = null) {

    return isset($_POST[$key]) ? 
    
    ($prefixo ?: null) . $_POST[$key] : $default;

}

public function all () {

    return $_POST;

}

}