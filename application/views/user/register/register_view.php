
<?php if ($regis['status'] == 1) {
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
                    <b>Name</b>
                    <a class="float-right">
                        <?php echo $regis['name'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Father Name</b>
                    <a class="float-right">
                        <?php echo $regis['father_name'];?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Grand Father Name</b>
                    <a class="float-right">
                        <?php echo $regis['grand_father'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Date Of Birth</b>
                    <a class="float-right">
                        <?php echo $regis['dob'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Caste</b>
                    <a class="float-right">
                        <?php echo $regis['caste']  ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Sub Caste</b>
                    <a class="float-right">
                        <?php echo $regis['sub-caste'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Community</b>
                    <a class="float-right">
                        <?php echo $regis['community'] ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Relation Status</b>
                    <a class="float-right">
                        <?php 
                         if($regis['relation_status'] == 1){ 
                             echo "Father";
                         }elseif($regis['relation_status'] == 2) {
                             echo "Mother";
                         }elseif($regis['relation_status'] == 3){
                             echo "Brother";
                         }elseif($regis['relation_status'] == 4){
                             echo "Sister";
                         }elseif($regis['relation_status'] == 5){
                             echo "Husband";
                         }elseif($regis['relation_status'] == 6){
                             echo "Wife";
                         }elseif($regis['relation_status'] == 7){
                             echo "Son";
                         }elseif($regis['relation_status'] == 8){
                             echo "Daughter";
                         }elseif($regis['relation_status'] == 9){
                             echo "Son-In-Law";
                         }elseif($regis['relation_status'] == 10){
                             echo "Father-In-Law";
                         }elseif($regis['relation_status'] == 11){
                             echo "Brother-In-Law";
                         }elseif($regis['relation_status'] == 12){
                             echo "Daughter-In-Law";
                         }elseif($regis['relation_status'] == 13){
                             echo "Mother-In-Law";
                         }elseif($regis['relation_status'] == 14){
                             echo "Sister-In-Law";
                         }elseif($regis['relation_status'] == 15){
                             echo "Other";
                         }
                        ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b>Password</b>
                    <a class="float-right">
                        <?php echo $regis['password'];?>
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
                            <?php echo $regis['mobile'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Email Id</b>
                        <a class="float-right">
                            <?php echo $regis['mail'];?>
                        </a>
                    </li>
                </ul>
            </div>
            <h4 class="text-center">Occupation Details</h4>
            <div class="row">
                <div class="col-md-12">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Sector</b>
                        <a class="float-right">
                            <?php echo $regis['sect'];?>
                        </a>
                    </li>
                    <?php if($regis['sector'] == 18) { ?>
                        <li class="list-group-item">
                            <b>Type of Business</b>
                            <a class="float-right">
                                <?php echo $regis['bus_typ'];?>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="list-group-item">
                        <b>industeries</b>
                        <a class="float-right">
                            <?php echo $regis['indus'];?>
                        </a>
                    </li>
                </ul>
                </div>
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
                        <b>Village/City</b>
                        <a class="float-right">
                            <?php echo $regis['tvillage'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Bulding / House Number *</b>
                        <a class="float-right">
                            <?php echo $regis['tbulding'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Landmark</b>
                        <a class="float-right">
                            <?php echo $regis['tlandmark'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select State </b>
                        <a class="float-right">
                            <?php echo $regis['temporary_state'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Selct Distric</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_distric'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Police Station</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_police_station'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Block</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_block_office'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Post Office</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_post_office'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Pin Code</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_pin_code'];?>
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
                        <b>Village/City</b>
                        <a class="float-right">
                            <?php echo $regis['pvillage'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Bulding / House Number *</b>
                        <a class="float-right">
                            <?php echo $regis['pbulding'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Landmark</b>
                        <a class="float-right">
                            <?php echo $regis['plandmark'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select State </b>
                        <a class="float-right">
                            <?php echo $regis['parmanent_state'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Selct Distric</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_distric'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Police Station</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_police_station'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Block</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_block_office'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Post Office</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_post_office'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Select Pin Code</b>
                        <a class="float-right">
                            <?php echo $regis['temporary_pin_code'];?>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
        <h4 class="text-center" style="margin-top: 32px;">Business Details</h4>
        <?php if($regis['sector'] == 18) { ?>
            <div class="col-md-12">
                <ul class="list-group list-group-unbordered mb-3">
               
                    <li class="list-group-item">
                        <b>Business Name</b>
                        <a class="float-right">
                            <?php echo $regis['business_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Registration Number</b>
                        <a class="float-right">
                            <?php echo $regis['registration_number'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Registration Address</b>
                        <a class="float-right">
                            <?php echo $regis['registration_address'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Email Id</b>
                        <a class="float-right">
                            <?php echo $regis['email'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Contact Number</b>
                        <a class="float-right">
                            <?php echo $regis['contact_no'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>GST</b>
                        <a class="float-right">
                            <?php if($regis['gst'] == 1) { echo "Yes"; } elseif($regis['gst'] == 2) {echo "No"; } ?>
                        </a>
                    </li>
                    <?php if($regis['gst'] == 1) { ?>
                        <li class="list-group-item">
                            <b>GST No.</b>
                            <a class="float-right">
                                <?php echo $regis['gst_no'];?>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="list-group-item">
                        <b>Business ITR File Details</b>
                        <a class="float-right">
                            <?php if($regis['itr_file'] == 1) { echo "Yes"; } elseif($regis['itr_file'] == 2) {echo "No"; } ?>
                        </a>
                    </li>
                    <?php if($regis['itr_file'] == 1) { ?>
                        <li class="list-group-item">
                            <b>Last ITR Details</b>
                            <a class="float-right">
                                <?php echo $regis['last_itr'];?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Last Year Finance Turn Over</b>
                            <a class="float-right">
                                <?php echo $regis['last_year_finance'];?>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Enter Firm or CA No.</b>
                            <a class="float-right">
                                <?php echo $regis['firm_or_ca_no'];?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php } else {
                echo "<h5 style='text-align:center; margin-top:50px; color:#007bff;'>No Data Available</h5>";
            } ?>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <h4 class="text-center" style="margin-top: 32px;">Legal & Audit</h4>
            <div class="col-md-12">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Do You Have GST</b>
                        <a class="float-right">
                         <?php if($regis['legal_gst'] == 1) { echo "Yes"; } elseif($regis['legal_gst'] == 2) { echo "No"; } ?>
                        </a>
                    </li>
                    <?php if($regis['legal_gst'] == 1) { ?>
                        <li class="list-group-item">
                            <b>GST No.</b>
                            <a class="float-right">
                                <?php echo $regis['legal_gst_no'];?>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="list-group-item">
                        <b>Do You File ITR</b>
                        <a class="float-right">
                         <?php if($regis['legal_itr_file'] == 1) { echo "Yes"; } elseif($regis['legal_itr_file'] == 2) {echo "No"; } ?>
                        </a>
                    </li>
                    <?php if($regis['legal_itr_file'] == 1) { ?>
                    <li class="list-group-item">
                        <b>Since When are You Filling ITR </b>
                        <a class="float-right">
                           <?php if($regis['legal_filling_itr'] == 1) { echo "1 year"; } elseif($regis['legal_filling_itr'] == 2) {echo "2 Year"; } elseif($regis['legal_filling_itr'] ==3) { echo "3 Year"; } elseif($regis['legal_filling_itr'] ==4) { echo "4 Year"; } elseif($regis['legal_filling_itr'] ==5) { echo "5 Year"; } elseif($regis['legal_filling_itr'] == 6) { echo "6 Year"; } elseif($regis['legal_filling_itr'] == 7) { echo "7 Year"; } elseif($regis['legal_filling_itr'] == 8) { echo "8 Year"; } elseif($regis['legal_filling_itr'] == 9) { echo "9 Year"; } elseif($regis['legal_filling_itr'] == 10) { echo "10 Year"; } ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Last Year Turn Over</b>
                        <a class="float-right">
                            <?php echo $regis['legal_last_year_turnover'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Enter Firm Name</b>
                        <a class="float-right">
                            <?php echo $regis['legal_firm_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Enter CA Name</b>
                        <a class="float-right">
                         <?php echo $regis['legal_ca_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Enter CA Mobile No.</b>
                        <a class="float-right">
                            <?php echo $regis['legal_ca_mobile_no'];?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
            <?php if($regis['area_type'] == 1) { ?>
                <h4 class="text-center">Voter Information</h4>
                <h5 class="text-center">Rural</h5>
            <?php } elseif($regis['area_type'] == 2){ ?>
                <h4 class="text-center">Voter Information</h4>
                <h5 class="text-center">Urban</h5>
            <?php } ?>   
            <div class="row">
                <div class="col-md-12">
                <ul class="list-group list-group-unbordered mb-3">
                    <?php if($regis['area_type'] == 1) { ?>
                    <li class="list-group-item">
                        <b>Voter ID Number</b>
                        <a class="float-right">
                            <?php echo $regis['voter_id'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Distric</b>
                        <a class="float-right">
                            <?php echo $regis['rural_distric'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Block Office</b>
                        <a class="float-right">
                            <?php echo $regis['rural_block'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Constituency</b>
                        <a class="float-right">
                            <?php echo $regis['rural_constituency'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Panchyat</b>
                        <a class="float-right">
                            <?php echo $regis['rural_panchayat'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Polling Booth Number</b>
                        <a class="float-right">
                            <?php echo $regis['rural_polling_num'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Polling Booth Name</b>
                        <a class="float-right">
                            <?php echo $regis['rural_polling_nm'];?>
                        </a>
                    </li>
                    <?php } elseif($regis['area_type'] == 2){ ?>
                    <li class="list-group-item">
                        <b>Voter ID Number</b>
                        <a class="float-right">
                            <?php echo $regis['voter_id'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>District</b>
                        <a class="float-right">
                            <?php echo $regis['urban_district'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Assembly Constitution</b>
                        <a class="float-right">
                            <?php echo $regis['urban_assembly'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Muncipal Coorperation</b>
                        <a class="float-right">
                            <?php echo $regis['urban_muncipal_corp'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Ward Number</b>
                        <a class="float-right">
                            <?php echo $regis['urban_ward_num'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Ward Councillors Name</b>
                        <a class="float-right">
                            <?php echo $regis['urban_ward_concillor_name'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>House No.</b>
                        <a class="float-right">
                            <?php echo $regis['urban_hse_no'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Polling Booth Number</b>
                        <a class="float-right">
                            <?php echo $regis['urban_polling_num'];?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Polling Booth Name</b>
                        <a class="float-right">
                            <?php echo $regis['urban_polling_nm'];?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                </div>
            </div>
        </div> 
    </div>
</div>