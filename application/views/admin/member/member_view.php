<?php if ($viewmember['status'] == 1) {
    echo "<span class='text-success'><b> Approved <i class='fa fa-check'></i> </b></span>";
} else {
    echo "<span class='text-warning'><b> Pending <i class='fa fa-exclamation-triangle'></i> </b></span>";
}  ?>
<div class="card-body">
    <div class="row">
        <div class="col-6 col-sm-6">
          <h4 class="text-center">Personal Details</h4>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>User Id</b>
                    <a class="float-right">
                        <?php echo $viewmember['user_id'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Name</b>
                    <a class="float-right">
                        <?php echo $viewmember['name'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Father Name</b>
                    <a class="float-right">
                        <?php echo $viewmember['father_name'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Nominee Name</b>
                    <a class="float-right">
                        <?php echo $viewmember['nominee_name'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Relation</b>
                    <a class="float-right">
                        <?php echo $viewmember['relation'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Date Of Birth</b>
                    <a class="float-right">
                        <?php echo $viewmember['dob'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Password</b>
                    <a class="float-right">
                        <?php echo $viewmember['password'];?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <h4 class="text-center">Contact Details</h4>
            <div class="col-md-12">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Mobile No.</b>
                        <a class="float-right">
                            <?php echo $viewmember['mobile'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Email Id</b>
                        <a class="float-right">
                            <?php echo $viewmember['mail'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Agent ID</b>
                        <a class="float-right">
                            <?php echo "IMBLL".$viewmember['agent_id'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Agent</b>
                        <a class="float-right">
                            <?php echo $viewmember['agent_name'];?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
            <h4 class="text-center">Temporary Address</h4>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Full Address</b>
                            <a class="float-right">
                                <?php echo $viewmember['temporary_address'];?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>state</b>
                            <a class="float-right">
                                <?php echo $viewmember['temporary_state'];?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Pin Code</b>
                            <a class="float-right">
                                <?php echo $viewmember['temporary_pin'];?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <h4 class="text-center">Parmanent Address</h4>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Full Address</b>
                            <a class="float-right">
                                <?php echo $viewmember['permanent_address'];?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>state</b>
                            <a class="float-right">
                                <?php echo $viewmember['permanent_state'];?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Pin Code</b>
                            <a class="float-right">
                                <?php echo $viewmember['permanent_pin'];?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <h4 class="text-center">KYC Details</h4>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>PAN Card No.</b>
                    <a class="float-right">
                        <?php echo $viewmember['pan_no'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Identity Proof No.</b>
                    <a class="float-right">
                        <?php echo $viewmember['id_proof_no'];?>
                    </a>
                </li>
            </ul>
            <h4 class="text-center">KYC Documents</h4>
            <div class="row">
                <div class="col-4">
                    <p class="float-left">
                        <b>PAN Card Image</b>
                    </p>
                </div>
                <div class="col-4">
                    <p class="float-left">
                        <b>Identity Proof Image</b>
                    </p>
                </div>
                <div class="col-4">
                    <p class="float-left">
                        <b>Signature Proof Image</b>
                    </p>
                </div>
                <div class="col-4">
                    <p class="float-left">
                        <img class="profile_img" style="width:100%; height: 170px;" src="<?php echo !empty($viewmember['pan_img']) ? $viewmember['pan_img'] : base_url("uploads/no_image.jpg") ?>" alt="User KYC document">
                    </p>
                </div>
                <div class="col-4">
                    <p class="float-left">
                        <img class="profile_img" style="width:100%; height: 170px;" src="<?php echo !empty($viewmember['identity_proof_img']) ? $viewmember['identity_proof_img'] : base_url("uploads/no_image.jpg") ?>" alt="User KYC document">
                    </p>
                </div>
                <div class="col-4">
                    <p class="float-left">
                        <img class="profile_img" style="width:100%; height: 170px;" src="<?php echo !empty($viewmember['signature_proof_img']) ? $viewmember['signature_proof_img'] : base_url("uploads/no_image.jpg") ?>" alt="User KYC document">
                    </p>
                </div>
                <div class="col-4">
                    <p class="float-left">
                        <b>Address Proof Image</b>
                    </p>
                </div>
                <div class="col-8">
                    <p class="float-left">
                        <b>Bank Statement of the past 6 month Image</b>
                    </p>
                </div>
                <div class="col-4">
                    <p class="float-left">
                        <img class="profile_img" style="width:100%; height: 170px;" src="<?php echo !empty($viewmember['address_proof_img']) ? $viewmember['address_proof_img'] : base_url("uploads/no_image.jpg") ?>" alt="User KYC document">
                    </p>
                </div>
                <div class="col-8">
                    <p class="float-left">
                        <img class="profile_img" style="width:100%; height: 170px;" src="<?php echo !empty($viewmember['bank_statement_img']) ? $viewmember['bank_statement_img'] : base_url("uploads/no_image.jpg") ?>" alt="User KYC document">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>