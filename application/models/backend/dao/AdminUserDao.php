<?php

require_once (APPPATH . '/models/dao/commonDao.php');

class AdminUserDao extends CommonDao {

    protected $table = 'pms_user';
    protected $fields = array(
        'user_id',
        'user_name',
        'email',
        'phone',
        'password',
        'real_name',
        'status',
        'user_desc',
        'role_id',
        'last_ip',
        'last_time',
        'last_url',
        'add_time',
        'update_time',
    );
    protected $primaryKey = 'user_id';

    public function getFields() {
        return $this->fields;
    }

    public function getUserByName($name) {
        $ret = array();
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('user_name', $name);
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
    
    public function getUserById($userId) {
        $ret = array();
        $this->getConn();
        $this->commonDb->select('*');
        $this->commonDb->from($this->table);
        $this->commonDb->where('user_id', $userId);
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
    
    public function updateOneUserInfo($userId, $fields) {
        $this->getConn();
        return $this->updateOneRecord($userId, $fields);
    }
    
    public function getUserList() {
        $this->getConn();
        $sql = "select * from pms_user pu inner join pms_role pr on pr.id=pu.role_id";
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
