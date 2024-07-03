<?php
if ($view_rd['status'] == 1) {
    echo "<span class='text-success'><b> Active <i class='fa fa-check'></i> </b></span>";
} else {
    echo "<span class='text-danger'><b> De-Active <i class='fa fa-times'></i> </b></span>";
}  ?>
<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
            <div class="col-12 col-md-12 col-lg-12">
                <h4 class="text-center">Member Details</h4>
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-sm">Member Name
                            <b class="d-block"><?php echo $view_rd['nm']."(".$view_rd['u_id'].")" ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Mobile
                            <b class="d-block"><?php echo $view_rd['mob'] ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Email
                            <b class="d-block"><?php echo $view_rd['ml'] ?></b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Receipt No.</b>
                            <a class="float-right">
                                <?php echo $view_rd['receipt_no'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Account No.</b>
                            <a class="float-right">
                                <?php echo $view_rd['account_no'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>RD Plan</b>
                            <a class="float-right">
                                <?php echo $view_rd['p_nm'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>RD Date</b>
                            <a class="float-right">
                                <?php echo $view_rd['rd_date'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Duration</b>
                            <a class="float-right">
                                <?php if ($view_rd['interval'] == 1) {
                                    echo $view_rd['duration'] . " Months"; } elseif($view_rd['interval'] == 2) { echo $view_rd['duration']. "Year"; } ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Amount</b>
                            <a class="float-right">
                                <?php echo $view_rd['amount'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b><?php echo ($view_rd['plan_type'] == 1) ? "Contribution Amount"  : "Interest Percent" ?></b>
                            <a class="float-right">
                                <?php echo $view_rd['interest_percent'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>RD Added Date</b>
                            <a class="float-right">
                                <?php echo $view_rd['created_at'] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>