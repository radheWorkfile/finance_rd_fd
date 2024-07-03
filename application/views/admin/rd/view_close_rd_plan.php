<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
            <div class="col-12 col-md-12 col-lg-12">
                <h4 class="text-center">Paid RD Payment Details</h4>
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-sm">Member
                            <b class="d-block"><?php echo $view_close_rd['member_name'] . "(" . $view_close_rd['member_id'] . ")" ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">RD Plan
                            <b class="d-block"><?php echo $view_close_rd['p_nm']?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Total Amount
                            <b class="d-block"><?php echo $view_close_rd['total_amount']?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Total Interest Amount
                            <b class="d-block"><?php echo $view_close_rd['total_interest_amount']?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Interest Amount
                            <b class="d-block"><?php if ($view_close_rd['interest_amt_permission'] == 1) {
                                echo "Yes";
                            } elseif ($view_close_rd['interest_amt_permission'] == 2) {
                                echo "No"; } ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Total PAid Amount
                            <b class="d-block"><?php echo $view_close_rd['total_paid_amount'] ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Penalty Amount
                            <b class="d-block"><?php if(!empty($view_close_rd['penalty_amount'])) { echo $view_close_rd['penalty_amount']; } else{ echo "0"; } ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Mode of Payment
                            <b class="d-block"><?php if($view_close_rd['mop'] == 1) { echo "Online"; } elseif($view_close_rd['mop'] == 2) { echo "Cheque"; } elseif($view_close_rd['mop'] == 3) { echo "Cash"; } ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Paid Date
                            <b class="d-block"><?php echo $view_close_rd['paid_date'] ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Payment Remark
                            <b class="d-block"><?php echo $view_close_rd['payment_remarks'] ?></b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>