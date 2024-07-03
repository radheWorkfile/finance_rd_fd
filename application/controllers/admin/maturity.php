<?php
defined('BASEPATH') or exit('No direct script access allowed');

class maturity extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Location_model');
        $this->load->model('Admin_Common_model');
        $this->load->model('Admin_Rd_Plan_model');
        $this->load->model('Admin_Fd_Plan_model');
        $this->load->helper(array('form', 'url'));
    }

    /*============================================= Location Section ==========================================*/

    public function manage_maturity()
    {
       
        $data['title'] = "Maturity Section";
        $data['breadcrumb'] = "Maturity Section";
        $this->load->view('admin/maturity/manage_maturity',$data);
    }
}
?>