<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_Common_model');
        ($this->session->userdata('user_cate') != 2) ? redirect(base_url(), 'refresh') : '';
        error_reporting(0);
    }
    function index()
    {
        $data['title'] = 'Dashboard';
        $data['breadcrumb'] = 'Dashboard';
        $data['menu_chk']=$this->User_Common_model->get_menu();
        $data['ads'] = $this->User_Common_model->all_data();
        $data['fmly_mber'] = $this->User_Common_model->count_all('registration',array('created_by_user_type_id'=>$this->session->userdata('user_id')));
        $data['business'] = $this->User_Common_model->count_all('registration',array('sector'=>18));
        $data['sector'] = $this->User_Common_model->count_all('sector',array('status'=>1));
        $data['industeries'] = $this->User_Common_model->count_all('industeries',array('status'=>1));
        $this->load->view('user/dashboard', $data);
    }

    public function voter_search_data() {
        if($this->input->is_ajax_request()) {
            $voter = $this->input->post();
            $data['vtr_data'] = $this->User_Common_model->search_voter_details($voter);
            // print_r($data['vtr_data']);die;
            // echo $this->db->last_query();die;
            $this->load->view('user/filter_voter_data',$data);
        }
    }
}

?>