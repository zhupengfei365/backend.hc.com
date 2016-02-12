<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductBrand extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getBrandList() {
        $this->load->model('backend/dao/ProductBrandDao');
        $menuList = $this->ProductBrandDao->getBrandList();
        return $menuList;
    }
    
    public function getBrandValueNameList($idArr) {
        if (empty($idArr)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductBrandDao');
        $valueList = $this->ProductBrandDao->getBrandValueList($idArr);
        return $valueList;
    }
    
    public function getBrandInfo($id) {
        if (empty($id)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductBrandDao');
        $valueList = $this->ProductBrandDao->getBrandInfo($id);
        return $valueList;
    }
    
    public function addBrandToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductBrandDao');
        $result = $this->ProductBrandDao->insertBrandData($data);
        return $result;
    }
    
    public function delBrand($id) {
        if (empty($id)) {
            return false;
        }
        $data = array(
            'is_delete' => 1,
        );
        $this->load->model('backend/dao/ProductBrandDao');
        $result = $this->ProductBrandDao->editBrandInfo($id, $data);
        return $result;
    }
    
    public function editBrandInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/ProductBrandDao');
        $result = $this->ProductBrandDao->editBrandInfo($id, $data);
        return $result;
    }
    
}
