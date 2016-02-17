<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function login() {
        if (!empty($this->session->userdata('userId'))) {
            successRedirct($this->config->item('rbac_default_index'), "登录成功！");
            return;
        }
        $this->load->view('user/login');
    }

    public function dologin() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            errorRedirct('backend/user/login', '用户名和密码不能为空');
            die();
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->model('backend/adminUser');

            $adminUserInfo = $this->adminUser->getAdminUserByName($username);
            if (empty($adminUserInfo)) {
                errorRedirct('backend/user/login', '登录失败，账号不存在');
                die();
            }

            if (!$adminUserInfo['status']) {
                errorRedirct('backend/user/login', '登录失败，账号已失效');
                die();
            }

            if ($adminUserInfo['password'] != md5($password)) {
                errorRedirct('backend/user/login', '登录失败，密码错误');
                die();
            }

            // 更新用户登录时间
            $fields = array(
                'last_ip' => getClientIp(),
                'last_time' => time(),
            );
            $this->adminUser->updateUserInfo($adminUserInfo['user_id'], $fields);

            $data = array(
                'userId' => $adminUserInfo['user_id'],
                'userName' => $adminUserInfo['user_name'],
                'realName' => $adminUserInfo['real_name'],
            );
            $this->session->set_userdata($data);
            successRedirct($this->config->item('rbac_default_index'), "登录成功！");
        }
    }

    public function logout() {
        $this->load->helper('cookie');
        set_cookie('menu_url','',time()-3600);
        $this->session->sess_destroy();
        successRedirct('backend/user/login', "退出成功！");
    }

}
