<?php
class Admin_Setting_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*======================================= Software Setting  ============================================*/

    public function get_setting()
    {
        $this->db->select('*');
        $query = $this->db->get('system_config');
        $config = $query->row_array();
        return $config;
    }

    public function update_software_data($value)
    {
        $this->db->where('id', $value['id']);
        $this->db->update('system_config', $value);
    }

}
