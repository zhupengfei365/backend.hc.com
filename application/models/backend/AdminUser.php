<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminUser extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 通过用户名获取用户信息
     * @param string $name
     * @return boolean|array 用户信息
     */
    public function getAdminUserByName($name) {
        if (empty($name)) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminUserDao');
        // 查询
        $adminUserRet = $this->AdminUserDao->getUserByName($name);
        return $adminUserRet;
    }

    public function updateUserInfo($userId, $fields) {
        if (empty($userId) || empty($fields)) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminUserDao');
        $adminUserRet = $this->AdminUserDao->updateOneUserInfo($userId, $fields);
        if ($adminUserRet === FALSE) {
            // 记录日志
            return FALSE;
        }
        return TRUE;
    }
    
    public function getUserInfoById($userId) {
        if (empty($userId)) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminUserDao');
        // 查询
        $adminUserRet = $this->AdminUserDao->getUserById($userId);
        return $adminUserRet;
    }
    
    public function getAcl($roleId) {
        if (empty($roleId)) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $roleList = $this->AdminRoleDao->getAcl($roleId);
        foreach($roleList as $role) {
            $sessionRole[$role['dirc']][$role['cont']][$role['func']] = TRUE;
        }
        $_SESSION[$this->config->item('rbac_auth_key')]['ACL'] = $sessionRole;
    }
    
    public function getUserList() {
        $this->load->model('backend/dao/AdminUserDao');
        // 查询
        $userListRet = $this->AdminUserDao->getUserList();
        return $userListRet;
    }
    
    public function addUserToDb($data) {
        if (empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/AdminUserDao');
        $result = $this->AdminUserDao->insertUserData($data);
        return $result;
    }
    
    public function getUserInfo($id) {
        if (empty($id)) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminUserDao');
        $userInfo = $this->AdminUserDao->getUserInfo($id);
        return $userInfo;
    }
    
    public function editUserInfo($userId, $data) {
        if (empty($userId) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/AdminUserDao');
        $result = $this->AdminUserDao->editUserInfo($userId, $data);
        return $result;
    }
}
