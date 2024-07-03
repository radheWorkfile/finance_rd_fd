<?php
    class Admin_Agent_model extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function save_data($data) {
            return $this->db->insert('agent', $data);
        }

        public function all_agent_data() {
            return $this->db->select('*')->get('agent')->result_array();
        }

        public function get_agent_data($id) {
            $this->db->select('*');
            $this->db->where('id', $id);
            $get = $this->db->get('agent');
            return $get->row_array();
        }

        public function update_data($data) {
            $this->db->where('id', $data['id']);
            $this->db->update('agent', $data);
        }

    }
?>