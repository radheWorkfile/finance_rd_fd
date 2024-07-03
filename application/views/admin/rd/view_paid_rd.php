<!-- <?php
if ($view_rd_paid['status'] == 1) {
    echo "<span class='text-success'><b> Active <i class='fa fa-check'></i> </b></span>";
} else {
    echo "<span class='text-danger'><b> De-Active <i class='fa fa-times'></i> </b></span>";
} ?> -->
<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
            <div class="col-12 col-md-12 col-lg-12">
                <h4 class="text-center">Paid RD Payment Details</h4>
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-sm">Amount
                            <b class="d-block">
                                <?php echo $view_rd_paid['amount'] ?>
                            </b>
                        </p>
                    </div>
                    <?php if ($view_rd_paid['plan_type'] == 1) { ?>
                        <div class="col-md-4">
                            <p class="text-sm">Contribution Amount
                                <b class="d-block">
                                    <?php echo $view_rd_paid['interest_percent'] ?>
                                </b>
                            </p>
                        </div>
                    <?php }  ?>
                       
                    <div class="col-md-4">
                        <p class="text-sm">RD Payment Date
                            <b class="d-block">
                                <?php echo date('d-m-Y',strtotime($view_rd_paid['payment_date'])) ?>
                            </b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Paid Amount
                            <b class="d-block">
                                <?php echo $view_rd_paid['paid_amount'] ?>
                            </b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Penalty Amount
                            <b class="d-block">
                                <?php if (!empty($view_rd_paid['penalty_amount'])) {
                                    echo $view_rd_paid['penalty_amount'];
                                } else {
                                    echo "0";
                                } ?>
                            </b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Mode of Payment
                            <b class="d-block">
                                <?php if ($view_rd_paid['mop'] == 1) {
                                    echo "Online";
                                } elseif ($view_rd_paid['mop'] == 2) {
                                    echo "Cheque";
                                } elseif ($view_rd_paid['mop'] == 3) {
                                    echo "Cash";
                                } ?>
                            </b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Pay Date
                            <b class="d-block">
                                <?php echo date('d-m-Y',strtotime($view_rd_paid['pay_date'])) ?>
                            </b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Payment Remark
                            <b class="d-block">
                                <?php echo $view_rd_paid['payment_remarks'] ?>
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="text-center">
                <b>Receipt</b>
            </p>
        </div>
        <div class="col-12">
            <p class="text-center">
                <img class="profile_img"
                    src="<?php echo !empty($view_rd_paid['recipet']) ? $view_rd_paid['recipet'] : base_url("uploads/no_image.jpg") ?>"
                    alt="User EMI Paid Receipt document" style="width:100%;">
            </p>
        </div>
    </div>
</div>