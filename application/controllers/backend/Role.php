<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {

    public function nodeList() {
        $this->load->model('backend/adminRole');
        $nodeList = $this->adminRole->getNodeList();
        $data = array(
            'list' => $nodeList,
        );
        $this->load->view('role/nodeList', $data);
    }

    public function addNode() {
        $this->load->view('role/addNode');
    }
    
    public function addNodeDo() {
        $this->form_validation->set_rules('dirc', 'dirc', 'required');
        $this->form_validation->set_rules('cont', 'cont', 'required');
        $this->form_validation->set_rules('func', 'func', 'required');
        $this->form_validation->set_rules('memo', 'memo', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'dirc' => $this->input->post('dirc'),
                'cont' => $this->input->post('cont'),
                'func' => $this->input->post('func'),
                'memo' => $this->input->post('memo'),
                'status' => $this->input->post('status'),
            );

            $this->load->model('backend/adminRole');
            $result = $this->adminRole->addNodeToDb($data);
            if ($result) {
                successRedirct('backend/role/nodeList', "添加成功！");
            } else {
                errorRedirct('', "添加失败！");
            }
        }
    }
    
    public function editNode() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/adminRole');
        $info = $this->adminRole->getNodeInfo($id);
        $this->load->view('role/editNode', $info);
    }
    
    public function editNodeDo() {
        $this->form_validation->set_rules('dirc', 'dirc', 'required');
        $this->form_validation->set_rules('cont', 'cont', 'required');
        $this->form_validation->set_rules('func', 'func', 'required');
        $this->form_validation->set_rules('memo', 'memo', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $id = $this->input->post('id');
            $data = array(
                'dirc' => $this->input->post('dirc'),
                'cont' => $this->input->post('cont'),
                'func' => $this->input->post('func'),
                'memo' => $this->input->post('memo'),
                'status' => $this->input->post('status'),
            );

            $this->load->model('backend/adminRole');
            $result = $this->adminRole->editNodeInfo($id, $data);
            if ($result) {
                successRedirct('backend/role/nodeList', "修改成功！");
            } else {
                errorRedirct('', "修改失败！");
            }
        }
    }
    
    public function delNode() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/adminRole');
        $result = $this->adminRole->delNode($id);
        if ($result) {
            successRedirct('', "删除成功！");
        } else {
            errorRedirct('', "删除失败！");
        }
    }
    
    public function roleList() {
        $this->load->model('backend/adminRole');
        $roleList = $this->adminRole->getRoleList();
        $data = array(
            'list' => $roleList,
        );
        $this->load->view('role/roleList', $data);
    }
    
    public function addRole() {
        $this->load->view('role/addRole');
    }
    
    public function addRoleDo() {
        $this->form_validation->set_rules('rolename', 'rolename', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'rolename' => $this->input->post('rolename'),
                'status' => $this->input->post('status'),
            );

            $this->load->model('backend/adminRole');
            $result = $this->adminRole->addRoleToDb($data);
            if ($result) {
                successRedirct('backend/role/roleList', "添加成功！");
            } else {
                errorRedirct('', "添加失败！");
            }
        }
    }
    
    public function editRole() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空"); 
        }
        $this->load->model('backend/adminRole');
        $info = $this->adminRole->getRoleInfo($id);
        $this->load->view('role/editRole', $info);
    }
    
    public function editRoleDo() {
        $this->form_validation->set_rules('rolename', 'rolename', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $id = $this->input->post('id');
            if (empty($id)) {
                errorRedirct('', 'ID不能为空');
                die();
            }
            $data = array(
                'rolename' => $this->input->post('rolename'),
                'status' => $this->input->post('status'),
            );

            $this->load->model('backend/adminRole');
            $result = $this->adminRole->editRoleInfo($id, $data);
            if ($result) {
                successRedirct('backend/role/roleList', "修改成功！");
            } else {
                errorRedirct('', "修改失败！");
            }
        }
    }
    
    public function delRole() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/adminRole');
        $result = $this->adminRole->delRole($id);
        if ($result) {
            successRedirct('', "删除成功！");
        } else {
            errorRedirct('', "删除失败！");
        }
    }
    
    public function authList() {
        $roleId = $this->uri->segment(4);
        if (empty($roleId)) {
            errorRedirct('', "ID不能为空");
            die();
        }
        $this->load->model('backend/adminRole');
        $controlList = $this->adminRole->getControllerList();
        
        $nodeList = $this->adminRole->getNodeList();
        
        $roleList = $this->adminRole->getAuthList($roleId);
        $roleArr = array();
        foreach($roleList as $l) {
            $roleArr[] = $l['node_id'];
        }
        foreach($nodeList as $k=>$n) {
            if (in_array($n['id'], $roleArr)) {
                $nodeList[$k]['checked'] = true;
            } else {
                $nodeList[$k]['checked'] = false;
            }
        }
        foreach($controlList as &$c) {
            $c['child'] = array();
            foreach ($nodeList as $n) {
                if ($n['cont'] == $c['cont']) {
                    $c['child'][] = $n;
                }
            }
        }
        $data = array(
            'role_id' => $roleId,
            'data' => $controlList,
        );
        $this->load->view('role/authList', $data);
    }
    
    public function editAuthDo() {
        $nodeArr = $this->input->post('node_id');
        $roleId = $this->input->post('role_id');
        if (count($nodeArr) == 0) {
            errorRedirct('', "请选择授权节点");
            die();
        }
        $data = array();
        foreach($nodeArr as $node) {
           $data[] = array(
               'node_id' => $node,
               'role_id' => $roleId,
           ); 
        }
        $this->load->model('backend/adminRole');
        $roleList = $this->adminRole->getAuthList($roleId);
        if (count($roleList) > 0) {
            $this->adminRole->delAllAuth($roleId);
        }
        $insertResult = $this->adminRole->batchInsertAuth($data);
        if ($insertResult) {
            successRedirct('', "操作成功！");
        } else {
            errorRedirct('', "操作失败！");
        }
    }
}
