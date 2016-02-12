<?php

require_once (APPPATH . '/models/dao/commonDao.php');

class ProductAttrDao extends CommonDao {

    protected $table = 'pms_attr';
    protected $fields = array(
        'attr_id',
        'name',
        'field_type',
        'is_delete',
        'add_time',
        'update_time',
    );
    protected $primaryKey = 'attr_id';

    public function getFields() {
        return $this->fields;
    }

    public function getAttrList() {
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
    
    public function editAttrInfo($id, $data) {
        $this->getConn();
        return $this->updateOneRecord($id, $data);
    }
    
    public function insertAttrData($data) {
        $this->getConn();
        $res = $this->insertOneRecord($data);
        return $res;
    }
    
    public function getAttrValueList($idArr) {
        $this->getConn();
        if (is_array($idArr)) {
            $attrId = implode("','", $idArr);
        } else {
            $attrId = $idArr;
        }
        $sql = "SELECT * FROM pms_attr_value where attr_id in ('".$attrId."')";
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
    
    public function getAttrInfo($id) {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('attr_id', $id);
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
    
    public function insertAttrValueData($data) {
        $this->getConn();
        $res = $this->commonDb->insert_batch('pms_attr_value', $data);
        return $res;
    }
    
    public function editAttrValueInfo($id, $data) {
        $this->getConn();
        $this->commonDb->where('attr_value_id', $id);
        $query = $this->commonDb->update('pms_attr_value', $data);
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
