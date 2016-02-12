<?php

require_once (APPPATH . '/models/dao/commonDao.php');

class ProductBrandDao extends CommonDao {

    protected $table = 'pms_brand';
    protected $fields = array(
        'brand_id',
        'name',
        'aliases',
        'info',
        'link',
        'breeding',
        'production',
        'is_show',
        'is_delete',
        'sort',
        'add_time',
        'update_time',
    );
    protected $primaryKey = 'brand_id';

    public function getFields() {
        return $this->fields;
    }

    public function getBrandList() {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $query = $this->commonDb->get();
        if (!$query) {
            // 数据库执行出错，记录日志
            $ret = array();
        } else if ($query->num_rows() > 0) {
            $ret = $query->result_array();
        } else {
            $ret = array();
        }
        return $ret;
    }
    
    public function editBrandInfo($id, $data) {
        $this->getConn();
        return $this->updateOneRecord($id, $data);
    }
    
    public function insertBrandData($data) {
        $this->getConn();
        $res = $this->insertOneRecord($data);
        return $res;
    }
    
    public function getBrandInfo($id) {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('brand_id', $id);
        $query = $this->commonDb->get();
        if (!$query) {
            // 数据库执行出错，记录日志
            $ret = array();
        } else if ($query->num_rows() > 0) {
            $ret = $query->row_array();
        } else {
            $ret = array();
        }
        return $ret;
    }
    
}
