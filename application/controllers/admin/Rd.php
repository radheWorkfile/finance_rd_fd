<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Rd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Rd_model');
        $this->load->model('Admin_Common_model');
    }

    public function rd()
    {
        $data['title'] = 'Add New RD';
        $data['breadcrumb'] = 'Add New RD';
        $data['member'] = $this->Admin_Rd_model->get_members();
        $data['rd_plan'] = $this->Admin_Rd_model->rd_plan();
        $dat = $this->input->post();
        $this->load->view('admin/rd/add_rd', $data);
    }

    public function get_rd_plan_data()
    {
        if ($this->input->is_ajax_request()) {
            $rpl = $this->input->post();
            $data = $this->Admin_Rd_model->get_rd_plan($rpl['id']);
            // print_r($data);die;
            echo json_encode($data);
        }
    }

    public function get_member_data()
    {
        if ($this->input->is_ajax_request()) {
            $member = $this->input->post();
            $data = $this->Admin_Common_model->get_data(array('id' => $member['id']), 'member');
            // print_r($data);die;
            echo json_encode($data);
        }
    }

    public function add_rd()
    {


        $this->form_validation->set_rules('member_name', 'Member Name', 'required');
        $this->form_validation->set_rules('rd_plan', 'RD Plan', 'required');
        $this->form_validation->set_rules('rd_date', 'RD Date', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');

        if ($this->form_validation->run()) {

            $receipt_no = rand(pow(10, 6 - 1), pow(8, 3) - 1);
            // $account_no = rand(pow(6, 10 - 1), pow(7, 9) - 3);
            $ac = $this->db->select('account_no')->order_by("id", "desc")->limit(1)->get('add_rd')->row_array();
            if (empty($ac)) {
                $account_no = '1481542001';
            } else {
                $account_no = (int) $ac['account_no'] + 1;
            }
            $rd = array(
                'user_id' => $this->input->post('user_id'),
                'receipt_no' => $receipt_no,
                'account_no' => $account_no,
                'member_name' => $this->input->post('member_name'),
                'rd_plan' => $this->input->post('rd_plan'),
                'rd_date' => $this->input->post('rd_date'),
                'duration' => $this->input->post('duration'),
                'amount' => $this->input->post('amount'),
                'interest_percent' => $this->input->post('interest_percent'),
                'created_by_user_type_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d'),
            );
            // print_r($rd);die;
            $this->Admin_Rd_model->insert_data($rd);

            /* ============== RD Payment Data =============*/

            $amt = $this->input->post('amount');
            $duration = $this->input->post('duration');
            $interval = $this->input->post('interval');
            $plan_type = $this->input->post('plan_type');
            $interest_percent = $this->input->post('interest_percent');
            $start_date = $this->input->post('rd_date');
            $start_month = date("Y-m-d", strtotime($start_date . '+1 month'));
            $start_year = date("Y-m-d", strtotime($start_date . '+1 year'));
            $i = 1;

            if ($plan_type == 1) {
                $interest_amount = $interest_percent;
            } elseif ($plan_type == 2) {
                $interest_amount = $amt * $interest_percent / 100;
            } else {
                $interest_amount = 0;
            }

            if ($interval == 1) {
                $Payment_start_date = date("Y-m-d", strtotime($start_date . $i . 'month'));

                $total_amt = $amt + $interest_amount;

                $i = 0;

                for ($i = 1; $i <= $duration; $i++) {
                    $start_month++;

                    if ($i > 1) {
                        $total_amt = $total_amt;

                        if ($start_month > 12) {

                            $start_year++;
                        }

                        $Payment_start_date = date("Y-m-d", strtotime($start_date . $i . 'month'));
                    }

                    $value = $this->input->post();
                    $id = $this->Admin_Rd_model->get_rd_id($value);

                    $rd_pay = array(
                        'rd_id' => $id['id'],
                        'user_id' => $this->input->post('user_id'),
                        'receipt_no' => $receipt_no,
                        'account_no' => $account_no,
                        'member_name' => $this->input->post('member_name'),
                        'rd_plan' => $this->input->post('rd_plan'),
                        'rd_date' => $this->input->post('rd_date'),
                        'duration' => $this->input->post('duration'),
                        'payment_date' => $Payment_start_date,
                        'amount' => $this->input->post('amount'),
                        'interest_amount' => $interest_amount,
                        'interest_percent' => $this->input->post('interest_percent'),
                        'total_amount' => $total_amt,
                        'created_by_user_type_id' => $this->session->userdata('user_id'),
                        'created_at' => date('Y-m-d'),
                    );
                    $this->Admin_Rd_model->insert_rd_payment_data($rd_pay);
                    $data = array('text' => 'New RD & Payment Data Added Successfully', 'icon' => 'success');
                }
            } elseif ($interval == 2) {
                $Payment_start_date = date("Y-m-d", strtotime($start_date . $i . 'year'));

                $total_amt = $amt + $interest_amount;

                $i = 0;

                for ($i = 1; $i <= $duration; $i++) {
                    $start_month++;

                    if ($i > 1) {
                        $total_amt = $total_amt;

                        if ($start_month > 12) {

                            $start_year++;
                        }

                        $Payment_start_date = date("Y-m-d", strtotime($start_date . $i . 'year'));
                    }

                    $value = $this->input->post();
                    $id = $this->Admin_Rd_model->get_rd_id($value);

                    $rd_pay = array(
                        'rd_id' => $id['id'],
                        'user_id' => $this->input->post('user_id'),
                        'receipt_no' => $receipt_no,
                        'account_no' => $account_no,
                        'member_name' => $this->input->post('member_name'),
                        'rd_plan' => $this->input->post('rd_plan'),
                        'rd_date' => $this->input->post('rd_date'),
                        'duration' => $this->input->post('duration'),
                        'payment_date' => $Payment_start_date,
                        'amount' => $this->input->post('amount'),
                        'interest_amount' => $interest_amount,
                        'interest_percent' => $this->input->post('interest_percent'),
                        'total_amount' => $total_amt,
                        'created_by_user_type_id' => $this->session->userdata('user_id'),
                        'created_at' => date('Y-m-d'),
                    );
                    $this->Admin_Rd_model->insert_rd_payment_data($rd_pay);
                    $data = array('text' => 'New RD & Payment Data Added Successfully', 'icon' => 'success');
                }
            }
        } else {
            $msg = array(
                'member_name' => form_error('member_name'),
                'rd_plan' => form_error('rd_plan'),
                'rd_date' => form_error('rd_date'),
                'duration' => form_error('duration'),
                'amount' => form_error('amount'),
                'interest_percent' => form_error('interest_percent'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }

    public function manage_rd()
    {

        $data['title'] = 'Manage RD Data';
        $data['breadcrumb'] = 'Manage RD Data';
        $this->load->view('admin/rd/manage_rd', $data);
    }

    public function rd_data()
    {

        $post_data = $this->input->post();
        $record = $this->Admin_Rd_model->all_rd_data($post_data);
        $i = $post_data['start'] + 1;

        $return['data'] = array();
        foreach ($record as $row) {

            $view = '<a href="javascript:void(0);" data-toggle="modal" data-target="#view_rd_modal"
            onclick="view_rd(' . $row->id . ')" title="Click to View RD Data Details"><i class="fas fa-eye text-success"></i></a>&emsp;
            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_rd_payment_modal" onclick="view_rd_payment_details(' . $row->id . ')" title="Click to View Rd Payment Data Details"><i class="fas fa-eye text-danger"></i></a>&emsp;
            <a href="javascript:void(0);" data-toggle="modal" data-target="#update_rd_modal"
            onclick="update_rd(' . $row->id . ')" title="Click to Update RD Data Details"><i class="fas fa-edit"></i></a>&emsp;';

            $status = ($row->status == 1) ?
                '<a style="color:green" href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'0\',\'registration\',\'admin/common/chageStatus\')" title="Click to Di-Active RD Details Data"><b><i class="fa fa-check"></i> </b></a>&emsp;'
                :
                '<a style="color:red"  href="javascript:void()"  onClick="return changeStatus(\'' . $row->id . '\',\'1\',\'registration\',\'admin/common/chageStatus\')" title="Click to Active RD Details Data "><b><i class="fa fa-times"></i> </b></a>&emsp;';

            if ($row->closed_plan == 1) {
                $cls_pln = '<a href="javascript:void(0);" class="btn-sm btn-primary" data-toggle="modal" data-target="#pay_emi_modal" onclick="close_rd_plan(' . $row->id . ')" title="Click to Pay EMI">Close Rd Plan</a>';
            } else {
                $cls_pln = '<b class="text-danger"> Plan Closed <i class="fa fa-times"></i> </b>';
            }

            $print_rd = '<a href="javascript:void(0);" style="margin-left:10px;" data-toggle="modal" data-target="#print_bill" onclick="print_member_details(' . $row->id . ', ' . $row->user_id . ')" title="Click to Print Member Details"><i class="fas fa-print text-primary"></i></a>';

            $return['data'][] = array(

                $i++,
                $row->nm . "(" . $row->u_id . ")",
                $row->pln_nm,
                $row->amount,
                $row->rd_date,
                $view . "&emsp; <span id='" . $row->id . "'>" . $status . "</span>&emsp;" . $cls_pln . $print_rd,

            );
        }

        $return['recordsTotal'] = $this->Admin_Rd_model->total_count();
        $return['recordsFiltered'] = $this->Admin_Rd_model->total_filter_count($post_data);
        $return['draw'] = $post_data['draw'];
        echo json_encode($return);
    }

    public function view_rd()
    {
        if ($this->input->is_ajax_request()) {
            $vrd = $this->input->post();
            $data['view_rd'] = $this->Admin_Rd_model->get_data($vrd['id']);
            $this->load->view('admin/rd/view_rd', $data);
        }
    }

    public function rd_payment_details()
    {
        if ($this->input->is_ajax_request()) {
            $rdpay = $this->input->post();
            $data['vw_rdpay'] = $this->Admin_Rd_model->get_all_rd_payment_details($rdpay['id']);
            $this->load->view('admin/rd/view_payment_details', $data);
        }
    }

    public function view_rd_payment_pay()
    {
        if ($this->input->is_ajax_request()) {
            $pay_rd = $this->input->post();
            $data['vw_pay'] = $this->Admin_Rd_model->get_rd_payment_pay_details($pay_rd['id']);
            $this->load->view('admin/rd/pay_rd_payment', $data);
        }
    }

    public function pay_rd_payment_data()
    {
        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required');
        $this->form_validation->set_rules('mop', 'Mode of Payment', 'required');
        $this->form_validation->set_rules('pay_date', 'Pay Date', 'required');
        $this->form_validation->set_rules('payment_remarks', 'Payment Remark', 'required');

        if ($this->form_validation->run() == TRUE) {
            $val = $this->input->post();

            $filename = "RD" . $this->input->post('id') . "(" . $this->input->post('user_id') . ")";
            $config['upload_path'] = './uploads/recipet/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;
            $config['file_name'] = $filename;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('recipet')) {
                $msg = array('error' => $this->upload->display_errors());
                $data = array('text' => $msg, 'icon' => "error");
            } else {
                $img_data = $this->upload->data();
                $img = base_url('uploads/recipet/' . $img_data['raw_name'] . $img_data['file_ext']);
            }

            $pay_rd = array(
                'id' => $val['id'],
                'paid_amount' => $val['paid_amount'],
                'mop' => $val['mop'],
                'pay_date' => $val['pay_date'],
                'penalty_amount' => $val['penalty_amount'],
                'payment_remarks' => $val['payment_remarks'],
                'recipet' => empty($img) ? '' : $img,
                'status' => 2
            );
            $this->Admin_Rd_model->update_rd_payment($pay_rd);
            $data = array('text' => 'RD Payment Data Added Successfully', 'icon' => 'success');
        } else {
            $msg = array(
                'paid_amount' => form_error('paid_amount'),
                'mop' => form_error('mop'),
                'pay_date' => form_error('pay_date'),
                'payment_remarks' => form_error('payment_remarks'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }

    public function paid_rd_payment_view()
    {
        if ($this->input->is_ajax_request()) {
            $vw_paid = $this->input->post();
            $data['view_rd_paid'] = $this->Admin_Rd_model->get_rd_payment_pay_details($vw_paid['id']);
            // print_r($data['view_rd_paid']);die;
            $this->load->view('admin/rd/view_paid_rd', $data);
        }
    }

    public function update_rd()
    {
        if ($this->input->is_ajax_request()) {
            $urd = $this->input->post();
            $data['memb'] = $this->Admin_Rd_model->get_members();
            $data['rd_pln'] = $this->Admin_Rd_model->rd_plan();
            $data['up_rd'] = $this->Admin_Rd_model->get_data($urd['id']);
            $this->load->view('admin/rd/update_rd', $data);
        }
    }

    public function update_rd_data()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('member_name', 'Member Name', 'required');
            $this->form_validation->set_rules('rd_plan', 'RD Plan', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('rd_date', 'Rd Date', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required');
            $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');

            if ($this->form_validation->run()) {
                $up_rd = array(
                    'id' => $this->input->post('id'),
                    'member_name' => $this->input->post('member_name'),
                    'rd_plan' => $this->input->post('rd_plan'),
                    'amount' => $this->input->post('amount'),
                    'rd_date' => $this->input->post('rd_date'),
                    'duration' => $this->input->post('duration'),
                    'interest_percent' => $this->input->post('interest_percent'),
                    'created_by_user_type_id' => $this->session->userdata('user_id')
                );
                $this->Admin_Rd_model->update_data($up_rd);
                $data = array('text' => 'RD Data Updated Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'member_name' => form_error('member_name'),
                    'rd_plan' => form_error('rd_plan'),
                    'amount' => form_error('amount'),
                    'rd_date' => form_error('rd_date'),
                    'duration' => form_error('duration'),
                    'interest_percent' => form_error('interest_percent')
                );
                $data = array('text' => $msg, 'icon' => 'error');
            }
            echo json_encode($data);
        }
    }

    public function print_bill()
    {
        if ($this->input->is_ajax_request()) {

            $pbill = $this->input->post();
            $data['getcmpny'] = $this->Admin_Rd_model->get_company_details();
            $data['priemi'] = $this->Admin_Rd_model->get_rd_datas($pbill['id']);
            // print_r($pbill);die;
            $this->load->view('admin/rd/print_bill', $data);
        }
    }

    public function print_bound()
    {
        if ($this->input->is_ajax_request()) {

            $pbill = $this->input->post();
            $data['getcmpny'] = $this->Admin_Rd_model->get_company_details();
            $data['pribound'] = $this->Admin_Rd_model->get_rd_datas($pbill['id']);
            $data['sumamt'] = $this->Admin_Rd_model->sum_amt($pbill['user_id']);
            $data['sum_interestamt'] = $this->Admin_Rd_model->sum_interest_amt($pbill['user_id']);
            // print_r($data['sum_interestamt']);die;
            $this->load->view('admin/rd/print_rd_bound', $data);
        }
    }

    public function print_member_details()
    {
        if ($this->input->is_ajax_request()) {

            $pbill = $this->input->post();
            $data['pribound'] = $this->Admin_Rd_model->get_data($pbill['id']);
            $data['sumamt'] = $this->Admin_Rd_model->sum_amt($pbill['user_id']);
            $data['sum_interestamt'] = $this->Admin_Rd_model->sum_interest_amt($pbill['user_id']);
            $this->load->view('admin/rd/print_member_details', $data);
        }
    }

    /* ========================================= PassBook Section ============================================= */

    public function manage_passbook()
    {
        $data['title'] = 'Manage Passbook';
        $data['breadcrumb'] = 'Manage Passbook';
        $this->load->view('admin/rd/manage_passbook', $data);
    }

    public function get_passbook_datas()
    {
        if ($this->input->is_ajax_request()) {
            $pass = $this->input->post('member_id');
            $data['passbook'] = $this->Admin_Rd_model->get_all_rd_datas($pass);
            $this->load->view('admin/rd/get_passbook_datas', $data);
        }
    }

    public function print_passbook()
    {
        if ($this->input->is_ajax_request()) {
            $print = $this->input->post();
            if (!empty($print['from_serial_no']) && !empty($print['to_serial_no'])) {
                if ($print['from_serial_no'] != 0 && $print['to_serial_no'] != 0) {
                    $data['getcmpny'] = $this->Admin_Rd_model->get_company_details();
                    $data['pri_pass'] = $this->Admin_Rd_model->get_all_rd_datas($print['user_id']);
                    $data['from_serial_no'] = $print['from_serial_no'];
                    $data['to_serial_no'] = $print['to_serial_no'];
                    $data['page'] = $print['page'];
                    $data['line_no'] = $print['line_no'];
                    $this->load->view('admin/rd/print_passbook', $data);
                } else {
                    echo "<h2 align='center'> 🙄 Please Enter Valid Serial Number ! 🙄</h2>";
                }
            } else {
                echo "<h2 align='center'>🙄 Please Enter  Serial Number ! 🙄</h2>";
            }
        }
    }

    /* ========================================= Close Rd Plan Section ============================================= */

    public function closr_rd_plan()
    {
        if ($this->input->is_ajax_request()) {
            $rd = $this->input->post();
            $data['close_rd'] = $this->Admin_Rd_model->get_data($rd['id']);
            $data['interest_amt'] = $this->Admin_Common_model->sum_all('interest_amount', 'rd_payment_details', array('rd_id' => $rd['id'], 'status' => 2));
            $data['only_per'] = $this->Admin_Common_model->last_payment('interest_amount', 'rd_payment_details', array('rd_id' => $rd['id'], 'status' => 2));
            // echo "<pre>";  print_r($data['interest_amt']);die;
            $data['sum_of_amo'] = $this->Admin_Common_model->get_sum_of_amo('sum(rpd.paid_amount) as sum_paid_amo,count(rpd.paid_amount) as total_paid_due', 'rd_payment_details as rpd', array('rpd.rd_id' => $data['close_rd']['mem_id'], 'status' => 2));
            $data['total_amt'] = $this->Admin_Common_model->sum_all('amount', 'rd_payment_details', array('rd_id'
            => $rd['id'], 'status' => 2));
            $this->load->view('admin/rd/close_rd_plan', $data);
        }
    }

   

    public function add_close_rd_plan_data()
    {

        // echo "sdfasdf";die;
        //   $data  = $this->input->post();
        //   print_r($data);die;
        // $this->form_validation->set_rules('interest_amt_permission', 'Interest Amount', 'required');
        // $this->form_validation->set_rules('total_paid_amount', 'Paid Amount', 'required');
        $this->form_validation->set_rules('mop', 'Mode of Payment', 'required');
        $this->form_validation->set_rules('paid_date', 'Paid Date', 'required');

        if ($this->form_validation->run() == TRUE) {

            $close = $this->input->post();

            $close_rd = array(
                'maturity_sec' => $close['maturity_sec'],
                'preMaturity' => $close['preMaturity'],
                'user_id' => $close['user_id'],
                'rd_id' => $close['rd_id'],
                'total_amount' => $close['total_amount'],
                'total_interest_amount' => $close['total_interest_amount'],
                'interest_amt_permission' => $close['interest_amt_permission'],
                'total_paid_amount' => $close['total_paid_amount'],
                'mop' => $close['mop'],
                'paid_date' => $close['e_reg_paid_date'],
                'penalty_amount' => $close['penalty_amount'],
                'payment_remarks' => $close['payment_remarks'],
                'created_by_user_type_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d')

            );


            if ($close['maturity_sec'] == 1) {
                $this->Admin_Rd_model->insert_close_rd_data($close_rd);
            } else if ($close['maturity_sec'] == 2 && $close['preMaturity'] == 1) {
                $close_rd = array(
                    'maturity_sec' => $close['maturity_sec'],
                    'preMaturity' => $close['preMaturity'],
                    'user_id' => $close['user_id'],
                    'rd_id' => $close['rd_id'],
                    'total_amount' => $close['total_amount'],
                    'total_interest_amount' => '0',
                    // 'interest_amt_permission' => $close['interest_amt_permission'],
                    'total_paid_amount' => $close['total_paid_amount_1'],
                    'mop' => $close['mop'],
                    'paid_date' => $close['paid_date'],
                    // 'penalty_amount' => $close['penalty_amount'],
                    'payment_remarks' => $close['payment_remarks'],
                    'created_by_user_type_id' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d')
                );
                $this->Admin_Rd_model->insert_close_rd_data($close_rd);
            } else if ($close['maturity_sec'] == 2 && $close['preMaturity'] == 2) {


                $close_rd = array(
                    'maturity_sec' => $close['maturity_sec'],
                    'preMaturity' => $close['preMaturity'],
                    'user_id' => $close['user_id'],
                    'rd_id' => $close['rd_id'],
                    'total_amount' => $close['total_amount'],
                    'total_interest_amount' => $close['e_reg_preM_rate'],
                    'interest_amt_permission' => $close['interest_amt_permission'],
                    'total_paid_amount' => $close['e_reg_total_Amo'],
                    'mop' => $close['mop'],
                    'paid_date' => $close['paid_date'],
                    'penalty_amount' => $close['e_reg_pan_rate'],
                    'preMaturity' => $close['e_reg_preM_rate'],
                    'payment_remarks' => $close['payment_remarks'],
                    'created_by_user_type_id' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d')
                );
                $this->Admin_Rd_model->insert_close_rd_data($close_rd);
            }

            $status = array(
                'rd_id' => $close['rd_id'],
                'status' => 3,
            );
            $this->Admin_Rd_model->update_status($status);


            $clo = array(
                'id' => $close['rd_id'],
                'closed_plan' => 2,
            );
            $this->Admin_Rd_model->update_closed_plan($clo);
            $data = array('text' => 'Close Rd Data Added Successfully', 'icon' => 'success');
        } else {
            $msg = array(
                // 'interest_amt_permission' => form_error('interest_amt_permission'),
                // 'total_paid_amount' => form_error('paid_amount'),
                'mop' => form_error('mop'),
                'paid_date' => form_error('paid_date'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }

    public function manage_close_rd_plan()
    {
        $data['title'] = 'Manage Close RD Plan';
        $data['breadcrumb'] = 'Manage Close RD Plan';
        $data['close_rd'] = $this->Admin_Rd_model->all_close_rd_plan_data();
        $this->load->view('admin/rd/manage_close_rd_plan', $data);
    }

    public function view_close_rd_plan()
    {
        if ($this->input->is_ajax_request()) {
            $view = $this->input->post();
            $data['view_close_rd'] = $this->Admin_Rd_model->get_close_rd_plan_data($view['id']);
            // echo $this->db->last_query();
            // die;
            $this->load->view('admin/rd/view_close_rd_plan', $data);
        }
    }
}
