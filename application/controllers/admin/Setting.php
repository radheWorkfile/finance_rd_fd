<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Common_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Admin_Setting_model');
        ($this->session->userdata('user_cate') != 1) ? redirect(base_url(), 'refresh') : '';
        error_reporting(0);
    }

    /*=======================================Software Setting==============================================*/
    public function software_setting()
    {
        $data['title'] = 'Software Setting';
        $data['breadcrumb'] = 'Software Setting';
        $data['source'] = $this->Admin_Setting_model->get_setting();
        $this->load->view('admin/setting/software_setting', $data);
    }

    public function up_software_setting()
    {
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('company_url', 'Company Url', 'required');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required');


        if ($this->form_validation->run() == TRUE) {

            $company_logo=' ';
            $bill_header=' ';
            $watermark=' ';
            $config['upload_path']  =  './uploads/compny_images/';
            $config['allowed_types']  =  'gif|jpg|png|jpeg';
            $config['max_size']    =   10000;
            $config['max_width']   =  10000;
            $config['max_height']  = 10000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('company_logo')) {

                $msg = array('error' => $this->upload->display_errors());
                $data = array('text' => $msg, 'icon' => "error");

            } else {

                $img_data = $this->upload->data();
                $company_logo = 'uploads/compny_images/' . $img_data['raw_name'] . $img_data['file_ext'];
                
            }

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bill_header')) {

                $msg = array('error' => $this->upload->display_errors());
                $data = array('text' => $msg, 'icon' => "error");

            } else {

                $img_data = $this->upload->data();
                $bill_header = 'uploads/compny_images/' . $img_data['raw_name'] . $img_data['file_ext'];
                
            }

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('watermark')) {

                $msg = array('error' => $this->upload->display_errors());
                $data = array('text' => $msg, 'icon' => "error");

            } else {

                $img_data = $this->upload->data();
                $watermark = 'uploads/compny_images/' . $img_data['raw_name'] . $img_data['file_ext'];
                
            }

            $val = array(

                'id' => $this->input->post('id'),
                'company_name' => $this->input->post('company_name'),
                'company_url' => $this->input->post('company_url'),
                'company_address' => $this->input->post('company_address'),
                'company_logo'    =>  empty($company_logo) ? '' : $company_logo,
                'bill_header'    =>  empty($bill_header) ? '' : $bill_header,
                'watermark'    =>  empty($watermark) ? '' : $watermark,

            );
            //print_r($val);die;
            $this->Admin_Setting_model->update_software_data($val);
            $data = array('text' => "Software Setting Updated Successfully !", 'icon' => "success");
        } else {
            $msg = array(
                'company_name' => form_error('company_name'),
                'company_url' => form_error('company_url'),
                'company_address' => form_error('company_address'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }
}
