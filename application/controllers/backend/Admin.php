<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function userList() {
        $this->load->model('backend/adminUser');
        $userList = $this->adminUser->getUserList();
        $data = array(
            'list' => $userList,
        );
        $this->load->view('admin/userList', $data);
    }


}
