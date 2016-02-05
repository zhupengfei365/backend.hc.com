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
}
