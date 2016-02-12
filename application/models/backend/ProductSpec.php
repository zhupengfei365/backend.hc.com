<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductSpec extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getSpecList() {
        $this->load->model('backend/dao/ProductSpecDao');
        $menuList = $this->ProductSpecDao->getSpecList();
        return $menuList;
    }
    
    public function getSpecValueNameList($idArr) {
        if (empty($idArr)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductSpecDao');
        $valueList = $this->ProductSpecDao->getSpecValueList($idArr);
        return $valueList;
    }
    
    public function getSpecInfo($id) {
        if (empty($id)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductSpecDao');
        $valueList = $this->ProductSpecDao->getSpecInfo($id);
        return $valueList;
    }
    
    public function addSpecToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductSpecDao');
        $result = $this->ProductSpecDao->insertSpecData($data);
        return $result;
    }
    
    public function insertSpecValuesToDb($data) {
        if (empty($data)) {
            return FALSE;
        }
        $this->load->model('backend/dao/ProductSpecDao');
        $result = $this->ProductSpecDao->insertSpecValueData($data);
        return $result;
    }
    
    public function delSpec($id) {
        if (empty($id)) {
            return false;
        }
        $data = array(
            'is_delete' => 1,
        );
        $this->load->model('backend/dao/ProductSpecDao');
        $result = $this->ProductSpecDao->editSpecInfo($id, $data);
        return $result;
    }
    
    public function editSpecInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/ProductSpecDao');
        $result = $this->ProductSpecDao->editSpecInfo($id, $data);
        return $result;
    }
    
    public function editSpecValueInfo($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
        $this->load->model('backend/dao/ProductSpecDao');
        $result = $this->ProductSpecDao->editSpecValueInfo($id, $data);
        return $result;
    }
}
