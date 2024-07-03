<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Member_model');
        $this->load->model('Admin_Common_model');
        $this->load->helper(array('form', 'url'));
    }

    public function add_member()
    {
        $data['title'] = 'New Member';
        $data['breadcrumb'] = 'New Member';
        $data['agent'] = $this->Admin_Member_model->get_all_agent();
        $data['state'] = $this->Admin_Member_model->get_data_with_condition('location', array('map' => 0, 'location_type' => 1, 'status' => 1));
        $this->load->view('admin/member/add_member', $data);
    }

    function get_distric()
    {
        if ($this->input->is_ajax_request()) {
            $state = $this->input->post('state');
            $data = $this->Admin_Member_model->get_data_with_condition('location', array('map' => $state, 'location_type' => 2, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_police()
    {
        if ($this->input->is_ajax_request()) {
            $distric = $this->input->post('distric');
            $data = $this->Admin_Member_model->get_data_with_condition('location', array('map' => $distric, 'location_type' => 3, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_block()
    {
        if ($this->input->is_ajax_request()) {
            $distric = $this->input->post('distric');
            $data = $this->Admin_Member_model->get_data_with_condition('location', array('map' => $distric, 'location_type' => 4, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_post()
    {
        if ($this->input->is_ajax_request()) {
            $distric = $this->input->post('distric');
            $data = $this->Admin_Member_model->get_data_with_condition('location', array('map' => $distric, 'location_type' => 5, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_pin()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post('post');
            $data = $this->Admin_Member_model->get_data_with_condition('location', array('map' => $post, 'location_type' => 6, 'status' => 1));
            echo json_encode($data);
        }
    }

    public function member_datas()
    {

        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nm', 'Name', 'required');
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
            if ($this->form_validation->run() == TRUE) {
                $value = $this->input->post();
                $pan_img = ' ';
                $identity_proof_img = ' ';
                $signature_proof_img = ' ';
                $address_proof_img = ' ';
                $bank_statement_img = ' ';
                $config['upload_path'] = './uploads/kyc_details/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1024;
                $config['max_width'] = 2000;
                $config['max_height'] = 2000;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('pan_img')) {

                    $msg = array('error' => $this->upload->display_errors());
                    $data = array('text' => $msg, 'icon' => "error");

                } else {

                    $img_data = $this->upload->data();
                    $pan_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);

                }

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('identity_proof_img')) {

                    $msg = array('error' => $this->upload->display_errors());
                    $data = array('text' => $msg, 'icon' => "error");

                } else {

                    $img_data = $this->upload->data();
                    $identity_proof_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);

                }

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('signature_proof_img')) {

                    $msg = array('error' => $this->upload->display_errors());
                    $data = array('text' => $msg, 'icon' => "error");

                } else {

                    $img_data = $this->upload->data();
                    $signature_proof_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);

                }

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('address_proof_img')) {

                    $msg = array('error' => $this->upload->display_errors());
                    $data = array('text' => $msg, 'icon' => "error");

                } else {

                    $img_data = $this->upload->data();
                    $address_proof_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);

                }

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('bank_statement_img')) {

                    $msg = array('error' => $this->upload->display_errors());
                    $data = array('text' => $msg, 'icon' => "error");

                } else {

                    $img_data = $this->upload->data();
                    $bank_statement_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);

                }

                $pass = rand(pow(10, 6 - 1), pow(10, 6) - 1);
                $user_id = rand(pow(10, 6 - 1), pow(10, 6) - 1);
                $loan_no = rand(pow(8, 8 - 1), pow(6, 5) - 1);
                $rd_no = rand(pow(9, 9 - 2), pow(8, 4) - 3);
                $fd_no = rand(pow(10, 7 - 2), pow(6, 4) - 3);
                $val = array(

                    'user_id'                   => $user_id,
                    'agent'                     => $value['agent'],
                    'name'                      => $value['nm'],
                    'father_name'               => !empty($value['fnm'])? $value['fnm'] : "N/A",
                    'nominee_name'              => !empty($value['nominee'])? $value['nominee'] : "N/A",
                    'relation'                  => !empty($value['relation'])? $value['relation'] : "N/A",
                    'dob'                       => !empty($value['dob'])? $value['dob'] : "N/A",
                    'mobile'                    => !empty($value['mobile'])? $value['mobile'] : "N/A",
                    'mail'                      => !empty($value['mail'])? $value['mail'] : "N/A",
                    'pan_img'                   => !empty($pan_img) ? $pan_img : "N/A",
                    'pan_no'                    => !empty($value['pan_no'])? $value['pan_no'] : "N/A",
                    'identity_proof_img'        => !empty($identity_proof_img) ? $identity_proof_img : "N/A",
                    'id_proof_no'               => !empty($value['id_proof_no'])? $value['id_proof_no'] : "N/A",
                    'signature_proof_img'       => !empty($signature_proof_img) ? $signature_proof_img : "N/A",
                    'address_proof_img'         => !empty($address_proof_img) ? $address_proof_img : "N/A",
                    'bank_statement_img'        => !empty($bank_statement_img) ? $bank_statement_img : "N/A",
                    'password'                  => !empty($pass) ? $pass : "N/A",
                    'loan_no'                   => !empty($loan_no) ? $loan_no : "N/A",
                    'rd_no'                     => !empty($rd_no) ? $rd_no : "N/A",
                    'fd_no'                     => !empty($fd_no) ? $fd_no : "N/A",
                    'temporary_address'         => !empty($value['temporary_address']) ? $value['temporary_address'] : 'N/A',
                    'temporary_state'           => !empty($value['temporary_state']) ? $value['temporary_state'] : 'N/A',
                    'temporary_pin'             => !empty($value['temporary_pin']) ? $value['temporary_pin'] : 'N/A',
                    'permanent_address'         => !empty($value['permanent_address']) ? $value['permanent_address'] : 'N/A',
                    'permanent_state'           => !empty($value['permanent_state']) ? $value['permanent_state'] : 'N/A',
                    'permanent_pin'             => !empty($value['permanent_pin']) ? $value['permanent_pin'] : 'N/A',
                    'created_at'                => date('Y-m-d'),
                    'status'                    => 1,
                    'created_by_user_type_id'   => $this->session->userdata('user_id'),

                );

                $this->Admin_Member_model->save_data('member', $val);
                $gd = $this->Admin_Member_model->get_reg_id($value);

                // $valu = array(
                //     'member_id' => $gd['id'],
                //     'admin_type' => 2,
                //     'email' => $value['mail'],
                //     'password' => md5($pass),
                //     'name' => $value['nm'],
                //     'dob' => $value['dob'],
                //     'status' => 1,
                //     'created_by_user_type_id' => $this->session->userdata('user_id'),
                // );

                // $this->Admin_Member_model->save_data('users', $valu);
                $data = array('text' => 'New Member Created Successfully', 'icon' => 'success');
                //     } else {
                //         $msg = array('Opps ! Mobile Number is Already Exists !');
                //         $data = array('text' => $msg, 'icon' => 'error');
                //     }
                // } else {
                //     $msg = array('Opps ! Email is Already Exists !');
                //     $data = array('text' => $msg, 'icon' => 'error');
                // }
            } else {
                $msg = array(
                    'nm' => form_error('nm'),
                    'dob' => form_error('dob'),
                    // 'id_proof_no' => form_error('id_proof_no'),
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }

    public function manage_member()
    {

        $data['title'] = 'Manage Member';
        $data['breadcrumb'] = 'Manage Member';
        $this->load->view('admin/member/manage_member', $data);

    }

    public function all_member_data()
    {

        $post_data = $this->input->post();
        $record = $this->Admin_Member_model->all_member_data($post_data);
        $i = $post_data['start'] + 1;

        $return['data'] = array();
        foreach ($record as $row) {

            $view = '<a href="javascript:void(0);" data-toggle="modal" data-target="#view_member_modal"
            onclick="view_member(' . $row->id . ')" title="Click to View RD Data Details"><i class="fas fa-eye text-success"></i></a>&emsp;
            <a href="javascript:void(0);" data-toggle="modal" data-target="#update_member_modal"
            onclick="update_member(' . $row->id . ')" title="Click to Update RD Data Details"><i class="fas fa-edit"></i></a>&emsp;';
            
            $status = ($row->status == 1) ? 
            '<a style="color:green" href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'0\',\'member\',\'admin/common/chageStatus\')" title="Click to Di-Active RD Details Data"><b><i class="fa fa-check"></i> </b></a>&emsp;'
            :
            '<a style="color:red"  href="javascript:void()"  onClick="return changeStatus(\'' . $row->id . '\',\'1\',\'member\',\'admin/common/chageStatus\')" title="Click to Active RD Details Data "><b><i class="fa fa-times"></i> </b></a>&emsp;';

            $return['data'][] = array(

                $i++,
                $row->user_id,
                $row->name,
                $row->mobile,
                $row->mail,
                $view . "&emsp; <span id='" . $row->id . "'>" . $status,

            );
        }

        $return['recordsTotal'] = $this->Admin_Member_model->total_count();
        $return['recordsFiltered'] = $this->Admin_Member_model->total_filter_count($post_data);
        $return['draw'] = $post_data['draw'];
        echo json_encode($return);

    }

    public function View_member()
    {

        if ($this->input->is_ajax_request()) {
            $value = $this->input->post();
            $data['viewmember'] = $this->Admin_Member_model->get_all_data($value['id']);
            $this->load->view('admin/member/member_view', $data);
        }

    }

    public function update_member()
    {
        if ($this->input->is_ajax_request()) {
            $upmemb = $this->input->post();
            $data['upmembr'] = $this->Admin_Member_model->get_all_data($upmemb['id']);
            $data['state'] = $this->Admin_Member_model->get_data_with_condition('location', array('map' => 0, 'location_type' => 1, 'status' => 1));
            $data['distr'] = $this->Admin_Member_model->get_district();
            $data['police'] = $this->Admin_Member_model->get_police();
            $data['block'] = $this->Admin_Member_model->get_block();
            $data['post'] = $this->Admin_Member_model->get_post();
            $data['pin'] = $this->Admin_Member_model->get_pin();
            $data['agent'] = $this->Admin_Member_model->get_all_agent();
            $this->load->view('admin/member/member_update', $data);
        }
    }

    public function update_member_data()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nm','Name','required');
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
            $this->form_validation->set_rules('id_proof_no', 'Identity Proof Number ', 'required');

            if ($this->form_validation->run()) {

                $value = $this->input->post();
                $upmember = array(
                    'id'                => !empty($value['id']) ? $value['id'] : "N/A",
                    'agent'             => !empty($value['agent']) ? $value['agent'] : "N/A",
                    'name'              => !empty($value['nm']) ? $value['nm'] : "N/A",
                    'father_name'       => !empty($value['fnm']) ? $value['fnm'] : "N/A",
                    'nominee_name'      => !empty($value['nominee']) ? $value['nominee'] : "N/A",
                    'relation'          => !empty($value['relation']) ? $value['relation'] : "N/A",
                    'dob'               => !empty($value['dob']) ? $value['dob'] : "N/A",
                    'mobile'            => !empty($value['mobile']) ? $value['mobile'] : "N/A",
                    'mail'              => !empty($value['mail']) ? $value['mail'] : "N/A",
                    'pan_no'            => !empty($value['pan_no']) ? $value['pan_no'] : "N/A",
                    'id_proof_no'       => !empty($value['id_proof_no']) ? $value['id_proof_no'] : "N/A",
                    'temporary_address' => !empty($value['temporary_address']) ? $value['temporary_address'] : 'N/A',
                    'temporary_state'   => !empty($value['temporary_state']) ? $value['temporary_state'] : 'N/A',
                    'temporary_pin'     => !empty($value['temporary_pin']) ? $value['temporary_pin'] : 'N/A',
                    'permanent_address' => !empty($value['permanent_address']) ? $value['permanent_address'] : 'N/A',
                    'permanent_state'   => !empty($value['permanent_state']) ? $value['permanent_state'] : 'N/A',
                    'permanent_pin'     => !empty($value['permanent_pin']) ? $value['permanent_pin'] : 'N/A',
                );
                $this->Admin_Member_model->update_data_member($upmember);
                $data = array('text' => 'Member Data Updated Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'nm'          => form_error('nm'),
                    'dob'           => form_error('dob'),
                    'id_proof_no'   => form_error('id_proof_no'),
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }

    public function update_pan_img()
    {
        $config['upload_path'] = './uploads/kyc_details/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pan_img')) {
            $msg = array('error' => $this->upload->display_errors());
            $data = array('text' => $msg, 'icon' => "error");
        } else {
            $img_data = $this->upload->data();
            $pan_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);
            $val = array('id' => $this->input->post('id'), 'pan_img' => $pan_img);
            //print_r($val);die;
            $this->Admin_Member_model->update_pan_img($val);
            //echo $this->db->last_query();die;
            $data = array('text' => "Picture Updated Successfully !", 'icon' => "success");
        }

        echo json_encode($data);
    }

    public function update_identity_proof_img()
    {
        $config['upload_path'] = './uploads/kyc_details/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('identity_proof_img')) {
            $msg = array('error' => $this->upload->display_errors());
            $data = array('text' => $msg, 'icon' => "error");
        } else {
            $img_data = $this->upload->data();
            $identity_proof_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);
            $val = array('id' => $this->input->post('id'), 'identity_proof_img' => $identity_proof_img);
            //print_r($val);die;
            $this->Admin_Member_model->update_identity_proof_img($val);
            //echo $this->db->last_query();die;
            $data = array('text' => "Picture Updated Successfully !", 'icon' => "success");
        }

        echo json_encode($data);
    }

    public function update_signature_proof_img()
    {
        $config['upload_path'] = './uploads/kyc_details/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('signature_proof_img')) {
            $msg = array('error' => $this->upload->display_errors());
            $data = array('text' => $msg, 'icon' => "error");
        } else {
            $img_data = $this->upload->data();
            $signature_proof_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);
            $val = array('id' => $this->input->post('id'), 'signature_proof_img' => $signature_proof_img);
            //print_r($val);die;
            $this->Admin_Member_model->update_signature_proof_img($val);
            //echo $this->db->last_query();die;
            $data = array('text' => "Picture Updated Successfully !", 'icon' => "success");
        }

        echo json_encode($data);
    }

    public function update_address_proof_img()
    {
        $config['upload_path'] = './uploads/kyc_details/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('address_proof_img')) {
            $msg = array('error' => $this->upload->display_errors());
            $data = array('text' => $msg, 'icon' => "error");
        } else {
            $img_data = $this->upload->data();
            $address_proof_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);
            $val = array('id' => $this->input->post('id'), 'address_proof_img' => $address_proof_img);
            //print_r($val);die;
            $this->Admin_Member_model->update_address_proof_img($val);
            //echo $this->db->last_query();die;
            $data = array('text' => "Picture Updated Successfully !", 'icon' => "success");
        }

        echo json_encode($data);
    }

    public function update_bank_statement_img()
    {
        $config['upload_path'] = './uploads/kyc_details/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bank_statement_img')) {
            $msg = array('error' => $this->upload->display_errors());
            $data = array('text' => $msg, 'icon' => "error");
        } else {
            $img_data = $this->upload->data();
            $bank_statement_img = base_url('uploads/kyc_details/' . $img_data['raw_name'] . $img_data['file_ext']);
            $val = array('id' => $this->input->post('id'), 'bank_statement_img' => $bank_statement_img);
            //print_r($val);die;
            $this->Admin_Member_model->update_bank_statement_img($val);
            //echo $this->db->last_query();die;
            $data = array('text' => "Picture Updated Successfully !", 'icon' => "success");
        }

        echo json_encode($data);
    }

}
?>