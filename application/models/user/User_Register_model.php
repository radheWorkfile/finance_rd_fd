<?php 
class User_Register_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    public function save_data($table,$value)
    {
        return $this->db->insert($table,$value);
    }

    public function get_all_data() {
        $this->db->select('*');
        $this->db->where('created_by_user_type_id',$this->session->userdata('user_id'));
        // if($val['package'] == 4){
            // $this->db->limit(10);
        // }
        $query = $this->db->order_by('registration.id',"DESC")->get('registration');
        return $query->result_array();
    }

    public function get_registration_id() {
        $this->db->select('*');
        $this->db->where('id',$this->session->userdata('registration_id'));
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function get_all_sector(){
        return $this->db->select('*')->where('status',1)->get('sector')->result_array();
    }

    public function get_subcaste() {

        return $this->db->select('*')->where(array('caste_type' => 2, 'status' => 1))->get('caste')->result_array();

    }
    
    public function get_district() {
        $this->db->select('state.id as state_id, state.location as state_name,district.id as district_id, district.location as district_name,');
        $this->db->where(array('district.location_type' => 2, 'district.status' => 1));
        $this->db->join('location as district','district.map = state.id');
        return $this->db->get('location as state')->result_array();
    }

    public function get_police() {
        $this->db->select('police.id as police_id, police.location as police_name,');
        $this->db->where(array('police.location_type' => 3, 'police.status' => 1));
        $this->db->join('location as police','police.map = district.id');
        return $this->db->get('location as district')->result_array();
    }

    public function get_block() {
        $this->db->select('block.id as block_id, block.location as block_name,');
        $this->db->where(array('block.location_type' => 4, 'block.status' => 1));
        $this->db->join('location as block','block.map = district.id');
        return $this->db->get('location as district')->result_array();
    }

    public function get_post() {
        $this->db->select('post.id as post_id, post.location as post_name,');
        $this->db->where(array('post.location_type' => 5, 'post.status' => 1));
        $this->db->join('location as post','post.map = district.id');
        return $this->db->get('location as district')->result_array();
    }

    public function get_pin() {
        $this->db->select('pin.id as pin_id, pin.location as pin_no,');
        $this->db->where(array('pin.location_type' => 6, 'pin.status' => 1));
        $this->db->join('location as pin','pin.map = post.id');
        return $this->db->get('location as post')->result_array();
    }

    public function get_industeries() {
        $this->db->select('industrs.id as indus_id, industrs.industeries_name as indus');
        $this->db->where('industrs.status',1);
        $this->db->join('industeries as industrs','industrs.id = reg.industries',"left");
        return $this->db->get('registration as reg')->result_array();
    }

    public function get_all_business(){

        return $this->db->select('*')->where('status',1)->get('business')->result_array();

    }

    public function get_prof() {
        $this->db->select('r.*,r.caste as cst,r.sub-caste as sbcst, r.tdistric as tdis, r.tpolice as tpolc, r.tblock as tbloc, r.tpost as tpos, r.tpin as tpn, r.pdistric as pdis, r.ppolice as ppolc, r.pblock as pbloc, r.ppost as ppos, r.ppin as ppn, caste.caste as caste, sub-caste.caste as sub-caste, r.urban_district as urb_dis,r.urban_assembly as urb_assembly, r.urban_muncipal_cor as urban_munciple, r.urban_ward_coun as urb_ward_coun, r.urban_ward_no as urban_ward, r.urban_house_no as urban_house, r.urban_polling_nm as booth_name, r.urban_polling_num as booth_no, r.rural_distric as rul_dis, r.rural_block as rul_block, r.rural_cons as rural_con, r.rural_panchyat	as rural_pan,r.rural_polling_nm as pooling_name,r.rural_polling_num as polling_num,');
        $this->db->where('u.id',$this->session->userdata('user_id'));
        $this->db->join('registration as r','u.registration_id = r.id');
        $this->db->join('caste as caste','caste.id = r.caste',"left");
        $this->db->join('caste as sub-caste','sub-caste.id = r.sub-caste',"left");
        $query = $this->db->get('users as u');
        return $query->row_array();
    }

    public function get_reg_id($value) {
        return $this->db->select('id')->where(array('mail' => $value['mail'], 'dob' => $value['dob']))->get('registration')->row_array();
    }

    public function urban_data() {
        $this->db->select('district.id as district_id,district.urban as district_name, assembly.id as assembly_id, assembly.urban as assembly_name, munciple.id as munciple_id, munciple.urban as munciple_name, ward_concillor.id as ward_concillor_id, ward_concillor.urban as ward_concillor_name, ward_no.id as ward_no_id, ward_no.urban as ward_nos, house_no.id as house_no_id, house_no.urban as house_nos,booth_name.id as polling_booth_id, booth_name.urban as polling_booth_name, booth_no.id as polling_booth_no_id, booth_no.urban as polling_booth_nos');
        $this->db->where(array('assembly.urban_type' => 2, 'munciple.urban_type' => 3, 'ward_concillor.urban_type' => 4, 'ward_no.urban_type' => 5, 'house_no.urban_type' => 6, 'booth_name.urban_type' => 7, 'booth_no.urban_type' => 8, 'district.status' => 1));
        $this->db->join('urban as assembly','assembly.map = district.id');
        $this->db->join('urban as munciple','munciple.map = district.id');
        $this->db->join('urban as ward_concillor','ward_concillor.map = munciple.id');
        $this->db->join('urban as ward_no','ward_no.map = ward_concillor.id');
        $this->db->join('urban as house_no','house_no.map = ward_no.id');
        $this->db->join('urban as booth_name','booth_name.map = assembly.id');
        $this->db->join('urban as booth_no','booth_no.map = booth_name.id');
        return $this->db->get('urban as district')->result_array();
    }

    public function rural_data() {
        $this->db->select('district.id as district_id, district.rural as district_name, block_office.id as block_office_id, block_office.rural as block_office_name, constituency.id as constituency_id, constituency.rural as constituency_name, panchayat_name.id as panchayat_name_id, panchayat_name.rural as panchayat_names, booth_name.id as booth_name_id, booth_name.rural as booth_names, booth_no.id as booth_no_id, booth_no.rural as booth_nos');
        $this->db->where(array('block_office.rural_type' => 2, 'constituency.rural_type' => 3, 'panchayat_name.rural_type' => 4, 'booth_name.rural_type' => 5, 'booth_no.rural_type' => 6, 'district.status' => 1));
        $this->db->join('rural as block_office','block_office.map = district.id');
        $this->db->join('rural as constituency','constituency.map = district.id');
        $this->db->join('rural as panchayat_name','panchayat_name.map = constituency.id');
        $this->db->join('rural as booth_name','booth_name.map = panchayat_name.id');
        $this->db->join('rural as booth_no','booth_no.map = booth_name.id');
        return $this->db->get('rural as district')->result_array();
    }

    public function get_all_data_register($id) {
      $this->db->select('r.*,r.caste as cas, r.sub-caste as sbcas, caste.caste as caste, sub-caste.caste as sub-caste, r.tdistric as tdic, r.tpolice as tpol, r.tblock as tbloc, r.tpost as tpos, r.tpin as tpn, r.pdistric as pdic, r.ppolice as ppol, r.pblock as pbol, r.ppost as ppos, r.ppin as ppn, r.urban_district as urb_dis,r.urban_assembly as urb_assembly, r.urban_muncipal_cor as urban_munciple, r.urban_ward_coun as urb_ward_coun, r.urban_ward_no as urban_ward, r.urban_house_no as urban_house, r.urban_polling_nm as booth_name, r.urban_polling_num as booth_no, r.rural_distric as rul_dis, r.rural_block as rul_block, r.rural_cons as rural_con, r.rural_panchyat	as rural_pan,r.rural_polling_nm as pooling_name,r.rural_polling_num as polling_num, state.location as temporary_state, distric.location as temporary_distric, police_station.location as temporary_police_station, block_office.location as temporary_block_office, post_office.location as temporary_post_office, pin_code.location as temporary_pin_code, states.location as parmanent_state, districs.location as parmanent_distric, police_stations.location as parmanent_police_station, block_offices.location as parmanent_block_office, post_offices.location as parmanent_post_office, pin_codes.location as parmanent_pin_code, sectr.sector_name as sect, industrs.industeries_name as indus, buss_type.business_type as bus_typ, rural_distric.rural as rural_distric, rural_block.rural as rural_block, rural_constituency.rural as rural_constituency, rural_panchayat.rural as rural_panchayat, rural_polling_number.rural as rural_polling_num, rural_polling_name.rural as rural_polling_nm, urban_district.urban as urban_district, urban_assembly.urban as urban_assembly, urban_muncipal.urban as urban_muncipal_corp, urban_ward_no.urban as urban_ward_num, urban_ward_concillor.urban as urban_ward_concillor_name, urban_polling_number.urban as urban_polling_num, urban_polling_name.urban as urban_polling_nm, urban_house_no.urban as urban_hse_no');
      $this->db->where('r.id',$id);
      $this->db->join('caste as caste','caste.id = r.caste',"left");
      $this->db->join('caste as sub-caste','sub-caste.id = r.sub-caste',"left");
      $this->db->join('location as state','state.id = r.tstate',"left");
      $this->db->join('location as distric','distric.id = r.tdistric',"left");
      $this->db->join('location as police_station','police_station.id = r.tpolice',"left");
      $this->db->join('location as block_office','block_office.id = r.tblock',"left");
      $this->db->join('location as post_office','post_office.id = r.tpost',"left");
      $this->db->join('location as pin_code','pin_code.id = r.tpin',"left");
      $this->db->join('location as states','states.id = r.pstate',"left");
      $this->db->join('location as districs','districs.id = r.pdistric',"left");
      $this->db->join('location as police_stations','police_stations.id = r.ppolice',"left");
      $this->db->join('location as block_offices','block_offices.id = r.pblock',"left");
      $this->db->join('location as post_offices','post_offices.id = r.ppost',"left");
      $this->db->join('location as pin_codes','pin_codes.id = r.ppin',"left");
      $this->db->join('sector as sectr','sectr.id = r.sector',"left");
      $this->db->join('business as buss_type','buss_type.id = r.business_type',"left");
      $this->db->join('industeries as industrs','industrs.id = r.industries',"left");
      $this->db->join('rural as rural_distric','rural_distric.id = r.rural_distric',"left");
      $this->db->join('rural as rural_block','rural_block.id = r.rural_block',"left");
      $this->db->join('rural as rural_constituency','rural_constituency.id = r.rural_cons',"left");
      $this->db->join('rural as rural_panchayat','rural_panchayat.id = r.rural_panchyat',"left");
      $this->db->join('rural as rural_polling_number','rural_polling_number.id = r.rural_polling_num',"left");
      $this->db->join('rural as rural_polling_name','rural_polling_name.id = r.rural_polling_nm',"left");
      $this->db->join('urban as urban_assembly','urban_assembly.id = r.urban_assembly',"left");
      $this->db->join('urban as urban_district','urban_district.id = r.urban_district',"left");
      $this->db->join('urban as urban_muncipal','urban_muncipal.id = r.urban_muncipal_cor',"left");
      $this->db->join('urban as urban_ward_no','urban_ward_no.id = r.urban_ward_no',"left");
      $this->db->join('urban as urban_ward_concillor','urban_ward_concillor.id = r.urban_ward_coun',"left");
      $this->db->join('urban as urban_polling_number','urban_polling_number.id = r.urban_polling_num',"left");
      $this->db->join('urban as urban_polling_name','urban_polling_name.id = r.urban_polling_nm',"left");
      $this->db->join('urban as urban_house_no','urban_house_no.id = r.urban_house_no',"left");
      $query = $this->db->get('registration as r');
      return $query->row_array();
    }

    public function get_data_with_condition($table,$con){

        return $this->db->select('*')->where($con)->get($table)->result_array();
    }

    public function delete_register($val) {

        if($val) {
            $this->db->where('id',$val);
            $del=$this->db->delete('registration');
            if($del) {
                return true;
            } else{
                return false;
            }
        }else{
            return false;
        }
    }

    function update_photo($val)
    {
        $q = $this->db->select('photo')->where('id', $val['id'])->get('registration');
        if ($q->num_rows() > 0) {
            $imgName = $q->row_array();
            //print_r($imgName);die;
            unlink("./uploads/business/" . basename($imgName['photo']));
        }

        $this->db->where('id', $val['id']);
        if ($val) {
            $query = $this->db->update('registration', $val);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update_data_register($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('registration', $data);
    }

    public function update_data($data)
    {
        $this->db->where('registration_id', $data['registration_id']);
        $this->db->update('users', $data);
    }
    
    public function register_search_data($value) {
        $s_name = $value['sector'];
        $i_name = $value['industries'];
        $this->db->select('r.*');
        $this->db->where('u.id',$this->session->userdata('user_id'));
        $this->db->join('users as u','u.id=r.created_by_user_type_id');
        if(!empty($value['sector']) && !empty($value['industries']) && empty($value['from_date']) && empty($value['to_date'])) {
            $this->db->where("FIND_IN_SET('$s_name',r.sector)!=", 0);
            $this->db->where("FIND_IN_SET('$i_name',r.industries)!=", 0);
        }elseif(!empty($value['from_date']) && empty($value['to_date']) && empty($value['sector']) && empty($value['industries'])){
            $this->db->where('r.created_at =', $value['from_date']);
        }elseif(!empty($value['to_date']) && empty($value['from_date']) && empty($value['sector']) && empty($value['industries'])){
            $this->db->where('r.created_at =', $value['to_date']);
        }elseif(!empty($value['sector']) && !empty($value['industries']) && !empty($value['from_date']) && !empty($value['to_date'])) {
            $this->db->where("FIND_IN_SET('$i_name',r.industries)!=", 0);
            $this->db->where("FIND_IN_SET('$s_name',r.sector)!=", 0);
            $this->db->where('r.created_at >=', $value['from_date']);
            $this->db->where('r.created_at <=', $value['to_date']);
        }elseif(!empty($value['sector']) && !empty($value['industries']) && !empty($value['from_date']) && empty($value['to_date'])){
            $this->db->where("FIND_IN_SET('$i_name',r.industries)!=", 0);
            $this->db->where("FIND_IN_SET('$s_name',r.sector)!=", 0);
            $this->db->where('r.created_at >=', $value['from_date']);
        }elseif(!empty($value['sector']) && !empty($value['industries']) && !empty($value['to_date']) && empty($value['from_date'])) {
            $this->db->where("FIND_IN_SET('$i_name',r.industries)!=", 0);
            $this->db->where("FIND_IN_SET('$s_name',r.sector)!=", 0);
            $this->db->where('r.created_at <=', $value['to_date']);
        }elseif(empty($value['sector']) && empty($value['industries']) && !empty($value['to_date']) && !empty($value['from_date'])) {
            $this->db->where('r.created_at >=', $value['from_date']);
            $this->db->where('r.created_at <=', $value['to_date']);
        }
        return $this->db->order_by('r.id','DESC')->get('registration as r')->result_array();
    }

    public function get_last_id($id){
        return $this->db->select('id,user_id')->where('created_by_user_type_id', $id)->order_by('id', 'DESC')->limit(1)->get('users')->row_array();
    }
}
?>