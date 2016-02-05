<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    /**
     * _admin
     * 保存当前登录用户的信息
     *
     * @var object
     * @access  public
     * */
    public $_admin = NULL;

    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct() {
        parent::__construct();
        $this->checkLogin();
//        $this->load->library('acl');
//        $this->load->library('plugin_manager');
    }

    // ------------------------------------------------------------------------

    /**
     * 检查用户是否登录
     *
     * @access  protected
     * @return  void
     */
    protected function checkLogin() {
        if (empty($this->session->userdata('userId'))) {
            $allowUrlArr = array(
                'backend/user/login',
                'backend/user/dologin',
                'backend/user/logout'
            );
            if (!in_array($this->uri->uri_string, $allowUrlArr)) {
                errorRedirct($this->config->item('rbac_auth_gateway'), "请先登录！");
            }
        } else {
            
        }
    }

    // ------------------------------------------------------------------------

    /**
     * 加载视图
     *
     * @access  protected
     * @param   string
     * @param   array
     * @return  void
     */
    protected function _template($template, $data = array()) {
        $data['tpl'] = $template;
        $this->load->view('sys_entry', $data);
    }

    // ------------------------------------------------------------------------

    /**
     * 检查权限
     *
     * @access  protected
     * @param   string
     * @return  void
     */
    protected function _check_permit($action = '', $folder = '') {
        if (!$this->acl->permit($action, $folder)) {
            $this->_message('对不起，你没有访问这里的权限！', '', FALSE);
        }
    }

}
