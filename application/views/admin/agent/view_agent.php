<?php
if ($vw_agent['status'] == 1) {
    echo "<span class='text-success'><b> Active <i class='fa fa-check'></i> </b></span>";
} else {
    echo "<span class='text-danger'><b> De-Active <i class='fa fa-times'></i> </b></span>";
}  ?>
<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Agent Id</b>
                            <a class="float-right">
                                <?php echo "IMBLL".$vw_agent['agent_id'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Agent Name</b>
                            <a class="float-right">
                                <?php echo $vw_agent['name'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Date of Birth</b>
                            <a class="float-right">
                                <?php echo $vw_agent['dob'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Mobile No.</b>
                            <a class="float-right">
                                <?php echo $vw_agent['mobile'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>E-mail</b>
                            <a class="float-right">
                                <?php echo $vw_agent['mail'] ?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Address</b>
                            <a class="float-right">
                                <?php echo $vw_agent['address'] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>