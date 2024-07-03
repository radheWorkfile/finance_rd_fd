<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Fd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Fd_model');
        $this->load->model('Admin_Common_model');
    }

    public function fd()
    {

        $data['title'] = 'Add New FD';
        $data['breadcrumb'] = 'Add New FD';
        $data['member'] = $this->Admin_Fd_model->get_members();
        $data['fd_plan'] = $this->Admin_Fd_model->fd_plan();
        $dat = $this->input->post();
        $this->load->view('admin/fd/add_fd', $data);

    }

    public function get_fd_plan_data()
    {

        if ($this->input->is_ajax_request()) {

            $rpl = $this->input->post();
            $data = $this->Admin_Fd_model->get_fd_plan($rpl['id']);
            echo json_encode($data);

        }

    }

    public function get_member_data()
    {

        if ($this->input->is_ajax_request()) {

            $member = $this->input->post();
            $data = $this->Admin_Common_model->get_data(array('id' => $member['id']),'member');
            // print_r($data);die;
            echo json_encode($data);

        }

    }

    public function add_fd()
    {

        $this->form_validation->set_rules('member_name', 'Member Name', 'required');
        $this->form_validation->set_rules('fd_plan', 'FD Plan', 'required');
        $this->form_validation->set_rules('fd_date', 'FD Date', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');

        if ($this->form_validation->run()) {

            $receipt_no = rand(pow(10, 6 - 1), pow(8, 3) - 1);
            // $account_no = rand(pow(6, 10 - 1), pow(7, 9) - 3);
            $ac = $this->db->select('account_no')->order_by("id", "desc")->limit(1)->get('add_fd')->row_array();
            if (empty($ac)) {
                $account_no = '1481542001';
            } else {
                $account_no = (int) $ac['account_no'] + 1;
            }

            $post = $this->input->post();

            $fd = array(

                'user_id'                 => $post['user_id'],
                'receipt_no'              => $receipt_no,
                'account_no'              => $account_no,
                'member_name'             => $post['member_name'],
                'fd_plan'                 => $post['fd_plan'],
                'fd_date'                 => $post['fd_date'],
                'duration'                => $post['duration'],
                'amount'                  => $post['amount'],
                'interest_percent'        => $post['interest_percent'],
                'created_by_user_type_id' => $this->session->userdata('user_id'),
                'created_at'              => date('Y-m-d'),
                

            );
            $this->Admin_Fd_model->save_data($fd);
            $data = array('text' => 'New FD & Payment Data Added Successfully', 'icon' => 'success');
            /* ============== FD Payment Data =============*/

            $amt = $this->input->post('amount');
            $duration = $this->input->post('duration');
            $interval = $this->input->post('interval');
            $plan_type = $this->input->post('plan_type');
            $interest_percent = $this->input->post('interest_percent');
            $start_date = $this->input->post('fd_date');
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

            $Payment_start_date = date("Y-m-d", strtotime($start_date . $duration . 'year'));

            $total_amt = $amt + $interest_amount;

                $value = $this->input->post();
                $id = $this->Admin_Fd_model->get_fd_id($value);

                $fd_pay = array(

                    'fd_id' => $id['id'],
                    'user_id' => $this->input->post('user_id'),
                    'receipt_no' => $receipt_no,
                    'account_no' => $account_no,
                    'member_name' => $this->input->post('member_name'),
                    'fd_plan' => $this->input->post('fd_plan'),
                    'fd_date' => $this->input->post('fd_date'),
                    'duration' => $this->input->post('duration'),
                    'payment_date' => $Payment_start_date,
                    'amount' => $this->input->post('amount'),
                    'interest_amount' => $interest_amount,
                    'interest_percent' => $this->input->post('interest_percent'),
                    'total_amount' => $total_amt,
                    'created_by_user_type_id' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d'),

                );
                $this->Admin_Fd_model->insert_fd_payment_data($fd_pay);
                $data = array('text' => 'New FD & Payment Data Added Successfully', 'icon' => 'success');
            
        } else {
            $msg = array(
                'member_name'      => form_error('member_name'),
                'fd_plan'          => form_error('fd_plan'),
                'fd_date'          => form_error('fd_date'),
                'duration'         => form_error('duration'),
                'amount'           => form_error('amount'),
                'interest_percent' => form_error('interest_percent'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);
    }

    public function manage_fd()
    {

        $data['title'] = 'Manage FD Data';
        $data['breadcrumb'] = 'Manage FD Data';
        $this->load->view('admin/fd/manage_fd', $data);

    }

    public function fd_data()
    {

        $post_data = $this->input->post();
        $record = $this->Admin_Fd_model->all_fd_data($post_data);
        $i = $post_data['start'] + 1;

        $return['data'] = array();
        foreach ($record as $row) {

            $view = '<a href="javascript:void(0);" data-toggle="modal" data-target="#view_fd_modal"
            onclick="view_fd(' . $row->id . ')" title="Click to View RD Data Details"><i class="fas fa-eye text-success"></i></a>&emsp;
            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_fd_payment_modal" onclick="view_fd_payment_details(' . $row->id . ')" title="Click to View Fd Payment Data Details"><i class="fas fa-eye text-danger"></i></a>&emsp;
            <a href="javascript:void(0);" data-toggle="modal" data-target="#update_fd_modal"
            onclick="update_fd(' . $row->id . ')" title="Click to Update RD Data Details"><i class="fas fa-edit"></i></a>&emsp;';
            
            $status = ($row->status == 1) ? 
            '<a style="color:green" href="javascript:void()" onClick="return changeStatus(\'' . $row->id . '\',\'0\',\'add_fd\',\'admin/common/chageStatus\')" title="Click to Di-Active RD Details Data"><b><i class="fa fa-check"></i> </b></a>&emsp;'
            :
            '<a style="color:red"  href="javascript:void()"  onClick="return changeStatus(\'' . $row->id . '\',\'1\',\'add_fd\',\'admin/common/chageStatus\')" title="Click to Active RD Details Data "><b><i class="fa fa-times"></i> </b></a>&emsp;';

            if($row->closed_plan == 1) {
               $cls_pln = '<a href="javascript:void(0);" class="btn-sm btn-primary" data-toggle="modal" data-target="#pay_emi_modal" onclick="close_fd_plan('. $row->id .')" title="Click to Pay EMI">Close Fd Plan</a>';
            } else {
                $cls_pln = '<b class="text-danger"> Plan Closed <i class="fa fa-times"></i> </b>';
            } 

            $print_fd = '<a href="javascript:void(0);" style="margin-left:10px;" data-toggle="modal" data-target="#print_bill" onclick="print_member_details('. $row->id .', '. $row->user_id .')" title="Click to Print Member Details"><i class="fas fa-print text-primary"></i></a>';

            $return['data'][] = array(

                $i++,
                $row->nm . "(" . $row->u_id . ")",
                $row->pln_nm,
                $row->amount,
                $row->fd_date,
                $view . "&emsp; <span id='" . $row->id . "'>" . $status . "</span>&emsp;" .$cls_pln . $print_fd,

            );
        }

        $return['recordsTotal'] = $this->Admin_Fd_model->total_count();
        $return['recordsFiltered'] = $this->Admin_Fd_model->total_filter_count($post_data);
        $return['draw'] = $post_data['draw'];
        echo json_encode($return);

    }

    public function view_fd()
    {

        if ($this->input->is_ajax_request()) {

            $vrd = $this->input->post();
            $data['view_fd'] = $this->Admin_Fd_model->get_data($vrd['id']);
            $this->load->view('admin/fd/view_fd', $data);
            
        }

    }

    public function fd_payment_details()
    {
        if ($this->input->is_ajax_request()) {
            $rdpay = $this->input->post();
            $data['vw_rdpay'] = $this->Admin_Fd_model->get_all_fd_payment_details($rdpay['id']);
            // print_r($data['vw_rdpay']);
            // die;
            $this->load->view('admin/fd/view_payment_details', $data);
        }
    }

    public function view_fd_payment_pay()
    {
        if ($this->input->is_ajax_request()) {
            $pay_rd = $this->input->post();
            $data['vw_pay'] = $this->Admin_Fd_model->get_fd_payment_pay_details($pay_rd['id']);
            $this->load->view('admin/fd/pay_fd_payment', $data);
        }
    }

    public function pay_fd_payment_data()
    {

        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required');
        $this->form_validation->set_rules('mop', 'Mode of Payment', 'required');
        $this->form_validation->set_rules('pay_date', 'Pay Date', 'required');
        $this->form_validation->set_rules('payment_remarks', 'Payment Remark', 'required');

        if ($this->form_validation->run() == TRUE) {
            $val = $this->input->post();

            $filename = "FD" . $this->input->post('id') . "(" . $this->input->post('user_id') . ")";
            $config['upload_path']   = './uploads/recipet/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 1024;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;
            $config['file_name']     = $filename;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('recipet')) {
                $msg  = array('error' => $this->upload->display_errors());
                $data = array('text' => $msg, 'icon' => "error");
            } else {
                $img_data = $this->upload->data();
                $img      = base_url('uploads/recipet/' . $img_data['raw_name'] . $img_data['file_ext']);
            }

            $pay_fd = array(
                'id'              => $val['id'],
                'paid_amount'     => $val['paid_amount'],
                'mop'             => $val['mop'],
                'pay_date'        => $val['pay_date'],
                'penalty_amount'  => $val['penalty_amount'],
                'payment_remarks' => $val['payment_remarks'],
                'recipet'         => empty($img) ? '' : $img,
                'status'          => 2
            );
            $this->Admin_Fd_model->update_fd_payment($pay_fd);
            $data = array('text' => 'FD Payment Data Added Successfully', 'icon' => 'success');

        } else {
            $msg = array(
                'paid_amount'     => form_error('paid_amount'),
                'mop'             => form_error('mop'),
                'pay_date'        => form_error('pay_date'),
                'payment_remarks' => form_error('payment_remarks'),
            );
            $data = array('text' => $msg, 'icon' => 'error');
        }
        echo json_encode($data);

    }

    public function paid_fd_payment_view()
    {
        if ($this->input->is_ajax_request()) {

            $vw_paid = $this->input->post();
            $data['view_fd_paid'] = $this->Admin_Fd_model->get_fd_payment_pay_details($vw_paid['id']);
            $this->load->view('admin/fd/view_paid_fd', $data);

        }

    }

    public function update_fd()
    {
        if ($this->input->is_ajax_request()) {

            $urd = $this->input->post();
            $data['memb'] = $this->Admin_Fd_model->get_members();
            $data['fd_pln'] = $this->Admin_Fd_model->fd_plan();
            $data['up_fd'] = $this->Admin_Fd_model->get_data($urd['id']);
            $this->load->view('admin/fd/update_fd', $data);

        }

    }

    public function update_fd_data()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('member_name', 'Member Name', 'required');
            $this->form_validation->set_rules('fd_plan', 'RD Plan', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('fd_date', 'Rd Date', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required');
            $this->form_validation->set_rules('interest_percent', 'Interest Amount', 'required');

            if ($this->form_validation->run()) {
                $up_fd = array(
                    'id' => $this->input->post('id'),
                    'member_name' => $this->input->post('member_name'),
                    'fd_plan' => $this->input->post('fd_plan'),
                    'amount' => $this->input->post('amount'),
                    'fd_date' => $this->input->post('fd_date'),
                    'duration' => $this->input->post('duration'),
                    'interest_percent' => $this->input->post('interest_percent'),
                    'created_by_user_type_id' => $this->session->userdata('user_id')
                );
                $this->Admin_Fd_model->update_data($up_fd);
                $data = array('text' => 'FD Data Updated Successfully', 'icon' => 'success');
            } else {
                $msg = array(
                    'member_name' => form_error('member_name'),
                    'fd_plan' => form_error('fd_plan'),
                    'amount' => form_error('amount'),
                    'fd_date' => form_error('fd_date'),
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
            $data['getcmpny'] = $this->Admin_Fd_model->get_company_details();
            // print_r($data['getcmpny']);die;
            $data['priemi'] = $this->Admin_Fd_model->get_fd_datas($pbill['id']);
            $this->load->view('admin/fd/print_bill', $data);
        }

    }

    public function print_bound()
    {

        if ($this->input->is_ajax_request()) {

            $pbill                   = $this->input->post();
            $data['getcmpny']        = $this->Admin_Fd_model->get_company_details();
            $data['pribound']        = $this->Admin_Fd_model->get_fd_datas($pbill['id']);
            $data['sumamt']          = $this->Admin_Fd_model->sum_amt($pbill['user_id']);
            $data['sum_interestamt'] = $this->Admin_Fd_model->sum_interest_amt($pbill['user_id']);
            $this->load->view('admin/fd/print_fd_bound', $data);

        } 

    }

    public function print_member_details()
    {
        if ($this->input->is_ajax_request()) {

            $pbill = $this->input->post();
            $data['pribound'] = $this->Admin_Fd_model->get_data($pbill['id']);
            $data['sumamt'] = $this->Admin_Fd_model->sum_amt($pbill['user_id']);
            $data['sum_interestamt'] = $this->Admin_Fd_model->sum_interest_amt($pbill['user_id']);
            $this->load->view('admin/fd/print_member_details', $data);

        }
    }

    // /* ========================================= PassBook Section ============================================= */

    // public function manage_passbook()
    // {
    //     $data['title'] = 'Manage Passbook';
    //     $data['breadcrumb'] = 'Manage Passbook';
    //     $this->load->view('admin/rd/manage_passbook', $data);
    // }

    // public function get_passbook_datas()
    // {
    //     if ($this->input->is_ajax_request()) {
    //         $pass = $this->input->post('member_id');
    //         $data['passbook'] = $this->Admin_Fd_model->get_all_rd_datas($pass);
    //         $this->load->view('admin/rd/get_passbook_datas', $data);
    //     }
    // }

    // public function print_passbook()
    // {
    //     if ($this->input->is_ajax_request()) {
    //         $print = $this->input->post();
    //         if (!empty($print['from_serial_no']) && !empty($print['to_serial_no'])) {
    //             if ($print['from_serial_no'] != 0 && $print['to_serial_no'] != 0) {
    //                 $data['getcmpny'] = $this->Admin_Fd_model->get_company_details();
    //                 $data['pri_pass'] = $this->Admin_Fd_model->get_all_rd_datas($print['user_id']);
    //                 $data['from_serial_no'] = $print['from_serial_no'];
    //                 $data['to_serial_no'] = $print['to_serial_no'];
    //                 $data['page'] = $print['page'];
    //                 $data['line_no'] = $print['line_no'];
    //                 $this->load->view('admin/rd/print_passbook', $data);
    //             } else {
    //                 echo "<h2 align='center'> 🙄 Please Enter Valid Serial Number ! 🙄</h2>";
    //             }
    //         } else {
    //             echo "<h2 align='center'>🙄 Please Enter  Serial Number ! 🙄</h2>";
    //         }
    //     }
    // }

    /* ================================= Close Rd Plan Section ======================================= */

    public function closr_fd_plan()
    {

        if ($this->input->is_ajax_request()) {

            $fd = $this->input->post();
            $data['close_fd'] = $this->Admin_Fd_model->get_data($fd['id']);
            $data['interest_amt'] = $this->Admin_Common_model->sum_all('interest_amount', 'fd_payment_details', array('fd_id' => $fd['id'], 'status' => 2));

            $data['total_amt'] = $this->Admin_Common_model->sum_all('amount', 'fd_payment_details', array('fd_id' => $fd['id'], 'status' => 2));
            
            $data['sum_of_amo'] = $this->Admin_Common_model->get_sum_of_amo('sum(fpd.paid_amount) as sum_of_amo,count(fpd.paid_amount) as tot_due', 'fd_payment_details as fpd', array('fpd.member_name' => $data['close_fd']['mem_id'], 'status' => 2));
            
            $this->load->view('admin/fd/close_fd_plan', $data);

        } 

    }

    public function add_close_fd_plan_data()
    {
        // $this->form_validation->set_rules('interest_amt_permission', 'Interest Amount', 'required');
        // $this->form_validation->set_rules('total_paid_amount', 'Paid Amount', 'required');
        $this->form_validation->set_rules('mop', 'Mode of Payment', 'required');
        $this->form_validation->set_rules('paid_date', 'Paid Date', 'required');

        if ($this->form_validation->run() == TRUE) {

            $close = $this->input->post();
            $close_fd = array(
                'maturity_sec' => $close['maturity_sec'],
                'preMaturity' => $close['preMaturity'],
                'user_id' => $close['user_id'],
                'fd_id' => $close['fd_id'],
                'total_amount' => $close['total_amount'],
                'total_interest_amount' => $close['total_interest_amount'],
                'interest_amt_permission' => $close['interest_amt_permission'],
                'paid_date' => $close['paid_date_er'],
                'total_interest_amount' => $close['total_interest_amount'],
                'total_paid_amount' => $close['total_paid_amount'],
                'mop' => $close['mop'],
                // 'penalty_amount' => $close['penalty_amount'],
                'payment_remarks' => $close['payment_remarks_r'],
                'created_by_user_type_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d')
            );
            if($close['maturity_sec'] == 1)
            {
                $this->Admin_Fd_model->insert_close_fd_data($close_fd);
            }else if($close['maturity_sec'] == 2 && $close['preMaturity'] == 1)
            {
                $close_fd = array(
                    'maturity_sec' => $close['maturity_sec'],
                    'preMaturity' => $close['preMaturity'],
                    'user_id' => $close['user_id'],
                    'fd_id' => $close['fd_id'],
                    'total_amount' => $close['total_amount'],
                    'paid_date' => $close['paid_date'],
                    'total_interest_amount' => 0,
                    'total_paid_amount' => $close['total_paid_amount'],
                    'mop' => $close['mop'],
                    'payment_remarks' => $close['payment_remarks_r'],
                    'created_by_user_type_id' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d')
                );
                $this->Admin_Fd_model->insert_close_fd_data($close_fd);

            }else if($close['maturity_sec'] == 2 && $close['preMaturity'] == 2)
            {
                $close_fd = array(
                    'maturity_sec' => $close['maturity_sec'],
                    'preMaturity' => $close['preMaturity'],
                    'user_id' => $close['user_id'],
                    'fd_id' => $close['fd_id'],
                    'total_amount' => $close['total_amount'],
                    'total_interest_amount' => $close['e_reg_preM_rate'],
                    'total_paid_amount' => $close['total_paid_amount_1'],
                    'penalty_amount' => $close['penalty_amount'],
                    'paid_date' => $close['paid_date'],
                    'mop' => $close['mop'],
                    'payment_remarks' => $close['payment_remarks_r'],
                    'created_by_user_type_id' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d')
                );
                $this->Admin_Fd_model->insert_close_fd_data($close_fd);
              
            }



            $status = array(
                'fd_id' => $close['fd_id'],
                'status' => 3,
            );
            $this->Admin_Fd_model->update_status($status);


            $clo = array(
                'id' => $close['fd_id'],
                'closed_plan' => 2,
            );
            $this->Admin_Fd_model->update_closed_plan($clo);
            $data = array('text' => 'Close Fd Data Added Successfully', 'icon' => 'success');
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

    public function manage_close_fd_plan()
    {

        $data['title'] = 'Manage Close FD Plan';
        $data['breadcrumb'] = 'Manage Close FD Plan';
        $data['close_fd'] = $this->Admin_Fd_model->all_close_fd_plan_data();
        $this->load->view('admin/fd/manage_close_fd_plan', $data);

    }

    public function view_close_fd_plan()
    {

        if ($this->input->is_ajax_request()) {

            $view = $this->input->post();
            $data['view_close_fd'] = $this->Admin_Fd_model->get_close_fd_plan_data($view['id']);
            $this->load->view('admin/fd/view_close_fd_plan', $data);

        }

    }

}
?>