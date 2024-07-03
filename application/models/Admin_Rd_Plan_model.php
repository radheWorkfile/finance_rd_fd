<?php
    class Admin_Rd_Plan_model extends CI_Model {

        public function __construct() {
            parent:: __construct(); 
        }

        public function insert_data($data) {
            return $this->db->insert('rd_plan',$data);
        }

        public function get_all_data() {
            return $this->db->select('*')->order_by('id', 'DESC')->get('rd_plan')->result_array();
        }

        public function get_data($id) {
            return $this->db->select('*')->where('id',$id)->get('rd_plan')->row_array();
        }

        public function update_data($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('rd_plan', $data);
        }
    }
?>