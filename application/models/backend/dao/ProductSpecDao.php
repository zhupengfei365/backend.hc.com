<?php

require_once (APPPATH . '/models/dao/commonDao.php');

class ProductSpecDao extends CommonDao {

    protected $table = 'pms_spec';
    protected $fields = array(
        'spec_id',
        'name',
        'remark',
        'is_delete',
        'add_time',
        'update_time',
    );
    protected $primaryKey = 'spec_id';

    public function getFields() {
        return $this->fields;
    }

    public function getSpecList() {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('is_delete', 0);
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
    
    public function editSpecInfo($id, $data) {
        $this->getConn();
        return $this->updateOneRecord($id, $data);
    }
    
    public function insertSpecData($data) {
        $this->getConn();
        $res = $this->insertOneRecord($data);
        return $res;
    }
    
    public function getSpecValueList($idArr) {
        $this->getConn();
        if (is_array($idArr)) {
            $specId = implode("','", $idArr);
        } else {
            $specId = $idArr;
        }
        $sql = "SELECT * FROM pms_spec_value where spec_id in ('".$specId."')";
        $query = $this->commonDb->query($sql);
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
    
    public function getSpecInfo($id) {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('spec_id', $id);
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
    
    public function insertSpecValueData($data) {
        $this->getConn();
        $res = $this->commonDb->insert_batch('pms_spec_value', $data);
        return $res;
    }
    
    public function editSpecValueInfo($id, $data) {
        $this->getConn();
        $this->commonDb->where('spec_value_id', $id);
        $query = $this->commonDb->update('pms_spec_value', $data);
        if (!$query) {
            // todo 加一些
            // 数据库执行出错，记录日志
            $ret = FALSE;
        } else {
            $ret = $this->commonDb->affected_rows();
        }
        return $ret;
    }
}
