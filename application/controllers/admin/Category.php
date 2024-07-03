<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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

    public function location()
    {
        $data['title'] = 'Create Location';
        $data['breadcrumb'] = 'Create Location';
        $data['vdistrict'] = $this->Admin_Location_model->view_district();
        $data['vpolice'] = $this->Admin_Location_model->view_police();
        $data['vblock'] = $this->Admin_Location_model->view_block();
        $data['vpost'] = $this->Admin_Location_model->view_post();
        $data['vpin'] = $this->Admin_Location_model->view_pin();
        $data['state'] = $this->Admin_Location_model->get_state();
        $this->load->view('admin/location/add_location', $data);
    }

    public function get_state()
    {
        $val = $this->input->post('id');
        $data = $this->Admin_Location_model->get_data($val);
        echo json_encode($data);
    }

    public function get_district()
    {
        $val = $this->input->post('id');
        $data = $this->Admin_Location_model->get_district($val);
        echo json_encode($data);
    }

    public function get_block()
    {
        $val = $this->input->post('id');
        $data = $this->Admin_Location_model->get_data($val);
        echo json_encode($data);
    }

    public function get_post()
    {
        $val = $this->input->post('id');
        $data = $this->Admin_Location_model->get_post($val);
        echo json_encode($data);
    }

    public function add_location()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('location_type', 'Location Type', 'required');
            if ($this->input->post('location_type') == 1) {
                $this->form_validation->set_rules('state', 'State', 'required');
            } elseif ($this->input->post('location_type') == 2) {
                $this->form_validation->set_rules('state_drp', 'State', 'required');
                $this->form_validation->set_rules('district', 'District', 'required');
            } elseif ($this->input->post('location_type') == 3) {
                $this->form_validation->set_rules('state_drp', 'State', 'required');
                $this->form_validation->set_rules('district_drp', 'District', 'required');
                $this->form_validation->set_rules('police_station', 'Police Station', 'required');
            } elseif ($this->input->post('location_type') == 4) {
                $this->form_validation->set_rules('state_drp', 'State', 'required');
                $this->form_validation->set_rules('district_drp', 'District', 'required');
                $this->form_validation->set_rules('block_office', 'Block Office', 'required');
            } else if ($this->input->post('location_type') == 5) {
                $this->form_validation->set_rules('state_drp', 'State', 'required');
                $this->form_validation->set_rules('district_drp', 'District', 'required');
                $this->form_validation->set_rules('post_office', 'Post Office', 'required');
            } else if ($this->input->post('location_type') == 6) {
                $this->form_validation->set_rules('state_drp', 'State', 'required');
                $this->form_validation->set_rules('district_drp', 'District', 'required');
                $this->form_validation->set_rules('post_drp', 'Post Office', 'required');
                $this->form_validation->set_rules('pin_code', 'Pin Code', 'required');
            }

            if ($this->form_validation->run() == TRUE) {

                if ($this->input->post('location_type') == 1) {
                    $val = array(
                        'location_type' => $this->input->post('location_type'),
                        'location' => $this->input->post('state'),
                        'map' => 0,
                        'created_at' => date('Y-m-d')
                    );
                } elseif ($this->input->post('location_type') == 2) {
                    $val = array(
                        'location_type' => $this->input->post('location_type'),
                        'location' => $this->input->post('district'),
                        'map' => $this->input->post('state_drp'),
                        'created_at' => date('Y-m-d')
                    );
                } elseif ($this->input->post('location_type') == 3) {
                    $val = array(
                        'location_type' => $this->input->post('location_type'),
                        'location' => $this->input->post('police_station'),
                        'map' => $this->input->post('district_drp'),
                        'created_at' => date('Y-m-d')
                    );
                } elseif ($this->input->post('location_type') == 4) {
                    $val = array(
                        'location_type' => $this->input->post('location_type'),
                        'location' => $this->input->post('block_office'),
                        'map' => $this->input->post('district_drp'),
                        'created_at' => date('Y-m-d')
                    );
                } else if ($this->input->post('location_type') == 5) {
                    $val = array(
                        'location_type' => $this->input->post('location_type'),
                        'location' => $this->input->post('post_office'),
                        'map' => $this->input->post('district_drp'),
                        'created_at' => date('Y-m-d')
                    );
                } else if ($this->input->post('location_type') == 6) {
                    $val = array(
                        'location_type' => $this->input->post('location_type'),
                        'location' => $this->input->post('pin_code'),
                        'map' => $this->input->post('post_drp'),
                        'created_at' => date('Y-m-d')
                    );
                }

                // print_r($val);
                // die;
                $this->Admin_Location_model->save_location($val);
                $data = array('text' => 'New Location Added Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'location_type' => form_error('location_type'),
                    'state' => form_error('state'),
                    'state_drp' => form_error('state_drp'),
                    'district' => form_error('district'),
                    'district_drp' => form_error('district_drp'),
                    'police_station' => form_error('police_station'),
                    'police_drp' => form_error('police_drp'),
                    'block_office' => form_error('block_office'),
                    'block_drp' => form_error('block_drp'),
                    'post_office' => form_error('post_office'),
                    'post_drp' => form_error('post_drp'),
                    'pin_code' => form_error('pin_code')
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }


    /*============================================= RD Plan Section ==========================================*/

    public function rd_plan()
    {
        $data['title'] = 'Create RD Plan';
        $data['breadcrumb'] = 'Create RD Plan';
        $data['plan'] = $this->Admin_Rd_Plan_model->get_all_data();
        $this->load->view('admin/rd_plan/create_rd_plan', $data);
    }

    public function add_rd_plan()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('interval', 'Interval', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('plan_type', 'Plan Type', 'required');
        if($post['plan_type'] == 1){
            $interest = $post['fixed_amt'];
            $this->form_validation->set_rules('fixed_amt', 'Fixed Amount', 'required');
        }elseif($post['plan_type'] == 2){
            $interest = $post['interest_percent'];
            $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');
        }
        if ($this->form_validation->run()) {

            $rd = array(
                'plan_name'                 => $post['plan_name'],
                'plan_type'                 => $post['plan_type'],
                'duration'                  => $post['duration'],
                'interval'                  => $post['interval'],
                'amount'                    => $post['amount'],
                'remark'                    => $post['remark'],
                'created_at'                => date('Y-m-d'),
                'interest_percent'          => $interest,
                'created_by_user_type_id'   => $this->session->userdata('user_id'),
            );
            $this->Admin_Rd_Plan_model->insert_data($rd);
            $data = array('text' => 'New RD PLan Added Successfully', 'icon' => 'success');
        } else {
            $msg = array(
                'plan_name'         => form_error('plan_name'),
                'plan_type'         => form_error('plan_type'),
                'duration'          => form_error('duration'),
                'interval'          => form_error('interval'),
                'amount'            => form_error('amount'),
                'fixed_amt'         => form_error('fixed_amt'),
                'interest_percent'  => form_error('interest_percent'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }

    public function update_rd_plan()
    {
        if ($this->input->is_ajax_request()) {
            $r_pln = $this->input->post();
            $data['uprd'] = $this->Admin_Rd_Plan_model->get_data($r_pln['id']);
            $this->load->view('admin/rd_plan/update_rd_plan', $data);
        }
    }

    public function update_rd_plan_data()
    {
        if ($this->input->is_ajax_request()) {

            $post = $this->input->post();
            $this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('plan_type', 'Plan Type', 'required');
            if($post['plan_type'] == 1){
                $interest = $post['fixed_amt'];
                $this->form_validation->set_rules('fixed_amt', 'Fixed Amount', 'required');
            }elseif($post['plan_type'] == 2){
                $interest = $post['interest_percent'];
                $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');
            }

            if ($this->form_validation->run()) {

                $up_rd = array(
                    'id' => $this->input->post('id'),
                    'plan_name'                 => $post['plan_name'],
                    'plan_type'                 => $post['plan_type'],
                    'duration'                  => $post['duration'],
                    'interval'                  => $post['interval'],
                    'amount'                    => $post['amount'],
                    'remark'                    => $post['remark'],
                    'interest_percent'          => $interest,
                );
                $this->Admin_Rd_Plan_model->update_data($up_rd);
                $data = array('text' => 'Rd Plan Data Updated Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'plan_name'         => form_error('plan_name'),
                    'plan_type'         => form_error('plan_type'),
                    'duration'          => form_error('duration'),
                    'interval'          => form_error('interval'),
                    'amount'            => form_error('amount'),
                    'fixed_amt'         => form_error('fixed_amt'),
                    'interest_percent'  => form_error('interest_percent'),
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }

    /*============================================= FD Plan Section ==========================================*/

    public function fd_plan()
    {
        $data['title'] = 'Create FD Plan';
        $data['breadcrumb'] = 'Create FD Plan';
        $data['plan'] = $this->Admin_Fd_Plan_model->get_all_data();
        $this->load->view('admin/fd_plan/create_fd_plan', $data);
    }

    public function add_fd_plan()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('interval', 'Interval', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('plan_type', 'Plan Type', 'required');
        if($post['plan_type'] == 1){
            $interest = $post['fixed_amt'];
            $this->form_validation->set_rules('fixed_amt', 'Fixed Amount', 'required');
        }elseif($post['plan_type'] == 2){
            $interest = $post['interest_percent'];
            $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');
        }
        if ($this->form_validation->run()) {

            $rd = array(
                'plan_name'                 => $post['plan_name'],
                'plan_type'                 => $post['plan_type'],
                'duration'                  => $post['duration'],
                'interval'                  => $post['interval'],
                'amount'                    => $post['amount'],
                'remark'                    => $post['remark'],
                'created_at'                => date('Y-m-d'),
                'interest_percent'          => $interest,
                'created_by_user_type_id'   => $this->session->userdata('user_id'),
            );
            $this->Admin_Fd_Plan_model->insert_data($rd);
            $data = array('text' => 'New RD PLan Added Successfully', 'icon' => 'success');
        } else {
            $msg = array(
                'plan_name'         => form_error('plan_name'),
                'plan_type'         => form_error('plan_type'),
                'duration'          => form_error('duration'),
                'interval'          => form_error('interval'),
                'amount'            => form_error('amount'),
                'fixed_amt'         => form_error('fixed_amt'),
                'interest_percent'  => form_error('interest_percent'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }

    public function update_fd_plan()
    {
        if ($this->input->is_ajax_request()) {
            $r_pln = $this->input->post();
            $data['uprd'] = $this->Admin_Fd_Plan_model->get_data($r_pln['id']);
            // echo $this->db->last_query();
            $this->load->view('admin/fd_plan/update_fd_plan', $data);
        }
    }

    public function update_fd_plan_data()
    {

        if ($this->input->is_ajax_request()) {

            $post = $this->input->post();
            $this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('plan_type', 'Plan Type', 'required');
            if($post['plan_type'] == 1){
                $interest = $post['fixed_amt'];
                $this->form_validation->set_rules('fixed_amt', 'Fixed Amount', 'required');
            }elseif($post['plan_type'] == 2){
                $interest = $post['interest_percent'];
                $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');
            }

            if ($this->form_validation->run()) {

                $up_rd = array(
                    'id' => $this->input->post('id'),
                    'plan_name'                 => $post['plan_name'],
                    'plan_type'                 => $post['plan_type'],
                    'duration'                  => $post['duration'],
                    'interval'                  => $post['interval'],
                    'amount'                    => $post['amount'],
                    'remark'                    => $post['remark'],
                    'interest_percent'          => $interest,
                );
                $this->Admin_Fd_Plan_model->update_data($up_rd);
                $data = array('text' => 'Rd Plan Data Updated Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'plan_name'         => form_error('plan_name'),
                    'plan_type'         => form_error('plan_type'),
                    'duration'          => form_error('duration'),
                    'interval'          => form_error('interval'),
                    'amount'            => form_error('amount'),
                    'fixed_amt'         => form_error('fixed_amt'),
                    'interest_percent'  => form_error('interest_percent'),
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }

}

?>