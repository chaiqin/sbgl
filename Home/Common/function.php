<?php

function is_pc() {
    $useragent = strtolower($_SERVER["HTTP_USER_AGENT"]);
    // pc电脑  
    $is_pc = strripos($useragent, 'windows nt');
    if ($is_pc) {
        return true;
    }
    return false;
}
