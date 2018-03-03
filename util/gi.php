<?php

require_once("Ip.php");

function isIpv4($ip) {
    if (!isset($ip) || $ip === false) {
        return "no";
    }
    $postion = stripos($ip, ".");
    if (isset($postion) && $postion !== false) {
        return "is";
    }
    return "no";
}

function isIpv6($ip) {
    if (!isset($ip) || $ip === false) {
        return "no";
    }
    $postion = stripos($ip, ":");
    if (isset($postion) && $postion !== false) {
        return "is";
    }
    return "no";
}

function getCharpos($str, $char) {
    $j = 0;
    $arr = array();
    $count = substr_count($str, $char);
    for ($i = 0;$i < $count;$i++) {
        $j = strpos($str, $char, $j);
        $arr[] = $j;
        $j = $j + 1;
    }
    return $arr;
}

function isGiIp($ip) {   
    $gi_ip = new Ip();
    $char = '.';
    if ("is" == isIpv4($ip)) {
        $char = '.';
    } else if ("is" == isIpv6($ip)) {
        $char = ':';
    }
    $array = getCharpos($ip, $char);
    $ip_prefix = substr($ip, 0, $array[1] + 1);
    if (in_array($ip_prefix, $gi_ip::$ipv4) || in_array($ip_prefix, $gi_ip::$ipv6)) {
        return true; 
    }else{
        return false;
    }
}



?>