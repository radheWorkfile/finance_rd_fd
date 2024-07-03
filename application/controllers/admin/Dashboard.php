<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Common_model');
        ($this->session->userdata('user_cate') != 1) ? redirect(base_url(), 'refresh') : '';
        error_reporting(0);
    }

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['breadcrumb'] = 'Dashboard';
        $data['member'] = $this->Admin_Common_model->count_all('member');
        $data['total_payment'] = $this->Admin_Common_model->sum_all('amount', 'rd_payment_details');
        $data['today_payment'] = $this->Admin_Common_model->sum_all('amount', 'rd_payment_details', array('pay_date' => date('Y-m-d')));
        // $data['apprv_user'] = $this->Admin_Common_model->count_all('registration',array('status'=>1));
        // $data['pndng_user'] = $this->Admin_Common_model->count_all('registration',array('status'=>0));
        // $data['reject_project'] = $this->Admin_Common_model->count_all('project',array('status'=>2));
        // $data['pending_project'] = $this->Admin_Common_model->count_all('project',array('status'=>3));
        // $data['franchisee'] = $this->Admin_Common_model->count_all('franchisee',array('status'=>1));
        // $data['product'] = $this->Admin_Common_model->count_all('product',array('status'=>1));
        // $data['project_amt'] = $this->Admin_Common_model->sum_all('advance_amount','project',array('status'=>1));
        // $data['project_details'] = $this->Admin_Common_model->get_data_limit();
        $this->load->view('admin/dashboard', $data);
    }
}

?>