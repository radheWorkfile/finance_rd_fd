<?php
class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_data($table,$value)
    {
        return $this->db->insert($table,$value);
    }
    
    public function search_voter_details($value) {
        $this->db->select('r.*,rural_distric.rural as rural_distric, rural_block.rural as rural_block, rural_constituency.rural as rural_constituency, rural_panchayat.rural as rural_panchayat, rural_polling_number.rural as rural_polling_num, rural_polling_name.rural as rural_polling_nm, urban_district.urban as urban_district, urban_assembly.urban as urban_assembly, urban_muncipal.urban as urban_muncipal_corp, urban_ward_no.urban as urban_ward_num, urban_ward_concillor.urban as urban_ward_concillor_name, urban_polling_number.urban as urban_polling_num, urban_polling_name.urban as urban_polling_nm, urban_house_no.urban as urban_hse_no');
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
        if(!empty($value['voter'])) {
            $this->db->where('voter_id =', $value['voter']);
        }
        return $this->db->get('registration as r')->row_array();
    }

    function chageStatus($value)
    {
        $this->db->where('id', $value['id'])->update($value['table'], array('status' => $value['status']));
    }

    public function get_reg_id($value) {
        return $this->db->select('id')->where(array('mail' => $value['mail'], 'dob' => $value['dob']))->get('registration')->row_array();
    }

    public function check_mail($val)
    {
        $query = $this->db->select('*')->where('mail', $val['mail'])->get($val['table'])->row_array();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function check_number($val)
    {
        $query = $this->db->select('*')->where('mobile', $val['mobile'])->get($val['table'])->row_array();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function getIndianCurrency(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
        );
        $digits = array('', 'Hundred', 'Thousand', 'lakh', 'Crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }

    public function count_all($table, $where = "1=1")
    {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->count_all_results();
    }

    public function sum_all($column, $table, $where = "1=1")
    {
        $this->db->select_sum($column);
        $this->db->where($where);
        $result = $this->db->get($table)->row();
        return $result->$column;
    }

    public function get_all($table) {
        return $this->db->select('*')->get($table)->result_array();
    }

    public function get_all_sector() {
        return $this->db->select('*')->where(array('status' => 1,'id !=' => 18))->get('sector')->result_array();
    }

    public function get_all_sec() {
        return $this->db->select('*')->where(array('status' => 1, 'id' => 18))->get('sector')->result_array();
    }

    public function get_data($table,$con) {
        return $this->db->select('*')->where($con)->get($table)->row_array();
    }

    public function get_data_with_condition($table, $con) {
        return $this->db->select('*')->where($con)->get($table)->result_array();
    }

    public function all_news() {
        return $this->db->select('*')->get('news')->result_array();
    }

    public function all_tender() {
        return $this->db->select('*')->get('tender')->result_array();
    }

    public function get_tender($id) {
        return $this->db->select('*')->where('id',$id)->get('tender')->row_array();
    }
}
?>