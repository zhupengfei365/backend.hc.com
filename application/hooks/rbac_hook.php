<?php

class Rbac {
    /*
     * 权限验证(Hook自动加载)
     */

    public function aoto_verify() {
        $ciObj = &get_instance();
        //目录
        $directory = substr($ciObj->router->fetch_directory(), 0, -1);
        //控制器
        $controller = $ciObj->router->fetch_class();
        //方法
        $function = $ciObj->router->fetch_method();
        if (!in_array($directory . '/' . $controller, $ciObj->config->item('rbac_notauth_dirc'))) {//当非主目录
            if ($ciObj->config->item('rbac_auth_on')) {//开启认证
                //验证是否登录
                if (empty($ciObj->session->userdata('userId'))) {
                    errorRedirct($ciObj->config->item('rbac_auth_gateway'), "请先登录！");
                    die();
                }
                if ($ciObj->config->item('rbac_auth_type') == 2) {//若为实时认证
                    $ciObj->load->model("backend/adminUser");
                    //检测用户状态
                    $res = $ciObj->adminUser->getUserInfoById($ciObj->session->userdata('userId'));
                    if ($res == FALSE || $res['status'] == 0) {
                        errorRedirct($ciObj->config->item('rbac_auth_gateway'), "该账号已失效");
                        die();
                    }
                    //ACL重新赋权
                    $ciObj->adminUser->getAcl($ciObj->session->userdata('userId'));
                }
                //验证ACL权限
                if (@!$_SESSION[$ciObj->config->item('rbac_auth_key')]["ACL"][$directory][$controller][$function]) {
                    errorRedirct("", "无权访问此节点！(" . $directory . "/" . $controller . "/" . $function . ")");
                    die();
                }
            }
            //已登录且有权限,获取左侧菜单
            if ($ciObj->config->item('rbac_auth_type') == 2) {//若为实时认证
                $ciObj->get_menu = $this->get_menu();
            } else {
                if (isset($_SESSION[$ciObj->config->item('rbac_auth_key')]["MENU"])) {
                    $ciObj->get_menu = $_SESSION[$ciObj->config->item('rbac_auth_key')]["MENU"];
                } else {
                    $_SESSION[$ciObj->config->item('rbac_auth_key')]["MENU"] = $this->get_menu();
                    $ciObj->get_menu = $_SESSION[$ciObj->config->item('rbac_auth_key')]["MENU"];
                }
            }
            //默认重写View开
            $ciObj->view_override = TRUE;
        }
    }

    /*
     * 重写View
     */

    public function view_override() {
        $ciObj = &get_instance();
        $directory = substr($ciObj->router->fetch_directory(), 0, -1);
        if (@$ciObj->view_override && $directory != "") {
            $html = $ciObj->load->view('main', null, true);
        } else {
            $html = $ciObj->output->get_output();
        }
        $ciObj->output->_display($html);
    }

    /*
     * 获取左侧菜单
     */

    public function get_menu() {
        $ciObj = &get_instance();

        $ciObj->load->model("backend/adminMenu");

        $menuData = $ciObj->adminMenu->getParentMenu();
        if (count($menuData) > 0) {
            $pidArr = array();
            foreach ($menuData as $m) {
                $pidArr[] = $m['id'];
            }
            $pidStr = implode(',', $pidArr);
            $ciObj->load->model("backend/adminMenu");
            $childMenuData = $ciObj->adminMenu->getChildMenu($pidStr);

            foreach ($menuData as $k => $m) {
                foreach ($childMenuData as $s) {
                    if ($s['p_id'] == $m['id'] && @$_SESSION[$ciObj->config->item('rbac_auth_key')]["ACL"][$s['dirc']][$s['cont']][$s['func']]) {
                        $s['uri'] = $s['dirc'] . '/' . $s['cont'] . '/' . $s['func'];
                        $menuData[$k]['child'][] = $s;
                    }
                }
            }

            foreach ($menuData as $k => $m) {
                if (!empty($m['child']) && count($m['child']) > 0) {
                    $menuData[$k]['is_show'] = 1;
                } else {
                    $menuData[$k]['is_show'] = 0;
                }
            }
        }
        return $menuData;
    }

}
