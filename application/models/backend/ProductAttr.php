<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductAttr extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getAttrList() {
        $this->load->model('backend/dao/ProductAttrDao');
        $menuList = $this->ProductAttrDao->getAttrList();
        return $menuList;
    }
    
    public function getAttrValueNameList($idArr) {
        if (empty($idArr)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductAttrDao');
        $valueList = $this->ProductAttrDao->getAttrValueList($idArr);
        return $valueList;
    }
    
    public function getAttrInfo($id) {
        if (empty($id)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductAttrDao');
        $valueList = $this->ProductAttrDao->getAttrInfo($id);
        return $valueList;
    }
    
    public function addAttrToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductAttrDao');
        $result = $this->ProductAttrDao->insertAttrData($data);
        return $result;
    }
    
    public function insertAttrValuesToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductAttrDao');
        $result = $this->ProductAttrDao->insertAttrValueData($data);
        return $result;
    }
    
    public function delAttr($id) {
        if (empty($id)) {
            return false;
        }
        $data = array(
            'is_delete' => 1,
        );
        $this->load->model('backend/dao/ProductAttrDao');
        $result = $this->ProductAttrDao->editAttrInfo($id, $data);
        return $result;
    }
    
    public function editAttrInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/ProductAttrDao');
        $result = $this->ProductAttrDao->editAttrInfo($id, $data);
        return $result;
    }
    
    public function editAttrValueInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/ProductAttrDao');
        $result = $this->ProductAttrDao->editAttrValueInfo($id, $data);
        return $result;
    }
}
