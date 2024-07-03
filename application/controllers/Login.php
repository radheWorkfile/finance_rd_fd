<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        error_reporting(0);
    }
    
    public function index()
    {
        $user_cate = $this->session->userdata('user_cate');
        if ($user_cate == 1) {
            redirect('' . base_url() . 'admin/dashboard', 'refresh');
        } elseif ($user_cate == 3) {
            redirect('' . base_url() . 'associate/dashboard', 'refresh'); 
        } else {
            $this->logout();
        }
    }
    
    function auth()
    {
        $this->form_validation->set_rules('email_id', 'E-mail Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            // print_r($data);die;
            $result =  $this->login_model->can_login($data['email_id'], $data['password']);
            // print_r($result);die;

            $count =  count($result);
            if ($count === 1) {
                $system_configs =   $this->login_model->system_config();
                $insert_log = $this->setUserLog($result[0]['email'],$result[0]['admin_type']);
                $session_id = $this->session->userdata('session_id');
                $sessiondata = array(
                    '_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                    '_USER_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
                    '_USER_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
                    '_USER_ACCEPT_LANG' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
                    '_USER_LOOSE_IP' => long2ip(ip2long($_SERVER['REMOTE_ADDR']) & ip2long("255.255.0.0")),
                    'REPO_SESSION' => TRUE,
                    'SESSION_START_TIME' => time(),
                    '_USER_LAST_ACTIVITY' => time(),
                    'user_id' => $result[0]['id'],
                    'user_ids' => $result[0]['user_id'],
                    'name' => $result[0]['name'],
                    'email' => $result[0]['email'],
                    'join_date' => $result[0]['reg_date'],
                    'user_cate' => $result[0]['admin_type'],
                    'registration_id' => $result[0]['registration_id'],
                    'photo' => $result[0]['photo'],
                    'company_name' => $system_configs[0]['company_name'],
                    'company_address' => $system_configs[0]['company_address'],
                    'prefix_emp' => $system_configs[0]['prefix_emp'],
                    'prefix_fran' => $system_configs[0]['prefix_fran'],
                    'company_url' => $system_configs[0]['company_url'],
                    'system_session_timeout' => $system_configs[0]['session_timeout'],
                    'system_inactive_timeout' => $system_configs[0]['inactive_timeout'],
                    'system_max_filesize' => $system_configs[0]['max_file_size'],
                    'system_allowed_file_types' => $system_configs[0]['allowed_file_types'],
                    'system_error_reporting' => $system_configs[0]['error_reporting'],
                    'is_logged_in' => true
                );
                $this->session->set_userdata($sessiondata);
                if ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 1)) {
                    redirect('' . base_url() . 'admin/dashboard', 'refresh');
                } elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 2)) {
                    //echo "welcome Employee";die;
                    redirect('' . base_url() . 'user/dashboard', 'refresh');
                }else {
                    //$this->session->set_flashdata('message', 'Invalid Login!!');
                    redirect(base_url() . 'login?msg=invalid');
                }
            } else {
                //$this->session->set_flashdata('message','invalid Login!!');
                redirect(base_url() . 'login?msg=invalid');
            }
        } else {
            $this->index();
        }
    }

    function auth_web()
    {
        $this->form_validation->set_rules('email_id', 'E-mail Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            // print_r($data);die;
            $result =  $this->login_model->can_login($data['email_id'], $data['password']);
            // print_r($result);die;

            $count =  count($result);
            if ($count === 1) {
                $system_configs =   $this->login_model->system_config();
                $insert_log = $this->setUserLog($result[0]['email'],$result[0]['department_type']);
                $session_id = $this->session->userdata('session_id');
                $sessiondata = array(
                    '_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                    '_USER_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
                    '_USER_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
                    '_USER_ACCEPT_LANG' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
                    '_USER_LOOSE_IP' => long2ip(ip2long($_SERVER['REMOTE_ADDR']) & ip2long("255.255.0.0")),
                    'REPO_SESSION' => TRUE,
                    'SESSION_START_TIME' => time(),
                    '_USER_LAST_ACTIVITY' => time(),
                    'user_id' => $result[0]['id'],
                    'user_ids' => $result[0]['user_id'],
                    'name' => $result[0]['name'],
                    'email' => $result[0]['email'],
                    'join_date' => $result[0]['reg_date'],
                    'user_cate' => $result[0]['admin_type'],
                    'photo' => $result[0]['photo'],
                    'company_name' => $system_configs[0]['company_name'],
                    'company_address' => $system_configs[0]['company_address'],
                    'prefix_emp' => $system_configs[0]['prefix_emp'],
                    'prefix_fran' => $system_configs[0]['prefix_fran'],
                    'company_url' => $system_configs[0]['company_url'],
                    'system_session_timeout' => $system_configs[0]['session_timeout'],
                    'system_inactive_timeout' => $system_configs[0]['inactive_timeout'],
                    'system_max_filesize' => $system_configs[0]['max_file_size'],
                    'system_allowed_file_types' => $system_configs[0]['allowed_file_types'],
                    'system_error_reporting' => $system_configs[0]['error_reporting'],
                    'is_logged_in' => true
                );
                $this->session->set_userdata($sessiondata);
                if ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 2)) {
                    redirect('' . base_url() . 'user/dashboard', 'refresh');
                } elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 3)) {
                    redirect('' . base_url() . 'associate/dashboard', 'refresh');
                } else {
                    //$this->session->set_flashdata('message', 'Invalid Login!!');
                    redirect(base_url() . 'site/index');
                }
            } else {
                //$this->session->set_flashdata('message','invalid Login!!');
                redirect(base_url() . 'site/index');
            }
        } else {
            redirect(base_url() . 'site/login');
        }
    }
    
    function logout()
    {
        //$this->login_model->insert_logout($this->session->userdata('insert_log'));
        $this->session->sess_destroy();
        //echo "logout Success!!";
        //$this->index();
        $this->load->view('auth/login');
    }


    function login_access($id)
    {
        if ($this->session->userdata('user_cate') == 1) {
            $result =  $this->login_model->login_access($id);
            $count =  count($result);
            //print_r($result);die;
            if ($count === 1) {
                $system_configs =   $this->login_model->system_config();
                $insert_log = $this->setUserLog($result[0]['email'],$result[0]['department_type']);
                $session_id = $this->session->userdata('session_id');
                $sessiondata = array(
                    '_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                    '_USER_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
                    '_USER_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
                    '_USER_ACCEPT_LANG' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
                    '_USER_LOOSE_IP' => long2ip(ip2long($_SERVER['REMOTE_ADDR']) & ip2long("255.255.0.0")),
                    'REPO_SESSION' => TRUE,
                    'SESSION_START_TIME' => time(),
                    '_USER_LAST_ACTIVITY' => time(),
                    'user_id' => $result[0]['id'],
                    'user_ids' => $result[0]['user_id'],
                    'name' => $result[0]['name'],
                    'email' => $result[0]['email'],
                    'join_date' => $result[0]['reg_date'],
                    'user_cate' => $result[0]['admin_type'],
                    'photo' => $result[0]['photo'],
                    'company_name' => $system_configs[0]['company_name'],
                    'company_address' => $system_configs[0]['company_address'],
                    'company_url' => $system_configs[0]['company_url'],
                    'prefix_emp' => $system_configs[0]['prefix_emp'],
                    'prefix_fran' => $system_configs[0]['prefix_fran'],
                    'system_session_timeout' => $system_configs[0]['session_timeout'],
                    'system_inactive_timeout' => $system_configs[0]['inactive_timeout'],
                    'system_max_filesize' => $system_configs[0]['max_file_size'],
                    'system_allowed_file_types' => $system_configs[0]['allowed_file_types'],
                    'system_error_reporting' => $system_configs[0]['error_reporting'],
                    'is_logged_in' => true
                );
                $this->session->set_userdata($sessiondata);
                if ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 1)) {
                    redirect('' . base_url() . 'admin/dashboard', 'refresh');
                } elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 2)) {
                    //echo "welcome Employee";die;
                    redirect('' . base_url() . 'user/dashboard', 'refresh');
                } elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 3)) {
                    redirect('' . base_url() . 'organization/dashboard', 'refresh');
                } else {
                    //$this->session->set_flashdata('message', 'Invalid Login!!');
                    redirect(base_url() . 'login?msg=invalid');
                }
            } else {
                //$this->session->set_flashdata('message','invalid Login!!');
                redirect(base_url() . 'login?msg=invalid');
            }
        }else{
            $this->index();

        }
    }

    public function setUserLog($username, $role)
    {
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
        $data = array(
            'user' => $username,
            'role' => $role,
            'ipaddress' => $this->input->ip_address(),
            'user_agent' => $agent . ", " . $this->agent->platform(),
        );
        //echo"<pre>";print_r($data);die;
        $this->login_model->log_add($data);
    }
}
