<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    protected $imageTypeArr = array(
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
    );
    protected $imagePath = 'http://backend.hc.com/uploads/category/';

    public function cateList() {
        $this->load->model('backend/productCate');
        $list = $this->productCate->getCateList();
        
        $data = array(
            'list' => $list,
        );
        
        $this->load->view('category/cateList.php', $data);
    }
    
    public function editCate() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productCate');
        $info = $this->productCate->getCateInfo($id);
        // 获取父级分类列表
//        $parentCateList = $this->productCate->getCateListByPid(0);
        // 获取分类属性列表
        $cateAttrList = $this->productCate->getCateAttrListByCateId($id);
        // 获取属性列表
        $this->load->model('backend/productAttr');
        $attrList = $this->productAttr->getAttrList();
        
        foreach($attrList as $k=>$a) {
            $attrList[$k]['checked'] = false;
            $attrList[$k]['is_search'] = 0;
            $attrList[$k]['is_require'] = 0;
            $attrList[$k]['sort'] = 0;
            foreach($cateAttrList as $c) {
                if ($c['attr_id'] == $a['attr_id']) {
                    $attrList[$k]['checked'] = true;
                    if ($c['is_search']) {
                        $attrList[$k]['is_search'] = 1;
                    }
                    if ($c['is_require']) {
                        $attrList[$k]['is_require'] = 1;
                    }
                    if ($c['sort']) {
                        $attrList[$k]['sort'] = $c['sort'];
                    }
                }
            }
        }
        $cateIconInfo = array();
        if (!empty($info['icon'])) {
            $pinfo = pathinfo($info['icon']);  
            $ftype = $pinfo['extension'];
            $cateIconInfo[] = array(
                'name' => $info['icon'],
                'path' => $this->imagePath . $info['icon'],
                'type' => $this->imageTypeArr[$ftype],
                'id' => $id,
                'index' => 1,
            );
        }
        $mcateIconInfo = array();
        if (!empty($info['m_icon'])) {
            $pinfo = pathinfo($info['m_icon']);  
            $ftype = $pinfo['extension'];
            $mcateIconInfo[] = array(
                'name' => $info['icon'],
                'path' => $this->imagePath . $info['m_icon'],
                'type' => $this->imageTypeArr[$ftype],
                'id' => $id,
                'index' => 1,
            );
        }
        $data = array(
            'info' => $info,
//            'parent_cate' => $parentCateList,
            'attr_list' => $attrList,
            'cate_icon' => json_encode($cateIconInfo),
            'mcate_icon' => json_encode($mcateIconInfo),
        );
        
        $this->load->view('category/editCate', $data);
    }
    
    public function editCateDo() {
        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $cateId = $this->input->post('category_id');
            $data = array(
                'name' => $this->input->post('name'),
//                'parent_id' => $this->input->post('parent_id'),
                'name_alias' => $this->input->post('name_alias'),
                'description' => $this->input->post('description'),
                'icon' => $this->input->post('icon'),
                'm_icon' => $this->input->post('m_icon'),
                'is_show' => $this->input->post('is_show'),
                'show_in_nav' => $this->input->post('show_in_nav'),
                'sort' => $this->input->post('sort'),
                'update_time' => time(),
            );

            $this->load->model('backend/productCate');
            $result = $this->productCate->editCateInfo($cateId, $data);
            
            if ($result) {
                // 设置分类属性操作
                if (!empty($this->input->post('attr_id'))) {
                    $postAttrIdList = $this->input->post('attr_id');
                    // 获取该分类下所有属性列表,已删除的也要获取出来
                    $cateAttrList = $this->productCate->getCateAttrListByCateId($cateId, 2);
                    if (count($cateAttrList) > 0) {
                        $existAttrId = array();
                        foreach($cateAttrList as $cateInfo) {
                            $attrId = $cateInfo['attr_id'];
                            // 判断所查询到已存在的属性列表，是否在提交过来的属性列表中，有则更新，无则删除
                            if (in_array($attrId, $postAttrIdList)) {
                                $existAttrId[] = $attrId;
                                $attrIsSearch = !empty($this->input->post('status' . $attrId)) ? $this->input->post('status' . $attrId) : 0;
                                $attrSort = !empty($this->input->post('sort' . $attrId)) ? $this->input->post('sort' . $attrId) : 0;
                                $attrIsRequire = !empty($this->input->post('is_require' . $attrId)) ? $this->input->post('is_require' . $attrId) : 0;
                                // 判断提交的值和数据库中是否一致，不一致则更新
                                if ($cateInfo['is_delete'] == 1 || $cateInfo['is_search'] != $attrIsSearch || $cateInfo['sort'] != $attrSort || $cateInfo['is_require'] != $attrIsRequire) {
                                    $updateData = array(
                                        'is_delete' => 0,
                                        'is_search' => $attrIsSearch,
                                        'is_require' => $attrIsRequire,
                                        'sort' => $attrSort,
                                        'update_time' => time(),
                                    );
                                    $this->productCate->updateCateAttrInfoByCateAttrId($cateInfo['category_attr_id'], $updateData);
                                }
                            } else {
                                $deleteAttrId[] = $cateInfo['category_attr_id'];
                            }
                        }
                        // 没有在提交属性列表中的删除
                        if (!empty($deleteAttrId)) {
                            $this->productCate->delCateAttrByCateAttrId($deleteAttrId);
                        }
                        // 没有在已存在列表里的则插入
                        $diffAttrId = array_diff($postAttrIdList, $existAttrId);
                        if (!empty($diffAttrId)) {
                            foreach($postAttrIdList as $k=>$attrId) {
                                $attrIsSearch = !empty($this->input->post('status' . $attrId)) ? $this->input->post('status' . $attrId) : 0;
                                $attrSort = !empty($this->input->post('sort' . $attrId)) ? $this->input->post('sort' . $attrId) : 0;
                                $attrIsRequire = !empty($this->input->post('is_require' . $attrId)) ? $this->input->post('is_require' . $attrId) : 0;
                                $attrInsertData[] = array(
                                    'category_id' => $cateId,
                                    'attr_id' => $attrId,
                                    'is_require' => $attrIsRequire,
                                    'is_search' => $attrIsSearch,
                                    'sort' => $attrSort,
                                    'add_time' => time(),
                                    'update_time' => time(),
                                );
                            }
                            if (!empty($attrInsertData)) {
                                $this->productCate->insertCateAttrsToDb($attrInsertData);
                            }
                        }
                    } else {
                        foreach($postAttrIdList as $k=>$attrId) {
                            $attrIsSearch = !empty($this->input->post('status' . $attrId)) ? $this->input->post('status' . $attrId) : 0;
                            $attrSort = !empty($this->input->post('sort' . $attrId)) ? $this->input->post('sort' . $attrId) : 0;
                            $attrIsRequire = !empty($this->input->post('is_require' . $attrId)) ? $this->input->post('is_require' . $attrId) : 0;
                            $attrInsertData[] = array(
                                'category_id' => $cateId,
                                'attr_id' => $attrId,
                                'is_require' => $attrIsRequire,
                                'is_search' => $attrIsSearch,
                                'sort' => $attrSort,
                                'add_time' => time(),
                                'update_time' => time(),
                            );
                        }
                        if (!empty($attrInsertData)) {
                            $this->productCate->insertCateAttrsToDb($attrInsertData);
                        }
                    }
                    
                } else {
                    // 获取分类属性列表
                    $cateAttrList = $this->productCate->getCateAttrListByCateId($cateId);
                    if (count($cateAttrList) > 0) {
                        $this->productCate->delCateAttrByCateId($cateId);
                    }
                }
                
                successRedirct('backend/category/cateList', "编辑成功！");
            } else {
                errorRedirct('', "编辑失败！");
            }
        }
    }

    public function addCate() {
        $this->load->model('backend/productCate');
        // 获取属性列表
        $this->load->model('backend/productAttr');
        $attrList = $this->productAttr->getAttrList();
        
        $data = array(
            'attr_list' => $attrList
        );
        $this->load->view('category/addCate', $data);
    }
    
    public function addCateDo() {
        $this->form_validation->set_rules('name', 'name', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            errorRedirct('', '必要参数不能为空');
            die();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'name_alias' => $this->input->post('name_alias'),
                'description' => $this->input->post('description'),
                'icon' => $this->input->post('icon'),
                'm_icon' => $this->input->post('m_icon'),
                'is_show' => $this->input->post('is_show'),
                'show_in_nav' => $this->input->post('show_in_nav'),
                'sort' => $this->input->post('sort'),
                'add_time' => time(),
                'update_time' => time(),
            );

            $this->load->model('backend/productCate');
            $result = $this->productCate->addCateToDb($data);
            
            if ($result) {
                if (!empty($this->input->post('attr_id'))) {
                    $postAttrIdList = $this->input->post('attr_id');
                    foreach($postAttrIdList as $k=>$attrId) {
                        $attrIsSearch = !empty($this->input->post('status' . $attrId)) ? $this->input->post('status' . $attrId) : 0;
                        $attrSort = !empty($this->input->post('sort' . $attrId)) ? $this->input->post('sort' . $attrId) : 0;
                        $attrIsRequire = !empty($this->input->post('is_require' . $attrId)) ? $this->input->post('is_require' . $attrId) : 0;
                        $attrInsertData[] = array(
                            'category_id' => $result,
                            'attr_id' => $attrId,
                            'is_require' => $attrIsRequire,
                            'is_search' => $attrIsSearch,
                            'sort' => $attrSort,
                            'add_time' => time(),
                            'update_time' => time(),
                        );
                    }
                    if (!empty($attrInsertData)) {
                        $this->productCate->insertCateAttrsToDb($attrInsertData);
                    }
                    
                    successRedirct('backend/category/cateList', "添加成功！");
                } else {
                    successRedirct('backend/category/cateList', "添加成功！");
                }
            } else {
                errorRedirct('', "添加失败！");
            }
        }
    }
    
    public function delCate() {
        $id = $this->uri->segment(4);
        if (empty($id)) {
           errorRedirct('', "ID不能为空");
           die();
        }
        $this->load->model('backend/productCate');
        $result = $this->productCate->delCate($id);
        if ($result) {
            successRedirct('', "删除成功！");
        } else {
            errorRedirct('', "删除失败！");
        }
    }
}
