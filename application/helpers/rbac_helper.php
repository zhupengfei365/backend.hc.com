<?php

/**
 * 错误跳转
 */
if (!function_exists("errorRedirct")) {

    function errorRedirct($url = "", $contents = "操作失败", $time = 3) {

        $ci_obj = &get_instance();
        if ($url != "") {
            $url = base_url("index.php/" . $url);
        } else {
            $url = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url();
        }
        $data['url'] = $url;
        $data['time'] = $time;
        $data['type'] = "error";
        $data['contents'] = $contents;
        $ci_obj->load->view("redirect", $data);
        $ci_obj->output->_display($ci_obj->output->get_output());
        die();
    }

}
/**
 * 正确跳转
 */
if (!function_exists("successRedirct")) {

    function successRedirct($url, $contents = "操作成功", $time = 3) {
        $ci_obj = &get_instance();
        if ($url != "") {
            $url = base_url("index.php/" . $url);
        } else {
            $url = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url();
        }
        $data['url'] = $url;
        $data['time'] = $time;
        $data['type'] = "success";
        $data['contents'] = $contents;
        $ci_obj->load->view("redirect", $data);
        $ci_obj->output->_display($ci_obj->output->get_output());
        die();
    }

}
