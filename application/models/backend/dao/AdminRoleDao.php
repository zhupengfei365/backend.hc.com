<?php

require_once (APPPATH . '/models/dao/commonDao.php');

class AdminRoleDao extends CommonDao {

    protected $table = 'pms_node';
    protected $fields = array(
        'id',
        'dirc',
        'cont',
        'func',
        'memo',
        'status',
    );
    protected $primaryKey = 'id';

    public function getFields() {
        return $this->fields;
    }

    // 获取权限
    public function getAcl($roleId) {
        $this->getConn();
        $sql = "SELECT id,dirc,cont,func FROM pms_node WHERE id in (SELECT node_id FROM pms_auth WHERE role_id = ".$roleId.")";
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

    // 获取节点列表
    public function getNodeList() {
        $this->getConn();
        $sql = "SELECT * FROM pms_node order by dirc,cont";
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
    
    // 插入节点
    public function insertNodeData($data) {
        $this->getConn();
        $res = $this->insertOneRecord($data);
        return $res;
    }
    
    // 获取制定节点信息
    public function getNodeInfo($id) {
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
    
    public function editNodeInfo($id, $data) {
        $this->getConn();
        return $this->updateOneRecord($id, $data);
    }
    
    public function getRoleList() {
        $this->getConn();
        $sql = "SELECT * FROM pms_role order by id";
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
    
    public function insertRoleData($data) {
        $this->getConn();
        $query = $this->commonDb->insert('pms_role', $data);
        if (!$query) {//todo
            // 记录日志
            $recordId = FALSE;
        } else {
            //如果表中无auto_increment字段, insert_id则返回0
            $recordId = $this->commonDb->insert_id();
        }
        return $recordId;
    }
    
    public function getRoleInfo($id) {
        $this->getConn();
        $sql = "SELECT * FROM pms_role where id=" . $id;
        $query = $this->commonDb->query($sql);
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
    
    public function editRoleInfo($id, $data) {
        $this->getConn();
        $this->commonDb->where('id', $id);
        $query = $this->commonDb->update('pms_role', $data);
        if (!$query) {//todo 加一些
            // 数据库执行出错，记录日志
            $ret = FALSE;
        } else {
            $ret = $this->commonDb->affected_rows();
        }
        return $ret;
    }
    
    public function getControlList() {
        $this->getConn();
        $sql = "SELECT * FROM pms_node group by cont order by cont,func";
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
    
    public function getAuthList($roleId) {
        $this->getConn();
        $sql = "SELECT node_id FROM pms_auth where role_id=" . $roleId;
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
    
    public function delAllAuth($roleId) {
        $this->getConn();
        $this->commonDb->where('role_id', $roleId);
        $result = $this->commonDb->delete('pms_auth');
        return $result;
    }
    
    public function batchInsertAuth($data) {
        $this->getConn();
        $result = $this->commonDb->insert_batch('pms_auth', $data);
        return $result;
    }
}
