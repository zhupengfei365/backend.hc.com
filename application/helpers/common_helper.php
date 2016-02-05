<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('show_errors')) {

    function show_errors($url, $title = '', $status_code = 500) {
        $_error = & load_class('Exceptions', 'core');
        echo $_error->show_error($title, $url, 'error_warn', $status_code);
        exit;
    }

}

if (!function_exists('getClientIp')) {

    function getClientIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "unknown";
        $ip_arr = explode(',', $ip);
        $ip = $ip_arr[0];
        return($ip);
    }

}

if (!function_exists('getServerIp')) {

    function getServerIp() {
        static $serverip = NULL;
        if ($serverip !== NULL) {
            return $serverip;
        }
        if (isset($_SERVER)) {
            if (isset($_SERVER['SERVER_ADDR'])) {
                $serverip = $_SERVER['SERVER_ADDR'];
            } else {
                $serverip = '0.0.0.0';
            }
        } else {
            $serverip = getenv('SERVER_ADDR');
        }
        return $serverip;
    }

}