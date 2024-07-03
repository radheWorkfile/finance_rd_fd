<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_Common_model');
        $this->load->model('user/User_Register_model');
    }
    function chageStatus()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
           
            //print_r($data);die;
            $this->User_Common_model->chageStatus($data);
            echo ($data['status'] == 1) ? "
            <a style='color:green' href='javascript:void()'onClick='return changeStatus(\"" . $data['id'] . "\",\"0\",\"" . $data['table'] . "\",\"" . $data['loader'] . "\")'title='click to block user'><b><i class='fa fa-check'></i> </b></a>" : "
            <a style='color:red'   href='javascript:void()'onClick='return changeStatus(\"" . $data['id'] . "\",\"1\",\"" . $data['table'] . "\",\"" . $data['loader'] . "\")'title='click to active user'><b><i class='fa fa-times'></i></b></a>";
        }
    }
    
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['breadcrumb'] = 'Profile';
        $data['menu_chk']=$this->User_Common_model->get_menu();
        $id = $this->session->userdata('user_id');
        $data['users'] = $this->User_Register_model->get_prof($id);
        $data['caste'] = $this->User_Register_model->get_data_with_condition('caste', array('map' => 0, 'caste_type' => 1, 'status' => 1));
        $data['subcaste'] = $this->User_Register_model->get_subcaste();
        $data['state'] = $this->User_Register_model->get_data_with_condition('location', array('map' => 0, 'location_type' => 1, 'status' => 1));
        $data['ruldistrict'] = $this->User_Register_model->get_data_with_condition('rural', array('map' => 0, 'rural_type' => 1, 'status' => 1));
        $data['urbdistrict'] = $this->User_Register_model->get_data_with_condition('urban', array('map' => 0, 'urban_type' => 1, 'status' => 1));
        $data['sectr'] = $this->User_Register_model->get_all_sector();
        $data['bussns'] = $this->User_Register_model->get_all_business();
        $data['industers'] = $this->User_Register_model->get_industeries();
        $data['ruldata'] = $this->User_Register_model->rural_data();
        $data['urbdata'] = $this->User_Register_model->urban_data();
        $data['distr'] = $this->User_Register_model->get_district();
        $data['police'] = $this->User_Register_model->get_police();
        $data['block'] = $this->User_Register_model->get_block();
        $data['post'] = $this->User_Register_model->get_post();
        $data['pin'] = $this->User_Register_model->get_pin();
        // print_r($data['users']);die; 
        $this->load->view('user/profile/profile', $data);
    }

    public function update_profile()
    {
        if($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('nm','Name','required');
            $this->form_validation->set_rules('fnm','Father Name','required');
            $this->form_validation->set_rules('dob','Date Of Birth','required');
            $this->form_validation->set_rules('caste','Caste','required');
            if (isset($_POST["sub-caste"])) {
                $this->form_validation->set_rules('sub-caste','Sub Caste','required');
            }
            $this->form_validation->set_rules('mobile','Mobile No.','required');
            $this->form_validation->set_rules('mail','Email Id.','required');
            $this->form_validation->set_rules('tvillage','Temporary Village/City','required');
            $this->form_validation->set_rules('tbulding','Temporary Building/House No.','required');
            $this->form_validation->set_rules('tstate','Temporary State','required');
            if (isset($_POST["tdistric"])) { 
             $this->form_validation->set_rules('tdistric','Temporary District','required');
            }
            if (isset($_POST["tpolice"])) { 
             $this->form_validation->set_rules('tpolice','Temporary Police Station','required');
            }
            if (isset($_POST['tblock'])){
             $this->form_validation->set_rules('tblock','Temporary Block Office','required');
            }
            if (isset($_POST['tpost'])){
             $this->form_validation->set_rules('tpost','Temporary Post Office','required');
            }
            if (isset($_POST['tpin'])){
             $this->form_validation->set_rules('tpin','Temporary Pin Code','required');
            }
            $this->form_validation->set_rules('pvillage','Permanent Village/City','required');
            $this->form_validation->set_rules('pbulding','Permanent Building/House No.','required');
            $this->form_validation->set_rules('pstate','Permanent State','required');
            if (isset($_POST['pdistric'])){
             $this->form_validation->set_rules('pdistric','Permanent District','required');
            }
            if (isset($_POST['ppolice'])){
             $this->form_validation->set_rules('ppolice','Permanent Police Station','required');
            }
            if (isset($_POST['pblock'])){
             $this->form_validation->set_rules('pblock','Permanent Block Office','required');
            }
            if (isset($_POST['ppost'])){
             $this->form_validation->set_rules('ppost','Permanent Post Office','required');
            }
            if (isset($_POST['ppin'])){
             $this->form_validation->set_rules('ppin','Permanent Pin Code','required');
            }

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

            if (isset($_POST['industries'])) {
                $val['industries']            =  $value['industries'];
            }
            
            if($value['area_type'] == 1) {   
                
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
            $this->User_Register_model->update_data_register($val);

            $valu = array(
                'registration_id' => $value['id'],
                'admin_type' => 2,
                'email' => $value['mail'],
                'name' => $value['nm'],
                'dob' => $value['dob'],
            );
            // print_r($valu);die;
           
            $this->User_Register_model->update_data($valu);
            $data = array('text' => 'Record Updated Successfully', 'icon' => 'success');
        } else {
            $msg = array(
                'nm'              => form_error('nm'),
                'fnm'             => form_error('fnm'),
                'dob'             => form_error('dob'),
                'caste'           => form_error('caste'),
                'sub-caste'       => form_error('sub-caste'),
                'mobile'          => form_error('mobile'),
                'mail'            =>  form_error('mail'),
                'tvillage'        => form_error('tvillage'),
                'tbulding'        => form_error('tbulding'),
                'tstate'          => form_error('tstate'),
                'tdistric'        => form_error('tdistric'),
                'tpolice'         => form_error('tpolice'),
                'tblock'          => form_error('tblock'),
                'tpost'           => form_error('tpost'),
                'tpin'            => form_error('tpin'),
                'pvillage'        => form_error('pvillage'),
                'pbulding'        => form_error('pbulding'),
                'pstate'          => form_error('pstate'),
                'pdistric'        => form_error('pdistric'),
                'ppolice'         => form_error('ppolice'),
                'pblock'          => form_error('pblock'),
                'ppost'           => form_error('ppost'),
                'ppin'            => form_error('ppin')
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
        }
    }
    public function update_pic()
    {
        $filename = "business(" . $this->input->post('user_id') . ")";
        $config['upload_path']          = './uploads/business/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $msg = array('error' => $this->upload->display_errors());
            $data = array('text' => $msg, 'icon' => "error");
        } else {
            $img_data = $this->upload->data();
            $img = base_url('uploads/business/' . $img_data['raw_name'] . $img_data['file_ext']);
            $val = array('id' => $this->input->post('id'), 'photo' => $img);
            //print_r($val);die;
            $this->User_Register_model->update_photo($val);
            //echo $this->db->last_query();die;
            $data = array('text' => "Picture Updated Successfully !", 'icon' => "success");
        }

        echo json_encode($data);
    }

}
?>
