<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spec extends MY_Controller {

    public function specList() {
        $this->load->model('backend/productSpec');
        $list = $this->productSpec->getSpecList();
        
        $specId = array();
        foreach($list as $l) {
           $specId[] = $l['spec_id'];
        }
        $valueList = $this->productSpec->getSpecValueNameList($specId);
        
        foreach($list as $k=>$l) {
            $valueName = array();
            foreach($valueList as $v) {
                if ($v['spec_id'] == $l['spec_id']) {
                    $valueName[] = $v['name'];
                }
            }
            $list[$k]['value_name'] = implode('、', $valueName);
        }
        
        $data = array(
            'list' => $list,
        );
        
        $this->load->view('spec/specList.php', $data);
    }
    
    public function editSpec() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productSpec');
        $info = $this->productSpec->getSpecInfo($id);
        
        $valueList = $this->productSpec->getSpecValueNameList($id);
        
        $data = array(
            'info' => $info,
            'value_list' => $valueList,
        );
        
        $this->load->view('spec/editSpec', $data);
    }
    
    public function editSpecDo() {
        $this->form_validation->set_rules('spec_id', 'spec_id', 'required');
        $this->form_validation->set_rules('spec_name', 'spec_name', 'required');
//        $this->form_validation->set_rules('is_delete', 'is_delete', 'required');
        $this->form_validation->set_rules('remark', 'remark', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $specId = $this->input->post('spec_id');
            $data = array(
                'name' => $this->input->post('spec_name'),
//                'is_delete' => $this->input->post('is_delete'),
                'remark' => $this->input->post('remark'),
                'update_time' => time(),
            );

            $this->load->model('backend/productSpec');
            $result = $this->productSpec->editSpecInfo($specId, $data);
            
            if ($result) {
                if (!empty($this->input->post('value_name'))) {
                    $values = array();
                    foreach($this->input->post('spec_value_id') as $k=>$v) {
                        $specValueId = $v;
                        $values = array(
                            'name' => $this->input->post('value_name')[$k],
                            'update_time' => time(),
                        );
                        $this->productSpec->editSpecValueInfo($specValueId, $values);
                    }
                }
                    
                if (!empty($this->input->post('spec_value_name'))) {
                    foreach($this->input->post('spec_value_name') as $name) {
                        if (!empty($name)) {
                            $newValues[] = array(
                                'spec_id' => $specId,
                                'name' => $name,
                                'add_time' => time(),
                                'update_time' => time(),
                            );
                        }
                    }
                    $this->productSpec->insertSpecValuesToDb($newValues);
                }
                
                successRedirct('backend/spec/specList', "编辑成功！");
            } else {
                errorRedirct('', "编辑失败！");
            }
        }
    }

    public function addSpec() {
        $this->load->view('spec/addSpec');
    }
    
    public function addSpecDo() {
        $this->form_validation->set_rules('spec_name', 'spec_name', 'required');
//        $this->form_validation->set_rules('is_delete', 'is_delete', 'required');
        $this->form_validation->set_rules('remark', 'remark', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'name' => $this->input->post('spec_name'),
//                'is_delete' => $this->input->post('is_delete'),
                'remark' => $this->input->post('remark'),
                'add_time' => time(),
                'update_time' => time(),
            );

            $this->load->model('backend/productSpec');
            $result = $this->productSpec->addSpecToDb($data);
            
            if ($result) {
                if (!empty($this->input->post('value_name'))) {
                    $values = array();
                    foreach($this->input->post('value_name') as $v) {
                        if (!empty($v)) {
                            $values[] = array(
                                'spec_id' => $result,
                                'name' => $v,
                                'add_time' => time(),
                                'update_time' => time(),
                            );
                        }
                    }
                    $res = $this->productSpec->insertSpecValuesToDb($values);
                    if ($res) {
                        successRedirct('backend/spec/specList', "添加成功！");
                    } else {
                        errorRedirct('backend/spec/specList', "添加失败！");
                    }
                } else {
                    successRedirct('backend/spec/specList', "添加成功！");
                }
            } else {
                errorRedirct('', "添加失败！");
            }
        }
    }
    
    public function delSpec() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productSpec');
        $result = $this->productSpec->delSpec($id);
        if ($result) {
            successRedirct('', "删除成功！");
        } else {
            errorRedirct('', "删除失败！");
        }
    }
}
