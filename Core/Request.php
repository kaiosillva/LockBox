<?php

namespace Core;

class Request {

public function get ($key, $default = null, $prefixo = null) {

    return isset($_GET[$key]) ? 
    
    ($prefixo ?: null) . $_GET[$key] : $default;

}

}