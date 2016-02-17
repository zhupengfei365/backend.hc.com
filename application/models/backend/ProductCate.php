<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductCate extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getCateList() {
        $this->load->model('backend/dao/ProductCateDao');
        $menuList = $this->ProductCateDao->getCateList();
        return $menuList;
    }
    
    public function getCateListByPid($pid) {
        $this->load->model('backend/dao/ProductCateDao');
        $menuList = $this->ProductCateDao->getCateListByPid($pid);
        return $menuList;
    }
    
    /*
     * param $isDelete = 0未删除列表，1已删除列表，2全部列表，默认0
     */
    public function getCateAttrListByCateId($id, $isDelete = 0) {
        if (empty($id)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $attrList = $this->ProductCateDao->getCateAttrListByCateId($id, $isDelete);
        return $attrList;
    }
    
    public function delCateAttrByCateAttrId($id) {
        if (empty($id)) {
            return FALSE;
        }
        $data = array(
            'is_delete' => 1,
        );
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->updateCateAttrByCateAttrId($id, $data);
        return $result;
    }
    
    public function delCateAttrByCateId($id) {
        if (empty($id)) {
            return FALSE;
        }
        $data = array(
            'is_delete' => 1,
        );
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->updateCateAttrByCateId($id, $data);
        return $result;
    }
    
    public function getCateAttrInfo($cateId, $attrId) {
        if (empty($cateId) || empty($attrId)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $valueList = $this->ProductCateDao->getCateAttrInfo($cateId, $attrId);
        return $valueList;
    }
    
    public function updateCateAttrInfoByCateAttrId($id, $data){
        if (empty($id) || empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->updateCateAttrByCateAttrId($id, $data);
        return $result;
    }
    
    public function getCateInfo($id) {
        if (empty($id)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $valueList = $this->ProductCateDao->getCateInfo($id);
        return $valueList;
    }
    
    public function addCateToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->insertCateData($data);
        return $result;
    }
    
    public function insertCateAttrsToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->insertCateAttrsData($data);
        return $result;
    }
    
    public function delCate($id) {
        if (empty($id)) {
            return false;
        }
        $data = array(
            'is_delete' => 1,
        );
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->editCateInfo($id, $data);
        return $result;
    }
    
    public function editCateInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->editCateInfo($id, $data);
        return $result;
    }
    
    public function editCateValueInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/ProductCateDao');
        $result = $this->ProductCateDao->editCateValueInfo($id, $data);
        return $result;
    }
}
