<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminRole extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getNodeList() {
        $this->load->model('backend/dao/AdminRoleDao');
        // 查询
        $nodeList = $this->AdminRoleDao->getNodeList();
        return $nodeList;
    }
    
    public function getParentMenu() {
        $this->load->model('backend/dao/AdminMenuDao');
        $menuList = $this->AdminMenuDao->getParentMenu();
        return $menuList;
    }

    public function getChildMenu($pidStr) {
        $this->load->model('backend/dao/AdminMenuDao');
        $menuList = $this->AdminMenuDao->getChildMenu($pidStr);
        return $menuList;
    }
    
    public function addNodeToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->insertNodeData($data);
        return $result;
    }
    
    public function getNodeInfo($id) {
        if (empty($id)) {
            return false;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $info = $this->AdminRoleDao->getNodeInfo($id);
        return $info;
    }
    
    public function editNodeInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->editNodeInfo($id, $data);
        return $result;
    }
    
    public function delNode($id) {
        if (empty($id)) {
            return false;
        }
        $data = array(
            'status' => 0,
        );
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->editNodeInfo($id, $data);
        return $result;
    }
    
    public function getRoleList() {
        $this->load->model('backend/dao/AdminRoleDao');
        // 查询
        $roleList = $this->AdminRoleDao->getRoleList();
        return $roleList;
    }
    
    public function addRoleToDb($data) {
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->insertRoleData($data);
        return $result;
    }
    
    public function getRoleInfo($id) {
        if (empty($id)) {
            return false;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $info = $this->AdminRoleDao->getRoleInfo($id);
        return $info;
    }
    
    public function editRoleInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->editRoleInfo($id, $data);
        return $result;
    }
    
    public function delRole($id) {
        if (empty($id)) {
            return false;
        }
        $data = array(
            'status' => 0,
        );
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->editRoleInfo($id, $data);
        return $result;
    }
    
    public function getControllerList() {
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->getControlList();
        return $result;
    }
    
    public function getAuthList($roleId) {
        if (empty($roleId)) {
            return false;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->getAuthList($roleId);
        return $result;
    }
    
    public function delAllAuth($roleId) {
        if (empty($roleId)) {
            return false;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->delAllAuth($roleId);
        return $result;
    }
    
    public function batchInsertAuth($data) {
        if (count($data) == 0) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminRoleDao');
        $result = $this->AdminRoleDao->batchInsertAuth($data);
        return $result;
    }
}
