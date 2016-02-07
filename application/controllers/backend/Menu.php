<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

    public function menuList() {
        $this->load->model('backend/adminMenu');
        $pid = 0;
        $menuList = $this->adminMenu->getMenuByPid($pid);
        $idArr = array();
        foreach($menuList as $row) {
           $idArr[] = $row['id']; 
        }
        $pidStr = implode(',', $idArr);
        $sonMenuList = $this->adminMenu->getChildMenuByPid($pidStr);
        foreach ($menuList as $k=>$row) {
            foreach($sonMenuList as $sonRow) {
                if ($sonRow['p_id'] == $row['id']) {
                    $menuList[$k]['menu_son'][] = $sonRow;
                }
            }
        }
        $data['list'] = $menuList;
        $this->load->view('menu/menuList', $data);
    }
    
    public function editMenu() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/adminMenu');
        $info = $this->adminMenu->getMenuInfo($id);
        $pid = 0;
        $menuList = $this->adminMenu->getMenuByPid($pid);
        $this->load->model('backend/adminRole');
        $nodeList = $this->adminRole->getNodeList();
        $data = array(
            'menu_list' => $menuList,
            'data' => $info,
            'node_list' => $nodeList,
        );
        $this->load->view('menu/editMenu', $data);
    }

    public function editMenuDo() {
        $this->form_validation->set_rules('p_id', 'p_id', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('node_id', 'node_id', 'required');
        $this->form_validation->set_rules('sort', 'sort', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $id = $this->input->post('id');
            $data = array(
                'p_id' => $this->input->post('p_id'),
                'title' => $this->input->post('title'),
                'node_id' => $this->input->post('node_id'),
                'sort' => $this->input->post('sort'),
                'status' => $this->input->post('status'),
            );

            $this->load->model('backend/adminMenu');
            $result = $this->adminMenu->editMenuInfo($id, $data);
            if ($result) {
                successRedirct('backend/menu/menuList', "修改成功！");
            } else {
                errorRedirct('', "修改失败！");
            }
        }
    }
    
    public function addMenu() {
        $pid = $this->uri->segment(4);
        if (empty($pid)) {
            $data = array(
                'pid' => 0,
            );
           $this->load->view('menu/addMenu', $data);
        } else {
            $this->load->model('backend/adminMenu');
            $menuList = $this->adminMenu->getMenuByPid(0);
            $this->load->model('backend/adminRole');
            $nodeList = $this->adminRole->getNodeList();
            $data = array(
                'pid' => $pid,
                'menu_list' => $menuList,
                'node_list' => $nodeList,
            );
            $this->load->view('menu/addMenu', $data);
        }
    }
    
    public function addMenuDo() {
        $this->form_validation->set_rules('p_id', 'p_id', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('node_id', 'node_id', 'required');
        $this->form_validation->set_rules('sort', 'sort', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'p_id' => $this->input->post('p_id'),
                'title' => $this->input->post('title'),
                'node_id' => $this->input->post('node_id'),
                'sort' => $this->input->post('sort'),
                'status' => $this->input->post('status'),
            );

            $this->load->model('backend/adminMenu');
            $result = $this->adminMenu->addMenuToDb($data);
            if ($result) {
                successRedirct('backend/menu/menuList', "修改成功！");
            } else {
                errorRedirct('', "修改失败！");
            }
        }
    }
}
