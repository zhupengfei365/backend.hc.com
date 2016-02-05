<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('show_error')) {

    function show_error($url, $title = '', $status_code = 500) {
        $_error = & load_class('Exceptions', 'core');
        echo $_error->show_error($title, $url, 'error_warn', $status_code);
        exit;
    }

}