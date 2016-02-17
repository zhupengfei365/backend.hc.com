<?php

require_once (APPPATH . '/models/dao/commonDao.php');

class ProductCateDao extends CommonDao {

    protected $table = 'pms_category';
    protected $fields = array(
        'category_id',
        'name',
        'name_alias',
        'description',
        'parent_id',
        'icon',
        'm_icon',
        'is_show',
        'is_highlight',
        'show_in_nav',
        'sort',
        'is_delete',
        'highlight_sort',
        'add_time',
        'update_time',
    );
    protected $primaryKey = 'category_id';

    public function getFields() {
        return $this->fields;
    }

    public function getCateList() {
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
    
    public function getCateListByPid($pid) {
        $this->getConn();
        $this->commonDb->select('category_id,name');
        $this->commonDb->from($this->table);
        $this->commonDb->where('is_delete', 0);
        $this->commonDb->where('parent_id', $pid);
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

    public function getCateAttrListByCateId($id, $isDelete) {
        $this->getConn();
        if ($isDelete == 2) {
            $sql = "SELECT * FROM pms_category_attr where category_id=" . $id;
        } else {
            $sql = "SELECT * FROM pms_category_attr where category_id=" . $id . " and is_delete=" . $isDelete;
        }
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

    public function editCateInfo($id, $data) {
        $this->getConn();
        return $this->updateOneRecord($id, $data);
    }
    
    public function insertCateData($data) {
        $this->getConn();
        $res = $this->insertOneRecord($data);
        return $res;
    }
    
    public function updateCateAttrByCateAttrId($id, $data) {
        $this->getConn();
        if (!is_array($id)) {
            $this->commonDb->where('category_attr_id', $id);
        } else {
            $this->commonDb->where_in('category_attr_id', $id);
        }
        $query = $this->commonDb->update('pms_category_attr', $data);
        if (!$query) {
            // todo 加一些
            // 数据库执行出错，记录日志
            $ret = FALSE;
        } else {
            $ret = $this->commonDb->affected_rows();
        }
        return $ret;
    }
    
    public function updateCateAttrByCateId($id, $data) {
        $this->getConn();
        $this->commonDb->where_in('category_id', $id);
        $query = $this->commonDb->update('pms_category_attr', $data);
        if (!$query) {
            // todo 加一些
            // 数据库执行出错，记录日志
            $ret = FALSE;
        } else {
            $ret = $this->commonDb->affected_rows();
        }
        return $ret;
    }
    
    public function getCateInfo($id) {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('category_id', $id);
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
    
    public function insertCateAttrsData($data) {
        $this->getConn();
        $res = $this->commonDb->insert_batch('pms_category_attr', $data);
        return $res;
    }
    
    public function getCateAttrInfo($cateId, $attrId) {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from('pms_category_attr');
        $this->commonDb->where('category_id', $cateId);
        $this->commonDb->where('attr_id', $attrId);
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
    
    public function editCateAttrInfo($id, $data) {
        $this->getConn();
        $this->commonDb->where('category_attr_id', $id);
        $query = $this->commonDb->update('pms_category_attr', $data);
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
