<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Common_model');
        $this->load->model('Admin_Member_model');
    }
    function chageStatus()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            //print_r($data);die;
            $this->Admin_Common_model->chageStatus($data);
            echo ($data['status'] == 1) ? "
            <a style='color:green' href='javascript:void()'onClick='return changeStatus(\"" . $data['id'] . "\",\"0\",\"" . $data['table'] . "\",\"" . $data['loader'] . "\")'title='click to block user'><b><i class='fa fa-check'></i> </b></a>" : "
            <a style='color:red'   href='javascript:void()'onClick='return changeStatus(\"" . $data['id'] . "\",\"1\",\"" . $data['table'] . "\",\"" . $data['loader'] . "\")'title='click to active user'><b><i class='fa fa-times'></i></b></a>";
        }
    }
    
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['breadcrumb'] = 'Profile';
        $id = $this->session->userdata('user_id');
        $data['users'] = $this->Admin_Register_model->get_prof($id);
        $data['caste'] = $this->Admin_Register_model->get_data_with_condition('caste', array('map' => 0, 'caste_type' => 1, 'status' => 1));
        $data['subcaste'] = $this->Admin_Register_model->get_subcaste();
        $data['state'] = $this->Admin_Register_model->get_data_with_condition('location', array('map' => 0, 'location_type' => 1, 'status' => 1));
        $data['ruldistrict'] = $this->Admin_Register_model->get_data_with_condition('rural', array('map' => 0, 'rural_type' => 1, 'status' => 1));
        $data['urbdistrict'] = $this->Admin_Register_model->get_data_with_condition('urban', array('map' => 0, 'urban_type' => 1, 'status' => 1));
        $data['sectr'] = $this->Admin_Register_model->get_all_sector();
        $data['bussns'] = $this->Admin_Register_model->get_all_business();
        $data['industers'] = $this->Admin_Register_model->get_industeries();
        $data['ruldata'] = $this->Admin_Register_model->rural_data();
        $data['urbdata'] = $this->Admin_Register_model->urban_data();
        $data['distr'] = $this->Admin_Register_model->get_district();
        $data['police'] = $this->Admin_Register_model->get_police();
        $data['block'] = $this->Admin_Register_model->get_block();
        $data['post'] = $this->Admin_Register_model->get_post();
        $data['pin'] = $this->Admin_Register_model->get_pin();
        // print_r($data['users']);die;
        $this->load->view('admin/profile/profile', $data);
    }

    public function update_profile()
    {
        if($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('nm', 'Name', 'required');
            $this->form_validation->set_rules('fnm', 'Father Name', 'required');
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
            $this->form_validation->set_rules('mail', 'Email Id', 'required');
    
            if ($this->form_validation->run() == TRUE) {
    
                $value = $this->input->post();
    
                $val = array(
                'id'                    => $value['id'],
                'name'                  =>  $value['nm'],
                'father_name'           =>  $value['fnm'],
                'grand_father'          =>  $value['gfnm'],
                'dob'                   =>  $value['dob'],
                'caste'                 =>  $value['caste'],
                'sub-caste'             =>  $value['sub-caste'],
                'community'             =>  $value['community'],
                'mobile'                =>  $value['mobile'],
                'mail'                  =>  $value['mail'],
                'tvillage'              =>  $value['tvillage'],
                'tbulding'              =>  $value['tbulding'],
                'tlandmark'             =>  $value['tlandmark'],
                'tstate'                =>  $value['tstate'],
                'tdistric'              =>  $value['tdistric'],
                'tpolice'               =>  $value['tpolice'],
                'tblock'                =>  $value['tblock'],
                'tpost'                 =>  $value['tpost'],
                'tpin'                  =>  $value['tpin'],
                'pvillage'              =>  $value['pvillage'],
                'pbulding'              =>  $value['pbulding'],
                'plandmark'             =>  $value['plandmark'],
                'pstate'                =>  $value['pstate'],
                'pdistric'              =>  $value['pdistric'],
                'ppolice'               =>  $value['ppolice'],
                'pblock'                =>  $value['pblock'],
                'ppost'                 =>  $value['ppost'],
                'ppin'                  =>  $value['ppin'],
                'sector'                =>  $value['sector'],
                'business_type'         =>  $value['business_type'],
                'business_name'         =>  $value['business_name'],
                'registration_number'   =>  $value['registration_number'],
                'registration_address'  =>  $value['registration_address'],
                'email'                 =>  $value['email'],
                'contact_no'            =>  $value['contact_no'],
                'city'                  =>  $value['city'],
                'legal_gst'             =>  $value['legal_gst'],
                'legal_gst_no'          =>  $value['legal_gst_no'],
                'legal_itr_file'        =>  $value['legal_itr_file'],
                'legal_filling_itr'     =>  $value['legal_filling_itr'],
                'legal_last_year_turnover' =>  $value['legal_last_year_turnover'],
                'legal_firm_name'       =>  $value['legal_firm_name'],
                'legal_ca_name'         =>  $value['legal_ca_name'],
                'legal_ca_mobile_no'    =>  $value['legal_ca_mobile_no'],
                'area_type'             =>  $value['area_type'],
                'voter_id'              =>  empty($value['voter_id'])?' ':$value['voter_id'],
                'created_at'            =>  date('Y-m-d'),
                'created_by_user_type_id' => $this->session->userdata('user_id')
                );
                if (isset($_POST['industries'])){
                    $val['industries']            =  $value['industries'];
                }
                
                if($value['area_type'] == 1){   
                    
                    $val['rural_distric']         =  empty($value['rural_distric'])?' ':$value['rural_distric'];
                    $val['rural_block']           =  $value['rural_block'];
                    $val['rural_cons']            =  $value['rural_cons'];
                    $val['rural_panchyat']        =  $value['rural_panchyat'];
                    $val['rural_polling_num']     =  $value['rural_polling_num'];
                    $val['rural_polling_nm']      =  $value['rural_polling_nm'];
                
                } elseif($value['area_type'] == 2){
    
                    $val['urban_district']       =  empty($value['urban_district'])?' ':$value['urban_district'];
                    $val['urban_assembly']       =  $value['urban_assembly'];
                    $val['urban_muncipal_cor']   =  $value['urban_muncipal_cor'];
                    $val['urban_ward_no']        =  $value['urban_ward_no'];
                    $val['urban_ward_coun']      =  $value['urban_ward_coun'];
                    $val['urban_house_no']       =  $value['urban_house_no'];
                    $val['urban_polling_nm']     =  $value['urban_polling_nm'];
                    $val['urban_polling_num']    =  $value['urban_polling_num'];
                }
                $this->Admin_Register_model->update_data_register($val);
    
                $valu = array(
                'registration_id' => $value['id'],
                'admin_type'      => 1,
                'email'           => $value['mail'],
                'name'            => $value['nm'],
                'dob'             => $value['dob'],
                );
                // print_r($valu);die;
               
                $this->Admin_Register_model->update_data($valu);
                $data = array('text' => 'Record Updated Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'nm'        => form_error('nm'),
                    'fnm'       => form_error('fnm'),
                    'dob'       => form_error('dob'),
                    'mobile'    => form_error('mobile'),
                    'mail'      => form_error('mail'),
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
            }
    }    
}
