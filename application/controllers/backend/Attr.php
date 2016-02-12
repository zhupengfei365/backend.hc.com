<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attr extends MY_Controller {

    public function attrList() {
        $this->load->model('backend/productAttr');
        $list = $this->productAttr->getAttrList();
        
        $attrId = array();
        foreach($list as $l) {
           $attrId[] = $l['attr_id'];
        }
        $valueList = $this->productAttr->getAttrValueNameList($attrId);
        
        foreach($list as $k=>$l) {
            $valueName = array();
            foreach($valueList as $v) {
                if ($v['attr_id'] == $l['attr_id']) {
                    $valueName[] = $v['name'];
                }
            }
            $list[$k]['value_name'] = implode('、', $valueName);
        }
        
        $data = array(
            'list' => $list,
        );
        
        $this->load->view('attr/attrList.php', $data);
    }
    
    public function editAttr() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productAttr');
        $info = $this->productAttr->getAttrInfo($id);
        
        $valueList = $this->productAttr->getAttrValueNameList($id);
        
        $data = array(
            'info' => $info,
            'value_list' => $valueList,
        );
        
        $this->load->view('attr/editAttr', $data);
    }
    
    public function editAttrDo() {
//        var_dump($this->input->post());exit;
        
        $this->form_validation->set_rules('attr_id', 'attr_id', 'required');
        $this->form_validation->set_rules('attr_name', 'attr_name', 'required');
        $this->form_validation->set_rules('is_delete', 'is_delete', 'required');
        $this->form_validation->set_rules('field_type', 'field_type', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $attrId = $this->input->post('attr_id');
            $data = array(
                'name' => $this->input->post('attr_name'),
                'is_delete' => $this->input->post('is_delete'),
                'field_type' => $this->input->post('field_type'),
                'update_time' => time(),
            );

            $this->load->model('backend/productAttr');
            $result = $this->productAttr->editAttrInfo($attrId, $data);
            
            if ($result) {
                if (!empty($this->input->post('value_name'))) {
                    $values = array();
                    foreach($this->input->post('attr_value_id') as $k=>$v) {
                        $attrValueId = $v;
                        $values = array(
                            'name' => $this->input->post('value_name')[$k],
                            'update_time' => time(),
                        );
                        $this->productAttr->editAttrValueInfo($attrValueId, $values);
                    }
                }
                    
                if (!empty($this->input->post('attr_value_name'))) {
                    foreach($this->input->post('attr_value_name') as $name) {
                        $newValues[] = array(
                            'attr_id' => $attrId,
                            'name' => $name,
                            'add_time' => time(),
                            'update_time' => time(),
                        );
                        $this->productAttr->insertAttrValuesToDb($newValues);
                    }
                }
                
                successRedirct('backend/attr/attrList', "编辑成功！");
            } else {
                errorRedirct('', "编辑失败！");
            }
        }
    }

    public function addAttr() {
        $this->load->view('attr/addAttr');
    }
    
    public function addAttrDo() {
        $this->form_validation->set_rules('attr_name', 'attr_name', 'required');
        $this->form_validation->set_rules('is_delete', 'is_delete', 'required');
        $this->form_validation->set_rules('field_type', 'field_type', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'name' => $this->input->post('attr_name'),
                'is_delete' => $this->input->post('is_delete'),
                'field_type' => $this->input->post('field_type'),
                'add_time' => time(),
                'update_time' => time(),
            );

            $this->load->model('backend/productAttr');
            $result = $this->productAttr->addAttrToDb($data);
            
            if ($result) {
                if (!empty($this->input->post('value_name'))) {
                    $values = array();
                    foreach($this->input->post('value_name') as $v) {
                        $values[] = array(
                            'attr_id' => $result,
                            'name' => $v,
                            'add_time' => time(),
                            'update_time' => time(),
                        );
                    }
                    $res = $this->productAttr->insertAttrValuesToDb($values);
                    if ($res) {
                        successRedirct('backend/attr/attrList', "添加成功！");
                    } else {
                        errorRedirct('backend/attr/attrList', "添加失败！");
                    }
                } else {
                    successRedirct('backend/attr/attrList', "添加成功！");
                }
            } else {
                errorRedirct('', "添加失败！");
            }
        }
    }
    
    public function delAttr() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productAttr');
        $result = $this->productAttr->delAttr($id);
        if ($result) {
            successRedirct('', "删除成功！");
        } else {
            errorRedirct('', "删除失败！");
        }
    }
}
