<?php
if ($view_fd['status'] == 1) {
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
                            <b class="d-block"><?php echo $view_fd['nm']."(".$view_fd['u_id'].")" ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Mobile
                            <b class="d-block"><?php echo $view_fd['mob'] ?></b>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-sm">Email
                            <b class="d-block"><?php echo $view_fd['ml'] ?></b>
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
                                <?php echo $view_fd['receipt_no'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Account No.</b>
                            <a class="float-right">
                                <?php echo $view_fd['account_no'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>FD Plan</b>
                            <a class="float-right">
                                <?php echo $view_fd['p_nm'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>FD Date</b>
                            <a class="float-right">
                                <?php echo $view_fd['fd_date'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Duration</b>
                            <a class="float-right">
                                <?php if ($view_fd['interval'] == 1) {
                                echo $view_fd['duration'] . " Months"; } elseif($view_fd['interval'] == 2) { echo $view_fd['duration']. "Year"; } ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Amount</b>
                            <a class="float-right">
                                <?php echo $view_fd['amount'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b><?php echo ($view_fd['plan_type'] == 1) ? "Contribution Amount"  : "Interest Percent" ?></b>
                            <a class="float-right">
                                <?php echo $view_fd['interest_percent'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>RD Added Date</b>
                            <a class="float-right">
                                <?php echo $view_fd['created_at'] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>