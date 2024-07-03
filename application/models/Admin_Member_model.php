<?php 
class Admin_Member_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    public function save_data($table,$value)
    { 
        return $this->db->insert($table,$value);
    }

    public function get_all_agent() {
        return $this->db->select('id, name, agent_id')->get('agent')->result_array();
    }

    public function all_member_data_query($where = false)
    {
        $field = array(
           'id','user_id', 'name', 'mobile', 'mail', 'status',
        );
        $i = 0;
        foreach ($field as $item) {
            if (!empty($where['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $where['search']['value']);
                } else {
                    $this->db->or_like($item, $where['search']['value']);
                }
                if (count($field) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        $this->db->select('id, user_id, name, mobile, mail, status')->from('member');
        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'desc');
        }
    }

    public function all_member_data($where = false)
    {
        $this->all_member_data_query($where);

        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }

    public function total_count($where = false)
    {
        $this->all_member_data_query($where);
        return $this->db->get()->num_rows();
    }

    public function total_filter_count($where = false)
    {
        $this->all_member_data_query($where);
        return $this->db->get()->num_rows();
    }

    public function get_all_member () {

        $this->db->select('id, user_id, name, mobile, mail');
        $query = $this->db->order_by('id', "DESC")->get('member');
        return $query->result_array();

    }

    public function get_reg_id($value) {

        return $this->db->select('id')->where(array('id_proof_no' => $value['id_proof_no'], 'dob' => $value['dob']))->get('member')->row_array();

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

    public function get_all_data($id){
      $this->db->select('r.*,ag.name as agent_name,ag.agent_id, r.tdistric as tdis,r.tpolice as tpolc,r.tblock as tbloc,r.tpost as tpos,
      r.tpin as tpn,r.pdistric as pdis,r.ppolice as ppolc,r.pblock as pbloc,r.ppost as ppos,r.ppin as ppn, 
      state.location as temporary_states, distric.location as temporary_distric, 
      police_station.location as temporary_police_station, block_office.location as temporary_block_office,
      post_office.location as temporary_post_office, pin_code.location as temporary_pin_code, 
      states.location as parmanent_state, districs.location as parmanent_distric, 
      police_stations.location as parmanent_police_station, block_offices.location as parmanent_block_office, 
      post_offices.location as parmanent_post_office, pin_codes.location as parmanent_pin_code');
      $this->db->where('r.id',$id);
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
      $this->db->join('agent as ag', 'ag.id = r.agent', 'left');
      $query = $this->db->get('member as r');
      return $query->row_array();
    }

    public function get_data_with_condition($table,$con){

        return $this->db->select('*')->where($con)->get($table)->result_array();
    }

    public function update_data_member($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('member', $data);
    }

    public function update_data($data)
    {
        $this->db->where('member_id', $data['member_id']);
        $this->db->update('users', $data);
    }

    public function update_pan_img($val) {

        $q = $this->db->select('pan_img')->where('id', $val['id'])->get('member');
        if ($q->num_rows() > 0) {
            $imgName = $q->row_array();
            //print_r($imgName);die;
            unlink("./uploads/kyc_details/" . basename($imgName['pan_img']));
        }

        $this->db->where('id', $val['id']);
        if($val) {
            $query = $this->db->update('member', $val);
            if($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update_identity_proof_img($val) {
        $q = $this->db->select('identity_proof_img')->where('id', $val['id'])->get('member');
        if ($q->num_rows() > 0) {
            $imgName = $q->row_array();
            //print_r($imgName);die;
            unlink("./uploads/kyc_details/" . basename($imgName['identity_proof_img']));
        }

        $this->db->where('id', $val['id']);
        if($val) {
            $query = $this->db->update('member', $val);
            if($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update_signature_proof_img($val) {

        $q = $this->db->select('identity_proof_img')->where('id', $val['id'])->get('member');
        if ($q->num_rows() > 0) {
            $imgName = $q->row_array();
            //print_r($imgName);die;
            unlink("./uploads/kyc_details/" . basename($imgName['identity_proof_img']));
        }

        $this->db->where('id', $val['id']);
        if($val) {
            $query = $this->db->update('member', $val);
            if($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update_address_proof_img($val) {

        $q = $this->db->select('address_proof_img')->where('id', $val['id'])->get('member');
        if ($q->num_rows() > 0) {
            $imgName = $q->row_array();
            //print_r($imgName);die;
            unlink("./uploads/kyc_details/" . basename($imgName['address_proof_img']));
        }

        $this->db->where('id', $val['id']);
        if($val) {
            $query = $this->db->update('member', $val);
            if($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update_bank_statement_img($val) {

        $q = $this->db->select('bank_statement_img')->where('id', $val['id'])->get('member');
        if ($q->num_rows() > 0) {
            $imgName = $q->row_array();
            //print_r($imgName);die;
            unlink("./uploads/kyc_details/" . basename($imgName['bank_statement_img']));
        }

        $this->db->where('id', $val['id']);
        if($val) {
            $query = $this->db->update('member', $val);
            if($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_last_id($id) {

        return $this->db->select('id,user_id')->where('created_by_user_type_id', $id)->order_by('id', 'DESC')->limit(1)->get('users')->row_array();

    }
}

?>