<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Agent_model');
        $this->load->helper(array('form', 'url'));
    }

    public function add_agent()
    {

        $data['title'] = "Add Agent";
        $data['breadcrumb'] = "Add Agent";
        $this->load->view('admin/agent/add_agent', $data);
    }

    public function manage_agent()
    {

        $data['title'] = "Manage Agent";
        $data['breadcrumb'] = "Manage Agent";
        $data['agent'] = $this->Admin_Agent_model->all_agent_data();
        $this->load->view('admin/agent/manage_agent', $data);
    }

    public function add_agent_data()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile No.', 'required');
        $this->form_validation->set_rules('mail', 'Email Id', 'required');
        $this->form_validation->set_rules('address', 'Full Address', 'required');

        if ($this->form_validation->run() == TRUE) {


            $add = $this->input->post();
            $agt = $this->db->select('agent_id')->order_by("id", "DESC")->limit(1)->get('agent')->row_array();
            // $agent_id = rand(pow(8, 8 - 1), pow(6, 5) - 1);
            if (empty($agt)) {
                $agent_id = "000001";
            } else {
                $ag = (int) $agt['agent_id'] + 1;
                $agent_id = "00000" . $ag;
            }

            $agent = array(
                'agent_id' => $agent_id,
                'name' => $add['name'],
                'dob' => $add['dob'],
                'mobile' => $add['mobile'],
                'mail' => $add['mail'],
                'address' => $add['address'],
                'created_by_user_type_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d'),
            );
            $this->Admin_Agent_model->save_data($agent);
            $data = array('text' => 'Agent Data Added Successfully', 'icon' => 'success');
        } else {

            $msg = array(
                'name' => form_error('name'),
                'dob' => form_error('dob'),
                'mobile' => form_error('mobile'),
                'mail' => form_error('mail'),
                'address' => form_error('address'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }

    public function view_agent()
    {
        if ($this->input->is_ajax_request()) {

            $view = $this->input->post();
            $data['vw_agent'] = $this->Admin_Agent_model->get_agent_data($view['id']);
            $this->load->view('admin/agent/view_agent', $data);
        }
    }

    public function update_agent()
    {
        if ($this->input->is_ajax_request()) {

            $view = $this->input->post();
            $data['up_agent'] = $this->Admin_Agent_model->get_agent_data($view['id']);
            $this->load->view('admin/agent/update_agent', $data);
        }
    }

    public function update_agent_data()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile No.', 'required');
        $this->form_validation->set_rules('mail', 'Email Id', 'required');
        $this->form_validation->set_rules('address', 'Full Address', 'required');

        if ($this->form_validation->run() == TRUE) {


            $add = $this->input->post();

            $agent = array(
                'id' => $add['id'],
                'name' => $add['name'],
                'dob' => $add['dob'],
                'mobile' => $add['mobile'],
                'mail' => $add['mail'],
                'address' => $add['address'],
            );
            $this->Admin_Agent_model->update_data($agent);
            $data = array('text' => 'Agent Data Updated Successfully', 'icon' => 'success');
        } else {

            $msg = array(
                'name' => form_error('name'),
                'dob' => form_error('dob'),
                'mobile' => form_error('mobile'),
                'mail' => form_error('mail'),
                'address' => form_error('address'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }
}
?>