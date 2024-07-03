
<h4 class="text-center">Voter Information</h4>
    <?php if($vtr_data['area_type'] == 1) { ?>
        <h5 class="text-center">Rural</h5>
    <?php } elseif($vtr_data['area_type'] == 2){ ?>
        <h5 class="text-center">Urban</h5>
    <?php } ?>   
    <div class="row">
        <div class="col-md-12">
        <ul class="list-group list-group-unbordered mb-3">
            <?php if($vtr_data['area_type'] == 1) { ?>
            <li class="list-group-item">
                <b>Voter ID Number</b>
                <a class="float-right">
                    <?php echo $vtr_data['voter_id'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Distric</b>
                <a class="float-right">
                    <?php echo $vtr_data['rural_distric'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Block Office</b>
                <a class="float-right">
                    <?php echo $vtr_data['rural_block'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Constituency</b>
                <a class="float-right">
                    <?php echo $vtr_data['rural_constituency'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Panchyat</b>
                <a class="float-right">
                    <?php echo $vtr_data['rural_panchayat'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Polling Booth Number</b>
                <a class="float-right">
                    <?php echo $vtr_data['rural_polling_num'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Polling Booth Name</b>
                <a class="float-right">
                    <?php echo $vtr_data['rural_polling_nm'];?>
                </a>
            </li>
            <?php } elseif($vtr_data['area_type'] == 2) { ?>
            <li class="list-group-item">
                <b>Voter ID Number</b>
                <a class="float-right">
                    <?php echo $vtr_data['voter_id'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>District</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_district'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Assembly Constitution</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_assembly'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Muncipal Coorperation</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_muncipal_corp'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Ward Number</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_ward_num'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Ward Councillors Name</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_ward_concillor_name'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>House No.</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_hse_no'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Polling Booth Number</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_polling_num'];?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Polling Booth Name</b>
                <a class="float-right">
                    <?php echo $vtr_data['urban_polling_nm'];?>
                </a>
            </li>
            <?php } ?>
        </ul>
        </div>
    </div>