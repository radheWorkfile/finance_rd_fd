<?php

class Admin_Rd_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_members()
    {
        return $this->db->select('id, user_id, name')->get('member')->result_array();
    }

    public function get_member_data($id)
    {
        return $this->db->select('user_id')->where('user_id', $id)->get('member')->row_array();
    }

    public function get_rd_id($value)
    {
        return $this->db->select('id')->where('user_id', $value['user_id'])->order_by('id', 'DESC')->get('add_rd')->row_array();
    }

    public function rd_plan()
    {
        return $this->db->select('*')->get('rd_plan')->result_array();
    }

    public function get_rd_plan($id)
    {
        return $this->db->select('duration, amount, interest_percent, interval, plan_type')->where('id', $id)->get('rd_plan')->row_array();
    }

    public function insert_data($data)
    {
        return $this->db->insert('add_rd', $data);
    }

    public function insert_rd_payment_data($data)
    {
        return $this->db->insert('rd_payment_details', $data);
    }

    public function all_rd_data_query($where = false)
    {
        $field = array(
           'ard.amount','ard.rd_date', 'rdp.plan_name', 'mem.name', 'mem.user_id',
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

        $this->db->select('ard.*, rdp.plan_name as pln_nm, mem.name as nm, mem.user_id as u_id, ')->from('add_rd as ard');
        $this->db->join('member as mem', 'mem.id = ard.member_name', 'left');
        $this->db->join('rd_plan as rdp', 'rdp.id = ard.rd_plan', 'left');
        if (isset($where['order']) && !empty($where['order'])) {
            $this->db->order_by($field[$where['order']['0']['column']], $where['order']['0']['dir']);
        } else {
            $this->db->order_by('ard.id', 'desc');
        }
    }

    public function all_rd_data($where = false)
    {
        $this->all_rd_data_query($where);

        if ($where['length'] != -1) {
            $this->db->limit($where['length'], $where['start']);
        }
        return $this->db->get()->result();
    }

    public function total_count($where = false)
    {
        $this->all_rd_data_query($where);
        return $this->db->get()->num_rows();
    }

    public function total_filter_count($where = false)
    {
        $this->all_rd_data_query($where);
        return $this->db->get()->num_rows();
    }

    public function get_all_data()
    {
        $this->db->select('ard.*, rdp.plan_name as pln_nm, mem.name as nm, mem.user_id as u_id');
        $this->db->join('member as mem', 'mem.id = ard.member_name');
        $this->db->join('rd_plan as rdp', 'rdp.id = ard.rd_plan');
        $query = $this->db->order_by('ard.id', "DESC")->get('add_rd as ard');
        return $query->result_array();
    }

    public function get_all_rd_payment_details($id)
    {
        $this->db->select('rpd.*,rp.plan_type');
        $this->db->where('rpd.rd_id', $id);
        $this->db->join('rd_plan as rp', 'rp.id = rpd.rd_plan');
        $query = $this->db->get('rd_payment_details as rpd');
        return $query->result_array();
    }

    public function get_rd_payment_pay_details($id)
    {
        $this->db->select('rpd.*,rp.plan_type');
        $this->db->where('rpd.id', $id);
        $this->db->join('rd_plan as rp', 'rp.id = rpd.rd_plan');
        $query = $this->db->get('rd_payment_details as rpd');
        return $query->row_array();
    }

    // public function get_rd_datas($id)
    // {

    //     $this->db->select('rpd.*, memb.tvillage, distric.location as tdis, state.location as tstate, pincode.location as pin, memb.name as nm, memb.user_id as u_id, memb.rd_no, ard.duration as durtn, ard.amount as amt, rd.plan_name as pln_nm,rd.interval');

    //     $this->db->where('rpd.id', $id);
    //     $this->db->join('rd_plan as rd', 'rd.id = rpd.rd_plan', "left");
    //     $this->db->join('member as memb', 'memb.user_id = rpd.user_id', "left");
    //     $this->db->join('location as distric', 'distric.id = memb.tdistric', "left");
    //     $this->db->join('location as state', 'state.id = memb.tstate', "left");
    //     $this->db->join('location as pincode', 'pincode.id = memb.tpin', "left");
    //     $this->db->join('add_rd as ard', 'ard.user_id = rpd.user_id', "left");
    //     $query = $this->db->get('rd_payment_details as rpd');
    //     return $query->row_array();

    // }

    public function get_rd_datas($id)
    {

        $this->db->select('rpd.*, memb.name as nm, memb.user_id as u_id, memb.rd_no, memb.permanent_address, ard.duration as durtn, ard.amount as amt, rd.plan_name as pln_nm,rd.interval,rd.plan_type');

        $this->db->where('rpd.id', $id);
        $this->db->join('rd_plan as rd', 'rd.id = rpd.rd_plan', "left");
        $this->db->join('member as memb', 'memb.user_id = rpd.user_id', "left");
        $this->db->join('add_rd as ard', 'ard.user_id = rpd.user_id', "left");
        $query = $this->db->get('rd_payment_details as rpd');
        return $query->row_array();

    }

    public function sum_amt($id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id', $id);
        $sum = $this->db->get('rd_payment_details');
        return $sum->row_array();
    }

    public function sum_interest_amt($id)
    {
        $this->db->select_sum('interest_amount');
        $this->db->where('user_id', $id);
        $sum = $this->db->get('rd_payment_details');
        return $sum->row_array();
    }

    public function get_company_details()
    {
        return $this->db->select('*')->get('system_config')->result_array();
    }

    public function update_rd_payment($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('rd_payment_details', $data);
    }

    public function get_data($id)
    {
        $this->db->select('ard.*,mem.id as mem_id, mem.name as nm, mem.relation, mem.temporary_state, mem.temporary_pin, 
        mem.user_id as u_id, mem.nominee_name as nimn_nm, mem.temporary_address as temp_add, mem.mobile as mob,
        mem.mail as ml, rdp.plan_name as p_nm,rdp.interval,rdp.plan_type, ag.name as agent_name, ag.agent_id');
        $this->db->where('ard.id', $id);
        $this->db->join('member as mem', 'mem.id = ard.member_name');
        $this->db->join('agent as ag', 'ag.id = mem.agent', 'left');
        $this->db->join('rd_plan as rdp', 'rdp.id = ard.rd_plan');
        $query = $this->db->get('add_rd as ard');
        return $query->row_array();
    }

    public function update_data($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('add_rd', $data);
    }

    public function get_last_id($id)
    {

        return $this->db->select('id,user_id')->where(array('rd_id' => $id, 'status' => 1))->order_by('id', 'ASC')->limit(1)->get('rd_payment_details')->row_array();

    }

    public function get_all_rd_datas($user_id)
    {
        $this->db->select('rpd.*, ard.user_id');
        $this->db->where('rpd.user_id', $user_id);
        $this->db->where('rpd.status', 2);
        $this->db->join('add_rd as ard', 'ard.id = rpd.rd_id');
        $query = $this->db->get('rd_payment_details as rpd');
        return $query->result_array();
    }

    public function insert_close_rd_data($data)
    {
        return $this->db->insert('close_rd_plan', $data);
    }

    public function all_close_rd_plan_data()
    {
        $this->db->select('crp.*, m.name as member_name, m.user_id as member_id,rp.plan_name as p_nm, ');
        $this->db->join('member as  m', 'm.user_id = crp.user_id', 'left');
        $this->db->join('add_rd as ar', 'ar.id = crp.rd_id', 'left');
        $this->db->join('rd_plan as rp', 'rp.id = ar.rd_plan', 'left');
        $val = $this->db->get('close_rd_plan as crp');
        return $val->result_array();
    }

    public function get_close_rd_plan_data($id)
    {
        $this->db->select('crp.*, m.name as member_name, m.user_id as member_id,rp.plan_name as p_nm, ');
        $this->db->where('crp.id', $id);
        $this->db->join('member as  m', 'm.user_id = crp.user_id', 'left');
        $this->db->join('add_rd as ar', 'ar.id = crp.rd_id', 'left');
        $this->db->join('rd_plan as rp', 'rp.id = ar.rd_plan', 'left');
        $val = $this->db->get('close_rd_plan as crp');
        return $val->row_array();
    }


    public function update_status($data)
    {
        $this->db->where(array('rd_id' => $data['rd_id'], 'status' => 1));
        $this->db->update('rd_payment_details', $data);
    }

    public function update_closed_plan($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('add_rd', $data);
    }


    public function get_sum_of_amo($id)
    {
        $this->db->select('sum(rpd.paid_amount) as sum_paid_amo, count(rpd.paid_amount) as total_paid_dua');
        $this->db->where('rpd.rd_id', $id);
        $this->db->join('member as mem', 'mem.id = rpd.rd_id');
        $query = $this->db->get('rd_payment_details as rpd');
        return $query->row_array();
    }



}

?>