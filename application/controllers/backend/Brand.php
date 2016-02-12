<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Controller {

    public function brandList() {
        $this->load->model('backend/productBrand');
        $list = $this->productBrand->getBrandList();
        
        $data = array(
            'list' => $list,
        );
        
        $this->load->view('brand/brandList.php', $data);
    }
    
    public function editBrand() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productBrand');
        $info = $this->productBrand->getBrandInfo($id);
        
        $this->load->view('brand/editBrand', $info);
    }
    
    public function editBrandDo() {
        $this->form_validation->set_rules('brand_id', 'brand_id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('is_delete', 'is_delete', 'required');
        $this->form_validation->set_rules('is_show', 'is_show', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $brandId = $this->input->post('brand_id');
            $data = array(
                'name' => $this->input->post('name'),
                'aliases' => $this->input->post('aliases'),
                'info' => $this->input->post('info'),
                'link' => $this->input->post('link'),
                'breeding' => $this->input->post('breeding'),
                'production' => $this->input->post('production'),
                'is_show' => $this->input->post('is_show'),
                'sort' => $this->input->post('sort'),
                'is_delete' => $this->input->post('is_delete'),
                'update_time' => time(),
            );

            $this->load->model('backend/productBrand');
            $result = $this->productBrand->editBrandInfo($brandId, $data);
            
            if ($result) {
                successRedirct('backend/brand/brandList', "编辑成功！");
            } else {
                errorRedirct('', "编辑失败！");
            }
        }
    }

    public function addBrand() {
        $this->load->view('brand/addBrand');
    }
    
    public function addBrandDo() {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('is_delete', 'is_delete', 'required');
        $this->form_validation->set_rules('is_show', 'is_show', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'aliases' => $this->input->post('aliases'),
                'info' => $this->input->post('info'),
                'link' => $this->input->post('link'),
                'breeding' => $this->input->post('breeding'),
                'production' => $this->input->post('production'),
                'is_show' => $this->input->post('is_show'),
                'sort' => $this->input->post('sort'),
                'is_delete' => $this->input->post('is_delete'),
                'add_time' => time(),
                'update_time' => time(),
            );

            $this->load->model('backend/productBrand');
            $result = $this->productBrand->addBrandToDb($data);
            
            if ($result) {
                successRedirct('backend/brand/brandList', "添加成功！");
            } else {
                errorRedirct('', "添加失败！");
            }
        }
    }
    
    public function delBrand() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productBrand');
        $result = $this->productBrand->delBrand($id);
        if ($result) {
            successRedirct('', "删除成功！");
        } else {
            errorRedirct('', "删除失败！");
        }
    }
}
