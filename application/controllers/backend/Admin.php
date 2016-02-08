<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function userList() {
        $this->load->model('backend/adminUser');
        $userList = $this->adminUser->getUserList();
        $data = array(
            'list' => $userList,
        );
        $this->load->view('admin/userList', $data);
    }

    public function addUser() {
        $this->load->model('backend/adminRole');
        $roleList = $this->adminRole->getRoleList();
        $data = array(
            'role_list' => $roleList,
        );
        $this->load->view('admin/addUser', $data);
    }
    
    public function addUserDo() {
        $this->form_validation->set_rules('user_name', 'user_name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('real_name', 'real_name', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'real_name' => $this->input->post('real_name'),
                'role_id' => $this->input->post('role_id'),
                'status' => $this->input->post('status'),
                'user_desc' => $this->input->post('user_desc'),
                'add_time' => time(),
            );

            $this->load->model('backend/adminUser');
            $result = $this->adminUser->addUserToDb($data);
            if ($result) {
                successRedirct('backend/admin/userList', "添加成功！");
            } else {
                errorRedirct('', "添加失败！");
            }
        }
    }

    public function editUser() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/adminUser');
        $info = $this->adminUser->getUserInfo($id);
        $this->load->model('backend/adminRole');
        $roleList = $this->adminRole->getRoleList();
        $data = array(
            'data' => $info,
            'role_list' => $roleList,
        );
        $this->load->view('admin/editUser', $data);
    }
    
    public function editUserDo() {
        $this->form_validation->set_rules('user_name', 'user_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('real_name', 'real_name', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $userId = $this->input->post('user_id');
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'real_name' => $this->input->post('real_name'),
                'role_id' => $this->input->post('role_id'),
                'status' => $this->input->post('status'),
                'user_desc' => $this->input->post('user_desc'),
                'update_time' => time(),
            );
            if (!empty($this->input->post('password'))) {
                $data['password'] = md5($this->input->post('password'));
            }

            $this->load->model('backend/adminUser');
            $result = $this->adminUser->editUserInfo($userId, $data);
            if ($result) {
                successRedirct('backend/admin/userList', "修改成功！");
            } else {
                errorRedirct('', "修改失败！");
            }
        }
    }
    
    public function editInfo() {
        $id = $this->session->userdata('userId');
        $this->load->model('backend/adminUser');
        $info = $this->adminUser->getUserInfo($id);
        $data = array(
            'data' => $info,
        );
        $this->load->view('admin/editInfo', $data);
    }
    
    public function editInfoDo() {
        $this->form_validation->set_rules('user_name', 'user_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('real_name', 'real_name', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $userId = $this->input->post('user_id');
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'real_name' => $this->input->post('real_name'),
                'user_desc' => $this->input->post('user_desc'),
                'update_time' => time(),
            );

            $this->load->model('backend/adminUser');
            $result = $this->adminUser->editUserInfo($userId, $data);
            if ($result) {
                successRedirct('backend/admin/editInfo', "修改成功！");
            } else {
                errorRedirct('', "修改失败！");
            }
        } 
    }
    
    public function editPass() {
        $this->load->view('admin/editPass');
    }
    
    public function editPassDo() {
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('new_password', 'new_password', 'required');
        $this->form_validation->set_rules('new_password1', 'new_password1', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $password = $this->input->post('password');
            $newPassword = $this->input->post('new_password');
            $newPassword1 = $this->input->post('new_password1');
            
            $username = $this->session->userdata('userName');
            $adminUserInfo = $this->adminUser->getAdminUserByName($username);

            if ($adminUserInfo['password'] != md5($password)) {
                errorRedirct('', '原密码错误');
                die();
            }
            
            if ($newPassword != $newPassword1) {
                errorRedirct('', '两次密码不一致');
                die();
            }
            
            // 更新密码
            $data = array(
                'password' => md5($newPassword),
                'update_time' => time(),
            );
            $result = $this->adminUser->updateUserInfo($adminUserInfo['user_id'], $data);
            if ($result) {
                $this->session->sess_destroy();
                successRedirct('backend/user/login', "修改成功，请重新登录");
            } else {
                errorRedirct('', '密码修改失败');
                die();
            }
        }
    }
}
