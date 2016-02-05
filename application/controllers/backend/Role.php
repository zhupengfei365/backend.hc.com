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


}
