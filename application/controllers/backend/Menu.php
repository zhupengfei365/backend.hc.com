<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

    public function menuList() {
        $list = $this->getMenuList();
        $data['list'] = $list;
        $this->load->view('manage/menu', $data);
    }

    /**
     * 获取菜单页
     * @param string $pid
     * @return array($id_list,$menu)
     */
    private function getMenuList($pid = 0) {
        $this->load->model('backend/adminMenu');
        $menuList = $this->adminMenu->getMenuByPid($pid);
        $idArr = array();
        foreach($menuList as $row) {
           $idArr[] = $row['id']; 
        }
        $sonMenuList = $this->adminMenu->getMenuByPid($idArr);
        foreach ($menuList as $k=>$row) {
            foreach($sonMenuList as $sonRow) {
                if ($sonRow['p_id'] == $row['id']) {
                    $menuList[$k]['menu_son'][] = $sonRow;
                }
            }
        }
        foreach ($menuList as $k=>$row) {
            if (empty($row['menu_son']) || count($row['menu_son']) == 0) {
                unset($menuList[$k]);
            }
        }
        return $menuList;
    }

}
