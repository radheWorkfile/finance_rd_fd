<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_Register_model');
        $this->load->model('user/User_Common_model');
        $this->load->model('Admin_Sector_model');
        $this->load->helper(array('form', 'url'));
    }

    public function add_register()
    {
        $data['title'] = 'New Register';
        $data['breadcrumb'] = 'New Register';
        $data['menu_chk']=$this->User_Common_model->get_menu();
        $data['caste'] = $this->User_Register_model->get_data_with_condition('caste', array('map' => 0, 'caste_type' => 1, 'status' => 1));
        $data['state'] = $this->User_Register_model->get_data_with_condition('location', array('map' => 0, 'location_type' => 1, 'status' => 1));
        $data['sector'] = $this->User_Register_model->get_all_sector();
        $data['district'] = $this->User_Register_model->get_data_with_condition('rural', array('map' => 0, 'rural_type' => 1, 'status' => 1));
        $data['dist'] = $this->User_Register_model->get_data_with_condition('urban', array('map' => 0, 'urban_type' => 1, 'status' => 1));
        $data['sector'] = $this->Admin_Sector_model->all_data();
        $this->load->view('user/register/add_register', $data);
    }

    function get_sub_caste()
    {
        if ($this->input->is_ajax_request()) {
            $caste = $this->input->post('caste');
            $data = $this->User_Register_model->get_data_with_condition('caste', array('map' => $caste, 'caste_type' => 2, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_distric()
    {
        if ($this->input->is_ajax_request()) {
            $state = $this->input->post('state');
            $data = $this->User_Register_model->get_data_with_condition('location', array('map' => $state, 'location_type' => 2, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_police()
    {
        if ($this->input->is_ajax_request()) {
            $distric = $this->input->post('distric');
            $data = $this->User_Register_model->get_data_with_condition('location', array('map' => $distric, 'location_type' => 3, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_block()
    {
        if ($this->input->is_ajax_request()) {
            $distric = $this->input->post('distric');
            $data = $this->User_Register_model->get_data_with_condition('location', array('map' => $distric, 'location_type' => 4, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_post()
    {
        if ($this->input->is_ajax_request()) {
            $distric = $this->input->post('distric');
            $data = $this->User_Register_model->get_data_with_condition('location', array('map' => $distric, 'location_type' => 5, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_pin()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post('post');
            $data = $this->User_Register_model->get_data_with_condition('location', array('map' => $post, 'location_type' => 6, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_industries()
    {
        if ($this->input->is_ajax_request()) {
            $sector = $this->input->post('sector');
            $data = $this->User_Register_model->get_data_with_condition('industeries', array('sector_name' => $sector, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_business_type()
    {
        if ($this->input->is_ajax_request()) {
            $sector = $this->input->post('sector');
            $data = $this->User_Register_model->get_data_with_condition('business', array('sector_name' => $sector, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_blocks()
    {
        if ($this->input->is_ajax_request()) {
            $dis = $this->input->post('dis');
            $data = $this->User_Register_model->get_data_with_condition('rural', array('map' => $dis, 'rural_type' => 2, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_const()
    {
        if ($this->input->is_ajax_request()) {
            $dis = $this->input->post('dis');
            $data = $this->User_Register_model->get_data_with_condition('rural', array('map' => $dis, 'rural_type' => 3, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_panchyat()
    {
        if ($this->input->is_ajax_request()) {
            $cons = $this->input->post('cons');
            $data = $this->User_Register_model->get_data_with_condition('rural', array('map' => $cons, 'rural_type' => 4, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_polling()
    {
        if ($this->input->is_ajax_request()) {
            $panch = $this->input->post('panch');
            $data = $this->User_Register_model->get_data_with_condition('rural', array('map' => $panch, 'rural_type' => 5, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_polling_name()
    {
        if ($this->input->is_ajax_request()) {
            $polling = $this->input->post('polling');
            $data = $this->User_Register_model->get_data_with_condition('rural', array('map' => $polling, 'rural_type' => 6, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_ward()
    {
        if ($this->input->is_ajax_request()) {
            $ward = $this->input->post('ward');
            $data = $this->User_Register_model->get_data_with_condition('urban', array('map' => $ward, 'urban_type' => 5, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_house()
    {
        if ($this->input->is_ajax_request()) {
            $house = $this->input->post('house');
            $data = $this->User_Register_model->get_data_with_condition('urban', array('map' => $house, 'urban_type' => 6, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_assembly()
    {
        if ($this->input->is_ajax_request()) {
            $dist = $this->input->post('dist');
            $data = $this->User_Register_model->get_data_with_condition('urban', array('map' => $dist, 'urban_type' => 2, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_munci()
    {
        if ($this->input->is_ajax_request()) {
            $dist = $this->input->post('dist');
            $data = $this->User_Register_model->get_data_with_condition('urban', array('map' => $dist, 'urban_type' => 3, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_coun()
    {
        if ($this->input->is_ajax_request()) {
            $mus = $this->input->post('mus');
            $data = $this->User_Register_model->get_data_with_condition('urban', array('map' => $mus, 'urban_type' => 4, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_polling_no()
    {
        if ($this->input->is_ajax_request()) {
            $poll = $this->input->post('poll');
            $data = $this->User_Register_model->get_data_with_condition('urban', array('map' => $poll, 'urban_type' => 8, 'status' => 1));
            echo json_encode($data);
        }
    }

    function get_polling_nm()
    {
        if ($this->input->is_ajax_request()) {
            $pollingno = $this->input->post('pollingno');
            $data = $this->User_Register_model->get_data_with_condition('urban', array('map' => $pollingno, 'urban_type' => 7, 'status' => 1));
            echo json_encode($data);
        }
    }

    public function register_datas()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nm','Name','required');
            $this->form_validation->set_rules('fnm','Father Name','required');
            $this->form_validation->set_rules('dob','Date Of Birth','required');
            $this->form_validation->set_rules('caste','Caste','required');
            if (isset($_POST["sub-caste"])) {
                $this->form_validation->set_rules('sub-caste','Sub Caste','required');
            }
            $this->form_validation->set_rules('relation_status','Relation Status','required');
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

                $va = array('mail'    => $this->input->post('mail'), 'table'    => 'registration');
                $ml = $this->User_Common_model->check_mail($va);
                if ($ml == FALSE) {
                        

                    $valu = array('mobile' => $this->input->post('mobile'), 'table' => 'registration');
                    $mls = $this->User_Common_model->check_number($valu);
                    if ($mls == FALSE) {
                        

                        $config['upload_path']    =  './uploads/business/';
                        $config['allowed_types']  =  'gif|jpg|png';
                        $config['max_size']       =  1024;
                        $config['max_width']      = 2000;
                        $config['max_height']     =  2000;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('photo')) {
                            $msg = array('error' => $this->upload->display_errors());
                            $data = array('text' => $msg, 'icon' => "error");
                        } else {
                            $img_data = $this->upload->data();
                            $img = base_url('uploads/business/' . $img_data['raw_name'] . $img_data['file_ext']);
                            
                        }

                        $pass = rand(pow(10, 6-1), pow(10, 6)-1);
                        $val = array(
                            'name'                  =>  $value['nm'],
                            'father_name'           =>  $value['fnm'],
                            'grand_father'          =>  $value['gfnm'],
                            'dob'                   =>  $value['dob'],
                            'caste'                 =>  $value['caste'],
                            'sub-caste'             =>  $value['sub-caste'],
                            'community'             =>  $value['community'],
                            'relation_status'       =>  $value['relation_status'],
                            'mobile'                =>  $value['mobile'],
                            'mail'                  =>  $value['mail'],
                            'password'              =>  $pass,
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
                            'photo'                 =>  empty($img)? '' : $img,
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
                        
                        $this->User_Register_model->save_data('registration',$val);

                        $gd = $this->User_Register_model->get_reg_id($value);

                        $valu = array(
                            'registration_id' => $gd['id'],
                            'admin_type' => 2,
                            'email' => $value['mail'],  
                            'password' => md5($pass),
                            'name' => $value['nm'],
                            'dob' => $value['dob'],
                            'status' => 1,
                            'created_by_user_type_id' => $this->session->userdata('user_id'),
                        );
                        $this->User_Register_model->save_data('users',$valu);
                        $data = array('text' => 'New Sector Created Successfully', 'icon' => 'success');

                    } else {
                        $msg = array('Opps ! Mobile Number is Already Exists !');
                        $data = array('text' => $msg, 'icon' => 'error');
                    }
                }else {
                    $msg = array('Opps ! Email is Already Exists !');
                    $data = array('text' => $msg, 'icon' => 'error');
                }
            } else {
                $msg = array(
                    'nm'              => form_error('nm'),
                    'fnm'             => form_error('fnm'),
                    'dob'             => form_error('dob'),
                    'caste'           => form_error('caste'),
                    'sub-caste'       => form_error('sub-caste'),
                    'relation_status' => form_error('relation_status'),
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

    public function manage_register()
    {
        $data['title'] = 'Manage Register';
        $data['breadcrumb'] = 'Manage Register';
        $data['menu_chk']=$this->User_Common_model->get_menu();
        $data['sector'] = $this->User_Register_model->get_all_sector();
        $value=$this->session->userdata('registration_id');
        $data['regi'] = $this->User_Register_model->get_registration_id($value);
        $data['register'] = $this->User_Register_model->get_all_data();
        // print_r($data['register']);die;
        $this->load->view('user/register/manage_register', $data);
    }
    
    public function View_register() {
        if($this->input->is_ajax_request()) {
            $value=$this->input->post();
            $data['regis']=$this->User_Register_model->get_all_data_register($value['id']);
            // print_r($data['regis']);die;
            $this->load->view('user/register/register_view',$data);
        }
    }
    
    public function update_register() {
        if($this->input->is_ajax_request()) {
            $value=$this->input->post();
            $data['regist']=$this->User_Register_model->get_all_data_register($value['id']);
            // print_r($data['regist']);die;
            
            $data['caste'] = $this->User_Register_model->get_data_with_condition('caste', array('map' => 0, 'caste_type' => 1, 'status' => 1));
            $data['subcaste'] = $this->User_Register_model->get_subcaste();
            $data['state'] = $this->User_Register_model->get_data_with_condition('location', array('map' => 0, 'location_type' => 1, 'status' => 1));
            $data['ruldistrict'] = $this->User_Register_model->get_data_with_condition('rural', array('map' => 0, 'rural_type' => 1, 'status' => 1));
            $data['urbdistrict'] = $this->User_Register_model->get_data_with_condition('urban', array('map' => 0, 'urban_type' => 1, 'status' => 1));
            $data['sectr'] = $this->User_Register_model->get_all_sector();
            $data['industers'] = $this->User_Register_model->get_industeries();
            $data['bussns'] = $this->User_Register_model->get_all_business();
            // print_r($data['bussns']);die;
            $data['ruldata'] = $this->User_Register_model->rural_data();
            $data['urbdata'] = $this->User_Register_model->urban_data();
            $data['distr'] = $this->User_Register_model->get_district();
            $data['police'] = $this->User_Register_model->get_police();
            $data['block'] = $this->User_Register_model->get_block();
            $data['post'] = $this->User_Register_model->get_post();
            $data['pin'] = $this->User_Register_model->get_pin();
            // print_r($data['regist']);die;
            $this->load->view('user/register/register_update',$data);
        }
    }

    public function update_register_data()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nm','Name','required');
            $this->form_validation->set_rules('fnm','Father Name','required');
            $this->form_validation->set_rules('dob','Date Of Birth','required');
            $this->form_validation->set_rules('caste','Caste','required');
            if (isset($_POST["sub-caste"])) {
                $this->form_validation->set_rules('sub-caste','Sub Caste','required');
            }
            $this->form_validation->set_rules('relation_status','Relation Status','required');
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
                    'relation_status'       =>  $value['relation_status'],
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
                    'city'                  =>  $value['city'],
                    'sector'                =>  $value['sector'],
                    'business_type'         =>  $value['business_type'],
                    'business_name'         =>  $value['business_name'],
                    'registration_number'   =>  $value['registration_number'],
                    'registration_address'  =>  $value['registration_address'],
                    'email'                 =>  $value['email'],
                    'contact_no'            =>  $value['contact_no'],
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
                   'created_at'             =>  date('Y-m-d'),
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
                
                } elseif($value['area_type'] == 2) { 

                    $val['urban_district']       =  empty($value['urban_district'])?' ':$value['urban_district'];
                    $val['urban_assembly']       =  $value['urban_assembly'];
                    $val['urban_muncipal_cor']   =  $value['urban_muncipal_cor'];
                    $val['urban_ward_no']        =  $value['urban_ward_no'];
                    $val['urban_ward_coun']      =  $value['urban_ward_coun'];
                    $val['urban_house_no']       =  $value['urban_house_no'];
                    $val['urban_polling_nm']     =  $value['urban_polling_nm'];
                    $val['urban_polling_num']    =  $value['urban_polling_num'];
                }
             
                // print_r($val);die;
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
                $data = array('text' => 'New Sector Created Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'nm'                 => form_error('nm'),
                    'fnm'                => form_error('fnm'),
                    'dob'                => form_error('dob'),
                    'caste'              => form_error('caste'),
                    'sub-caste'          => form_error('sub-caste'),
                    'relation_status'    => form_error('relation_status'),
                    'mobile'             => form_error('mobile'),
                    'mail'               => form_error('mail'),
                    'tvillage'           => form_error('tvillage'),
                    'tbuilding'          => form_error('tbuilding'),
                    'tstate'             => form_error('tstate'),
                    'tdistric'           => form_error('tdistric'),
                    'tpolice'            => form_error('tpolice'),
                    'tblock'             => form_error('tblock'),
                    'tpost'              => form_error('tpost'),
                    'tpin'               => form_error('tpin'),
                    'pvillage'           => form_error('pvillage'),
                    'pbuilding'          => form_error('pbuilding'),
                    'pstate'             => form_error('pstate'),
                    'pdistric'           => form_error('pdistric'),
                    'ppolice'            => form_error('ppolice'),
                    'pblock'             => form_error('pblock'),
                    'ppost'              => form_error('ppost'),
                    'ppin'               => form_error('ppin'),
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }

    public function update_pic()
    {
        $config['upload_path']  =  './uploads/business/';
        $config['allowed_types']  =  'gif|jpg|png';
        $config['max_size']  =  1024;
        $config['max_width']  = 2000;
        $config['max_height']  =  2000;

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

    public function delete_register() {
        if($this->input->is_ajax_request()) {
            $val=$this->input->post();
            $del = $this->User_Register_model->delete_register($val['id']);
            if($del) {
                $data = array('text' => 'Register Data Deleted Successfully', 'icon' => 'success');
            } else{
                $data=array('text' => 'Something went wrong', 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }

    public function register_search_data() {
        if($this->input->is_ajax_request()) {
            $values = $this->input->post();
            $data['reg'] = $this->User_Register_model->register_search_data($values);
            //print_r($data['fil']);die;
            // echo $this->db->last_query();die;
            $this->load->view('user/register/filter_register_data',$data);
        }
    }
}
?>