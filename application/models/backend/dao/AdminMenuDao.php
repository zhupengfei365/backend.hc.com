<?php

require_once (APPPATH . '/models/dao/commonDao.php');

class AdminMenuDao extends CommonDao {

    protected $table = 'pms_menu';
    protected $fields = array(
        'id',
        'title',
        'node_id',
        'p_id',
        'sort',
        'status',
    );
    protected $primaryKey = 'id';

    public function getFields() {
        return $this->fields;
    }

    public function getMenuByPid($pid) {
        $ret = array();
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        if (is_array($pid)) {
            $pidStr = implode(',', $pid);
            $this->commonDb->where_in('p_id', $pidStr);
        } else {
            $this->commonDb->where('p_id', $pid);
        }
        $this->commonDb->order_by('sort', 'ASC');
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
    
    public function getChildMenuWithDel($idStr) {
        $this->getConn();
        $sql = "SELECT rm.id,rm.title,rm.status,rm.sort,rm.node_id,rm.p_id,rn.dirc,rn.cont,rn.func FROM pms_menu rm left join pms_node rn on rm.node_id = rn.id WHERE rm.p_id in (" . $idStr . ") ORDER BY sort asc";
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
    
    public function getParentMenu() {
        $this->getConn();
        $sql = "SELECT rm.id,rm.title,rm.node_id,rm.p_id,rm.icon_name,rn.dirc,rn.cont,rn.func FROM pms_menu rm left join pms_node rn on rm.node_id = rn.id WHERE rm.status = 1 AND rm.p_id=0 ORDER BY sort asc";
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
    
    public function getChildMenu($idStr) {
        $this->getConn();
        $sql = "SELECT rm.id,rm.title,rm.node_id,rm.p_id,rn.dirc,rn.cont,rn.func FROM pms_menu rm left join pms_node rn on rm.node_id = rn.id WHERE rm.status = 1 AND rm.p_id in (" . $idStr . ") ORDER BY sort asc";
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
    
    public function getMenuInfo($id) {
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('id', $id);
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
    
    public function editMenuInfo($id, $data) {
        $this->getConn();
        return $this->updateOneRecord($id, $data);
    }
    
    public function insertMenuData($data) {
        $this->getConn();
        $res = $this->insertOneRecord($data);
        return $res;
    }
}
