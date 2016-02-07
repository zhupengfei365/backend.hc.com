<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminMenu extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 通过pid获取menu列表
     * @param string|array $pid
     * @return boolean|array menu列表
     */
    public function getMenuByPid($pid) {
        if (empty($pid)) {
            $pid = 0;
        }
        $this->load->model('backend/dao/AdminMenuDao');
        // 查询
        $adminUserRet = $this->AdminMenuDao->getMenuByPid($pid);
        return $adminUserRet;
    }
    
    public function getChildMenuByPid($pidStr) {
        $this->load->model('backend/dao/AdminMenuDao');
        $menuList = $this->AdminMenuDao->getChildMenuWithDel($pidStr);
        return $menuList;
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
    
    public function getMenuInfo($id) {
        $this->load->model('backend/dao/AdminMenuDao');
        $menuInfo = $this->AdminMenuDao->getMenuInfo($id);
        return $menuInfo;
    }
    
    public function editMenuInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/AdminMenuDao');
        $result = $this->AdminMenuDao->editMenuInfo($id, $data);
        return $result;
    }
    
    public function addMenuToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/AdminMenuDao');
        $result = $this->AdminMenuDao->insertMenuData($data);
        return $result;
    }
}
