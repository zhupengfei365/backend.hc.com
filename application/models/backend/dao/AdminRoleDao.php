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
}
