<?php 
class Admin_Location_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    public function save_location($data) {
        return $this->db->insert('location',$data);
    }

    public function get_data($id) {
        return $this->db->select('*')->where('map',$id)->get('location')->result_array();
    }

    public function get_district($id) {
        return $this->db->select('*')->where(array('map' => $id, 'location_type' => 3))->get('location')->result_array();
    }

    public function get_post($id) {
        return $this->db->select('*')->where(array('map' => $id, 'location_type' => 5))->get('location')->result_array();
    }
    public function all_data() {
        return $this->db->select('*')->where('')->get('location')->result_array();
    }
    public function get_state() {
        return $this->db->select('*')->where(array('map' => 0,'location_type' => 1))->get('location')->result_array();
    }
    public function view_district() {
        return $this->db->select('*')->where('location_type',2)->get('location')->result_array();
    }
    public function view_police() {
        return $this->db->select('*')->where('location_type',3)->get('location')->result_array();
    }
    public function view_block() {
        return $this->db->select('*')->where('location_type',4)->get('location')->result_array();
    }
    public function view_post() {
        return $this->db->select('*')->where('location_type',5)->get('location')->result_array();
    }
    public function view_pin() {
        return $this->db->select('*')->where('location_type',6)->get('location')->result_array();
    }


}

?>