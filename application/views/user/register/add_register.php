<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | New Register</title>
    <? $this->load->view('user/include/css') ?>
    <style>
        .lab{
            color: gray;
            font-size: 15px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <? $this->load->view('user/include/header') ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <? $this->load->view('user/include/left') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?php echo $title; ?></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo $breadcrumb; ?></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="card-body">
                            <form id="register_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="row">
                                 <div class="add-listing-form form-submit">

                                    <!-- Personal Details -->
                                    <div class="tr-single-box">
                                        <div class="tr-single-header">
                                            <h4><i class="ti-user"></i> Personal Details</h4>
                                        </div>

                                        <div class="Reveal-other-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="nm" id="nm" placeholder="Enter Full Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="lab">Father Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="fnm" id="fnm" placeholder="Enter Father Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="lab">Grand Father Name </label>
                                                            <input type="text" class="form-control" name="gfnm" id="gfnm" placeholder="Enter Grand Father Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Date Of Birth <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" name="dob" id="dob">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Caste <span class="text-danger">*</span></label>
                                                        <select name="caste" id="caste" class="form-control" onchange="get_subCaste(this.value);">
                                                            <option value="">--- Select One --- </option>
                                                            <?php foreach ($caste as $cas) { ?>
                                                                <option value="<?php echo $cas['id'] ?>"><?php echo $cas['caste']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Sub-Caste <span class="text-danger">*</span></label>
                                                        <select name="sub-caste" id="sub-caste" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Community </label>
                                                        <input type="text" class="form-control" name="community" id="community" placeholder="Enter Community Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Relation Status <span class="text-danger">*</span></label>
                                                        <select name="relation_status" id="relation_status" class="form-control">
                                                            <option value="">--- Select One --- </option>
                                                            <option value="1">Father</option>
                                                            <option value="2">Mother</option>
                                                            <option value="3">Brother</option>
                                                            <option value="4">Sister</option>
                                                            <option value="5">Husband</option>
                                                            <option value="6">Wife</option>
                                                            <option value="7">Son</option>
                                                            <option value="8">Daughter</option>
                                                            <option value="9">Son-In-Law</option>
                                                            <option value="10">Fathe-In-Law</option>
                                                            <option value="11">Brother-In-Law</option>
                                                            <option value="12">Daughter-In-Law</option>
                                                            <option value="13">Mother-In-Law</option>
                                                            <option value="14">Sister-In Law</option>
                                                            <option value="15">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contact Detils -->
                                    <div class="tr-single-box">
                                        <div class="tr-single-header">
                                            <h4><i class="ti-headphone-alt"></i> Contact Details</h4>
                                        </div>

                                        <div class="Reveal-other-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Mobile Number <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="lab">Email Id <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" name="mail" id="mail" placeholder="Enter Email ID">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="tr-single-header">
                                                        <h4><i class="ti-location-pin"></i> Temporary Address</h4>
                                                    </div>
                                                    <div class="Reveal-other-body">
                                                        <div class="form-group">
                                                            <label class="lab">Village / City <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="tvillage" id="tvillage" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Bulding / House Number <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="tbulding" id="tbulding" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Landmark </label>
                                                            <input type="text" class="form-control" name="tlandmark" id="tlandmark" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Select State <span class="text-danger">*</span></label>
                                                            <select name="tstate" id="tstate" class="form-control" onchange="getDistric(this.value)">
                                                                <option value="">--- Select One ---</option>
                                                                <?php foreach ($state as $st) { ?>
                                                                    <option value="<?php echo $st['id'] ?>"><?php echo $st['location']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Selct District <span class="text-danger">*</span></label>
                                                            <select name="tdistric" id="tdistric" class="form-control" onchange="getPolice(this.value)">
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Select Police Station <span class="text-danger">*</span></label>
                                                            <select name="tpolice" id="tpolice" class="form-control">
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Select Block <span class="text-danger">*</span></label>
                                                            <select name="tblock" id="tblock" class="form-control" >
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Select Post Office <span class="text-danger">*</span></label>
                                                            <select name="tpost" id="tpost" class="form-control" onchange="getPin(this.value)">
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Select Pin Code <span class="text-danger">*</span></label>
                                                            <select name="tpin" id="tpin" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="tr-single-header">
                                                        <h4><i class="ti-location-pin"></i> Permanent Address</h4>
                                                    </div>
                                                    <div class="Reveal-other-body">
                                                        <div class="form-group">
                                                            <label class="lab">Village / City <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="pvillage" id="pvillage" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Bulding / House Number <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="pbulding" id="pbulding" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Landmark </label>
                                                            <input type="text" class="form-control" name="plandmark" id="plandmark" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Select State <span class="text-danger">*</span></label>
                                                            <select name="pstate" id="pstate" class="form-control" onchange="getpDistric(this.value)">
                                                                <option value="">--- Select One ---</option>
                                                                <?php foreach ($state as $st) { ?>
                                                                    <option value="<?php echo $st['id'] ?>"><?php echo $st['location']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="lab">Selct District <span class="text-danger">*</span></label>
                                                            <select name="pdistric" id="pdistric" class="form-control" onchange="getpPolice(this.value)">
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Select Police Station <span class="text-danger">*</span></label>
                                                            <select name="ppolice" id="ppolice" class="form-control">
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Select Block <span class="text-danger">*</span></label>
                                                            <select name="pblock" id="pblock" class="form-control">
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Select Post Office <span class="text-danger">*</span></label>
                                                            <select name="ppost" id="ppost" class="form-control" onchange="getpPin(this.value)">
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="lab">Select Pin Code <span class="text-danger">*</span></label>
                                                            <select name="ppin" id="ppin" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ocupation Inforamtion -->
                                    <div class="tr-single-box">
                                        <div class="tr-single-header">
                                            <h4><i class="ti-bag"></i> Occupation Details</h4>
                                        </div>

                                        <div class="Reveal-other-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Sector</label>
                                                        <select name="sector" id="sector" class="form-control" onchange="getIndustries(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <?php foreach ($sector as $sec) { ?>
                                                                <option value="<?php echo $sec['id'] ?>"><?php echo $sec['sector_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="business_type_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Select Type Of Business</label>
                                                        <select name="business_type" id="business_type" class="form-control">
                                                        <option value="">--- Select One --- </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Industries</label>
                                                        <select name="industries" id="industries" class="form-control">
                                                        <option value="">--- Select One --- </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="business_name_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Business Name</label>
                                                        <input type="text" class="form-control" name="business_name" id="business_name" placeholder="Enter Business Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="registration_number_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Registration Number</label>
                                                        <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Enter Registration Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="registered_address_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Registered Address</label>
                                                        <input type="text" class="form-control" name="registration_address" id="registration_address" placeholder="Enter Registered Address">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="email_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Email Id</label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Id">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="contact_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Contact Number</label>
                                                        <input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Contact Number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="photo_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Photo</label><br>
                                                        <input type="file" name="photo" id="photo">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12" id="city_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Current City</label>
                                                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter Current City Wher You Are Working ?....">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Legal & Audit Inforamtion -->
                                    <div class="tr-single-box">
                                        <div class="tr-single-header">
                                            <h4><i class="ti-bag"></i> Legal & Audit</h4>
                                        </div>
                                        <div class="Reveal-other-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Do You Have GST ?</label>
                                                        <select name="legal_gst" id="legal_gst" class="form-control" onchange="getLegalGst(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <option value="1">Yes</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="legal_gst_no_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">GST No.</label>
                                                        <input type="text" name="legal_gst_no" id="legal_gst_no" class="form-control" placeholder="Enter Gst Number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Do You File ITR ?</label>
                                                        <select name="legal_itr_file" id="legal_itr_file" class="form-control" onchange="getLegalItrFile(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <option value="1">Yes</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="filling_itr_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Since When are You Filling ITR ? </label>
                                                        <select name="legal_filling_itr" id="legal_filling_itr" class="form-control" >
                                                            <option value="">--- Select One --- </option>
                                                            <option value="1">1 Year</option>
                                                            <option value="2">2 Year</option>
                                                            <option value="3">3 Year</option>
                                                            <option value="4">4 Year</option>
                                                            <option value="5">5 Year</option>
                                                            <option value="6">6 Year</option>
                                                            <option value="7">7 Year</option>
                                                            <option value="8">8 Year</option>
                                                            <option value="9">9 Year</option>
                                                            <option value="10">10 Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="last_year_turnover_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Last Year Turn Over</label>
                                                        <input type="text" name="legal_last_year_turnover" id="legal_last_year_turnover" class="form-control" placeholder="Enter Last Year Turn Over">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="firm_name_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Enter Firm Name</label>
                                                        <input type="text" name="legal_firm_name" id="legal_firm_name" class="form-control" placeholder="Enter Firm Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="ca_name_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Enter CA Name</label>
                                                        <input type="text" name="legal_ca_name" id="legal_ca_name" class="form-control" placeholder="Enter Enter CA Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="ca_mobile_no_section" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="lab">Enter CA Mobile No.</label>
                                                        <input type="text" name="legal_ca_mobile_no" id="legal_ca_mobile_no" class="form-control" placeholder="Enter CA Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Voter Detils -->
                                    <div class="tr-single-box">
                                        <div class="tr-single-header">
                                            <h4><i class="ti-id-badge"></i> Voter Information</h4>
                                        </div>

                                        <div class="Reveal-other-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Area Type </label>
                                                        <select name="area_type" id="area_type" class="form-control" onchange="vote_show(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <option value="1">Rural </option>
                                                            <option value="2">Urban </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Enter Voter ID Number </label>
                                                        <input type="text" class="form-control" name="voter_id" id="voter_id" placeholder="Enter Voter Id Number">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6" id="urban_district" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select District </label>
                                                        <select name="urban_district" id="urban_district" class="form-control" onchange="getAssmMunc(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <?php foreach ($dist as $dis) { ?>
                                                                <option value="<?php echo $dis['id'] ?>"><?php echo $dis['urban'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="urban_assemblys" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Assembly Constitution </label>
                                                        <select name="urban_assembly" id="urban_assembly" class="form-control" onchange="getPollingNm(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="urban_muncipal_corp" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Muncipal Coorperation </label>
                                                        <select name="urban_muncipal_cor" id="urban_muncipal_cor" class="form-control" onchange="getCoun(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="urban_ward_count" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Ward Councillors Name </label>
                                                        <select name="urban_ward_coun" id="urban_ward_coun" class="form-control" onchange="getWard(this.value)">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="urban_ward_number" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Ward Number </label>
                                                        <select name="urban_ward_no" id="urban_ward_no" class="form-control" onchange="gethouseNo(this.value)">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="urban_house_number" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select House Number </label>
                                                        <select name="urban_house_no" id="urban_house_no" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="urban_polling_name" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Name </label>
                                                        <select name="urban_polling_nm" id="urban_polling_nm" class="form-control" onchange="getPollingNo(this.value)">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="urban_polling_number" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Number </label>
                                                        <select name="urban_polling_num" id="urban_polling_num" class="form-control" >
                                                        </select>
                                                    </div>
                                                </div>

                                                

                                                <div class="col-lg-6 col-md-6" id="rural_districs" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Distric </label>
                                                        <select name="rural_distric" id="rural_distric" class="form-control" onchange="getblock(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <?php foreach ($district as $dis) { ?>
                                                                <option value="<?php echo $dis['id'] ?>"><?php echo $dis['rural'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6" id="rural_blocks" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Block Office </label>
                                                        <select name="rural_block" id="rural_block" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6" id="rural_con" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Constituency </label>
                                                        <select name="rural_cons" id="rural_cons" class="form-control" onchange="getPanchyat(this.value)">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6" id="rural_panchyats" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Panchyat </label>
                                                        <select name="rural_panchyat" id="rural_panchyat" class="form-control" onchange="getPollingName(this.value)">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="rural_polling_name" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Name </label>
                                                        <select name="rural_polling_nm" id="rural_polling_nm" class="form-control" onchange="getPollingNos(this.value)">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="rural_polling_number" style="display:none">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Number </label>
                                                        <select name="rural_polling_num" id="rural_polling_num" class="form-control" >
                                                        </select>
                                                    </div>
                                                </div>

                                                
                                            </div>
                                            <input type="submit" name="submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <? $this->load->view('user/include/footer') ?>
    </div>
    <!-- ./wrapper -->

    <? $this->load->view('user/include/js') ?>
    <script>

        function vote_show(area) {
            if (area == 1) {
                $('#urban_district').hide('slow');
                $('#urban_assemblys').hide('slow');
                $('#urban_muncipal_corp').hide('slow');
                $('#urban_ward_number').hide('slow');
                $('#urban_ward_count').hide('slow');
                $('#urban_polling_number').hide('slow');
                $('#urban_polling_no').hide('slow');
                $('#urban_polling_name').hide('slow');
                $('#urban_house_number').hide('slow');
                $('#rural_districs').show('slow');
                $('#rural_blocks').show('slow');
                $('#rural_con').show('slow');
                $('#rural_panchyats').show('slow');
                $('#rural_polling_number').show('slow');
                $('#rural_polling_name').show('slow');
                
            } else if (area == 2) {
                $('#rural_districs').hide('slow');
                $('#rural_blocks').hide('slow');
                $('#rural_con').hide('slow');
                $('#rural_panchyats').hide('slow');
                $('#rural_polling_number').hide('slow');
                $('#rural_polling_name').hide('slow');
                $('#urban_district').show('slow');
                $('#urban_assemblys').show('slow');
                $('#urban_muncipal_corp').show('slow');
                $('#urban_ward_number').show('slow');
                $('#urban_ward_count').show('slow');
                $('#urban_polling_number').show('slow');
                $('#urban_polling_no').show('slow');
                $('#urban_polling_name').show('slow');
                $('#urban_house_number').show('slow');
            }
        }

        function get_subCaste(caste) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_sub_caste',
                type: "POST",
                data: {
                    'caste': caste
                },
                dataType: 'json',
                success: function(data) {
                    $('#sub-caste').empty();
                    $('#sub-caste').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#sub-caste').append('<option value="' + item.id + '">' + item.caste + '</option>')
                    });
                }
            });
        }

        function getDistric(state) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_distric',
                type: "POST",
                data: {
                    'state': state
                },
                dataType: 'json',
                success: function(data) {
                    $('#tdistric').empty();
                    $('#tdistric').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#tdistric').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getPolice(distric) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_police',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function(data) {
                    $('#tpolice').empty();
                    $('#tpolice').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#tpolice').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_post',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function(data) {
                    $('#tpost').empty();
                    $('#tpost').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#tpost').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_block',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function(data) {
                    $('#tblock').empty();
                    $('#tblock').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#tblock').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getPin(post) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_pin',
                type: "POST",
                data: {
                    'post': post
                },
                dataType: 'json',
                success: function(data) {
                    $('#tpin').empty();
                    $('#tpin').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#tpin').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getLegalGst(id) {
            if (id == 1) {
                $('#legal_gst_no_section').show('slow');
            }else if (id == 2) {
                $('#legal_gst_no_section').hide('slow');
            }
        }

        function getLegalItrFile(id) {
            if (id == 1) {
                $('#filling_itr_section').show('slow');
                $('#last_year_turnover_section').show('slow');
                $('#firm_name_section').show('slow');
                $('#ca_name_section').show('slow');
                $('#ca_mobile_no_section').show('slow');
            }else if (id == 2) {
                $('#filling_itr_section').hide('slow');
                $('#last_year_turnover_section').hide('slow');
                $('#firm_name_section').hide('slow');
                $('#ca_name_section').hide('slow');
                $('#ca_mobile_no_section').hide('slow');
            }
        }

        function getGst(id) {
            if (id == 1) {
                $('#gst_no_section').show('slow');
            }else if (id == 2) {
                $('#gst_no_section').hide('slow');
            }
        }

        function getItrFile(id) {
            if (id == 1) {
                $('#last_itr_section').show('slow');
                $('#last_year_finance_section').show('slow');
                $('#firm_or_ca_no_section').show('slow');
            }else if (id == 2) {
                $('#last_itr_section').hide('slow');
                $('#last_year_finance_section').hide('slow');
                $('#firm_or_ca_no_section').hide('slow');
            }
        }

        function getIndustries(sector) {

            if(sector == 18) {
                $('#business_name_section').show('slow');
                $('#registration_number_section').show('slow');
                $('#registered_address_section').show('slow');
                $('#email_section').show('slow');
                $('#contact_section').show('slow');
                $('#gst_section').show('slow');
                $('#business_itr_file_section').show('slow');
                $('#photo_section').show('slow');
                $('#business_type_section').show('slow');
                $('#city_section').hide('slow');
            } else {
                $('#business_name_section').hide('slow');
                $('#registration_number_section').hide('slow');
                $('#cin_section').hide('slow');
                $('#registered_address_section').hide('slow');
                $('#date_of_incorporation_section').hide('slow');
                $('#email_section').hide('slow');
                $('#contact_section').hide('slow');
                $('#gst_section').hide('slow');
                $('#business_itr_file_section').hide('slow');
                $('#photo_section').hide('slow');
                $('#business_type_section').hide('slow');
                $('#city_section').show('slow');
            }

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_business_type',
                type: "POST",
                data: {
                    'sector': sector
                },
                dataType: 'json',
                success: function(data) {
                    $('#business_type').empty();
                    $('#business_type').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#business_type').append('<option value="' + item.id + '">' + item.business_type + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_industries',
                type: "POST",
                data: {
                    'sector': sector
                },
                dataType: 'json',
                success: function(data) {
                    $('#industries').empty();
                    $('#industries').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#industries').append('<option value="' + item.id + '">' + item.industeries_name + '</option>')
                    });
                }
            });
        }

        function getpDistric(state) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_distric',
                type: "POST",
                data: {
                    'state': state
                },
                dataType: 'json',
                success: function(data) {
                    $('#pdistric').empty();
                    $('#pdistric').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#pdistric').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getpPolice(distric) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_police',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function(data) {
                    $('#ppolice').empty();
                    $('#ppolice').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#ppolice').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_post',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function(data) {
                    $('#ppost').empty();
                    $('#ppost').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#ppost').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_block',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function(data) {
                    $('#pblock').empty();
                    $('#pblock').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#pblock').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getpPin(post) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_pin',
                type: "POST",
                data: {
                    'post': post
                },
                dataType: 'json',
                success: function(data) {
                    $('#ppin').empty();
                    $('#ppin').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#ppin').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getblock(dis) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_blocks',
                type: "POST",
                data: {
                    'dis': dis
                },
                dataType: 'json',
                success: function(data) {
                    $('#rural_block').empty();
                    $('#rural_block').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rural_block').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_const',
                type: "POST",
                data: {
                    'dis': dis
                },
                dataType: 'json',
                success: function(data) {
                    $('#rural_cons').empty();
                    $('#rural_cons').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rural_cons').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });
        }

        function getPanchyat(cons) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_panchyat',
                type: "POST",
                data: {
                    'cons': cons
                },
                dataType: 'json',
                success: function(data) {
                    $('#rural_panchyat').empty();
                    $('#rural_panchyat').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rural_panchyat').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });
        }

        function getPollingName(panch) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_polling',
                type: "POST",
                data: {
                    'panch': panch
                },
                dataType: 'json',
                success: function(data) {
                    $('#rural_polling_nm').empty();
                    $('#rural_polling_nm').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rural_polling_nm').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });
        }

        function getPollingNos(polling) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_polling_name',
                type: "POST",
                data: {
                    'polling': polling
                },
                dataType: 'json',
                success: function(data) {
                    $('#rural_polling_num').empty();
                    $('#rural_polling_num').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rural_polling_num').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });
        }

        function getWard(ward) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_ward',
                type: "POST",
                data: {
                    'ward': ward
                },

                dataType: 'json',
                success: function(data) {
                    $('#urban_ward_no').empty();
                    $('#urban_ward_no').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_ward_no').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        } 

        function gethouseNo(house) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_house',
                type: "POST",
                data: {
                    'house': house
                },

                dataType: 'json',
                success: function(data) {
                    $('#urban_house_no').empty();
                    $('#urban_house_no').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_house_no').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        } 

        function getAssmMunc(dist) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_assembly',
                type: "POST",
                data: {
                    'dist': dist
                },
                dataType: 'json',
                success: function(data) {
                    $('#urban_assembly').empty();
                    $('#urban_assembly').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_assembly').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>user/Register/get_munci',
                type: "POST",
                data: {
                    'dist': dist
                },
                dataType: 'json',
                success: function(data) {
                    $('#urban_muncipal_cor').empty();
                    $('#urban_muncipal_cor').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_muncipal_cor').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getCoun(mus) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_coun',
                type: "POST",
                data: {
                    'mus': mus
                },
                dataType: 'json',
                success: function(data) {
                    $('#urban_ward_coun').empty();
                    $('#urban_ward_coun').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_ward_coun').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getPollingNm(pollingno) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_polling_nm',
                type: "POST",
                data: {
                    'pollingno': pollingno
                },
                dataType: 'json',
                success: function(data) {
                    $('#urban_polling_nm').empty();
                    $('#urban_polling_nm').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_polling_nm').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getPollingNo(poll) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_polling_no',
                type: "POST",
                data: {
                    'poll': poll
                },
                dataType: 'json',
                success: function(data) {
                    $('#urban_polling_num').empty();
                    $('#urban_polling_num').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_polling_num').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        $('#register_data').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url : '<?= base_url() ?>user/Register/register_datas',
            type : "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType: 'json',
            success: function(data) {    

                if (data.icon == "error") {
                    var valid = '';
                    $.each(data.text, function(i, item){
                        valid += item;
                    });
                    Toast.fire({
                        icon: data.icon,
                        html: valid,
                    });
                }else{
                    Toast.fire({
                        icon: data.icon,
                        text: data.text
                    });
                    window.location.reload(true);
                }
            }
        });
        });
    </script>
</body>

</html>