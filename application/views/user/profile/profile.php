<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name')?> | Edit Profile</title>
    <? $this->load->view('user/include/css') ?>
    <style>
        .lab{
            color: gray;
            font-size: 15px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
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
                    <div class="row">
                        <div class="col-md-3">
                             <!-- Profile Image  -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <?php ?>
                                    <h3 class="profile-username text-center"><?php echo $users['name']; ?></h3>
                                    
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b class="lab">Contact</b> <a class="float-right"><?php echo $users['mobile']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="lab">Email</b> <a class="float-right"><?php echo $users['mail']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="lab">Date Of Birth</b> <a class="float-right"><?php echo date('d-M-Y', strtotime($users['dob'])); ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="lab">Caste</b> <a class="float-right"><?php echo $users['caste']; ?></a>
                                        </li>
                                    </ul>
                                    <b class="lab">Sub-Caste</b> <a class="float-right"><?php echo $users['sub-caste']; ?></a>
                                    <?php  ?>
                                </div>
                                 <!-- /.card-body  -->
                            </div>
                             <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="p-2">
                                <h4 style="text-align:center; color:gray; font-size: 26px;">Edit Details</h4>
                            </div>

                            <form id="frm" class="form-horizontal" method="post">
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
                                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $users['id'] ?>">
                                                    <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $users['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="lab">Father Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="fnm" id="fnm" value="<?php echo $users['father_name'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="lab">Grand Father Name </label>
                                                        <input type="text" class="form-control" name="gfnm" id="gfnm" value="<?php echo $users['grand_father'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="lab">Date Of Birth <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $users['dob'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="lab">Caste <span class="text-danger">*</span></label>
                                                    <select name="caste" id="caste" class="form-control" onchange="get_subCaste(this.value);">
                                                        <option value="">--- Select One --- </option>
                                                        <?php foreach ($caste as $cas) { ?>
                                                            <option value="<?php echo $cas['id'] ?>" <?php echo ($cas['id'] == $users['cst']) ? "selected" : "" ?>><?php echo $cas['caste']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="lab">Sub-Caste <span class="text-danger">*</span></label>
                                                    <select name="sub-caste" id="sub-caste" class="form-control">
                                                        <?php foreach($subcaste as $cas) { ?>
                                                        <option value="<?php echo $cas['id'] ?>" <?php echo ($cas['id'] == $users['sbcst']) ? "selected" : "" ?>><?php echo $cas['caste'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="lab">Community </label>
                                                    <input type="text" class="form-control" name="community" id="community" value="<?php echo $users['community'] ?>">
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
                                                    <input type="number" class="form-control" name="mobile" id="mobile" value="<?php echo $users['mobile'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="lab">Email Id <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $users['mail'] ?>">
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
                                                        <input type="text" class="form-control" name="tvillage" id="tvillage" value="<?php echo $users['tvillage'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lab">Bulding / House Number <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="tbulding" id="tbulding" value="<?php echo $users['tbulding'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lab">Landmark </label>
                                                        <input type="text" class="form-control" name="tlandmark" id="tlandmark" value="<?php echo $users['tlandmark'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lab">Select State <span class="text-danger">*</span></label>
                                                        <select name="tstate" id="tstate" class="form-control" onchange="getDistric(this.value)">
                                                            <option value="">--- Select One ---</option>
                                                            <?php foreach ($state as $st) { ?>
                                                                <option value="<?php echo $st['id'] ?>" <?php echo ($st['id'] == $users['tstate']) ? "selected" : "" ?>><?php echo $st['location']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Selct Distric <span class="text-danger">*</span></label>
                                                        <select name="tdistric" id="tdistric" class="form-control" onchange="getPolice(this.value)">
                                                        <?php if(empty($users['tdistric'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($distr as $dis) { ?>
                                                            <option value="<?php echo $dis['district_id'] ?>" <?php echo ($dis['district_id'] == $users['tdis']) ? "selected" : "" ?>><?php echo $dis['district_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Police Station <span class="text-danger">*</span></label>
                                                        <select name="tpolice" id="tpolice" class="form-control">
                                                            <?php if(empty($users['tpolice'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($police as $polc) { ?>
                                                                <option value="<?php echo $polc['police_id'] ?>" <?php echo ($polc['police_id'] == $users['tpolc']) ? "selected" : "" ?>><?php echo $polc['police_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Block <span class="text-danger">*</span></label>
                                                        <select name="tblock" id="tblock" class="form-control" >
                                                            <?php if(empty($users['tblock'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($block as $blk) { ?>
                                                                <option value="<?php echo $blk['block_id'] ?>" <?php echo ($blk['block_id'] == $users['tbloc']) ? "selected" : "" ?>><?php echo $blk['block_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Post Office <span class="text-danger">*</span></label>
                                                        <select name="tpost" id="tpost" class="form-control" onchange="getPin(this.value)">
                                                            <?php if(empty($users['tpost'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($post as $pst) { ?>
                                                                <option value="<?php echo $pst['post_id'] ?>" <?php echo ($pst['post_id'] == $users['tpos']) ? "selected" : "" ?>><?php echo $pst['post_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Pin Code <span class="text-danger">*</span></label>
                                                        <select name="tpin" id="tpin" class="form-control">
                                                            <?php if(empty($users['tpin'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($pin as $pn) { ?>
                                                                <option value="<?php echo $pn['pin_id'] ?>" <?php echo ($pn['pin_id'] == $users['tpn']) ? "selected" : "" ?>><?php echo $pn['pin_no'] ?></option>
                                                            <?php } ?>
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
                                                        <input type="text" class="form-control" name="pvillage" id="pvillage" value="<?php echo $users['pvillage'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lab">Bulding / House Number <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="pbulding" id="pbulding" value="<?php echo $users['pbulding'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lab">Landmark </label>
                                                        <input type="text" class="form-control" name="plandmark" id="plandmark" value="<?php echo $users['plandmark'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lab">Select State <span class="text-danger">*</span></label>
                                                        <select name="pstate" id="pstate" class="form-control" onchange="getpDistric(this.value)">
                                                            <option value="">--- Select One ---</option>
                                                            <?php foreach ($state as $st) { ?>
                                                                <option value="<?php echo $st['id'] ?>" <?php echo ($st['id'] == $users['pstate']) ? "selected" : "" ?>><?php echo $st['location']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Selct Distric <span class="text-danger">*</span></label>
                                                        <select name="pdistric" id="pdistric" class="form-control" onchange="getpPolice(this.value)">
                                                            <?php if(empty($users['pdistric'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($distr as $dis) { ?>
                                                            <option value="<?php echo $dis['district_id'] ?>" <?php echo ($dis['district_id'] == $users['pdis']) ? "selected" : "" ?>><?php echo $dis['district_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Police Station <span class="text-danger">*</span></label>
                                                        <select name="ppolice" id="ppolice" class="form-control">
                                                            <?php if(empty($users['ppolice'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($police as $polc) { ?>
                                                                <option value="<?php echo $polc['police_id'] ?>" <?php echo ($polc['police_id'] == $users['ppolc']) ? "selected" : "" ?>><?php echo $polc['police_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Block <span class="text-danger">*</span></label>
                                                        <select name="pblock" id="pblock" class="form-control">
                                                            <?php if(empty($users['pblock'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($block as $blk) { ?>
                                                                <option value="<?php echo $blk['block_id'] ?>" <?php echo ($blk['block_id'] == $users['pbloc']) ? "selected" : "" ?>><?php echo $blk['block_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Post Office <span class="text-danger">*</span></label>
                                                        <select name="ppost" id="ppost" class="form-control" onchange="getpPin(this.value)">
                                                            <?php if(empty($users['ppost'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($post as $pst) { ?>
                                                                <option value="<?php echo $pst['post_id'] ?>" <?php echo ($pst['post_id'] == $users['ppos']) ? "selected" : "" ?>><?php echo $pst['post_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="lab">Select Pin Code <span class="text-danger">*</span></label>
                                                        <select name="ppin" id="ppin" class="form-control">
                                                            <?php if(empty($users['ppin'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($pin as $pn) { ?>
                                                                <option value="<?php echo $pn['pin_id'] ?>" <?php echo ($pn['pin_id'] == $users['ppn']) ? "selected" : "" ?>><?php echo $pn['pin_no'] ?></option>
                                                            <?php } ?>
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
                                                    <label class="lab">Select Sector <span class="text-danger">*</span></label>
                                                    <select name="sector" id="sector" class="form-control" onchange="getIndustries(this.value)">
                                                        <option value="">--- Select One --- </option>
                                                        <?php foreach ($sectr as $sec) { ?>
                                                            <option value="<?php echo $sec['id'] ?>" <?php echo ($sec['id'] == $users['sector']) ? "selected" : "" ?>><?php echo $sec['sector_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6" id="business_type_section" style="display:none;">
                                                <div class="form-group">
                                                    <label class="lab">Select Type Of Business</label>
                                                    <select name="business_type" id="business_type" class="form-control">
                                                    <option value="">--- Select One --- </option>
                                                        <?php foreach ($bussns as $bus) { ?>
                                                            <option value="<?php echo $bus['id'] ?>"><?php echo $bus['business_type'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php if($users['sector'] == 18) { ?> 
                                                <div class="col-lg-6 col-md-6" id="business_type_display_section">
                                                    <div class="form-group">
                                                        <label class="lab">Select Type Of Business</label>
                                                        <select name="business_type" id="business_type" class="form-control">
                                                        <option value="">--- Select One --- </option>
                                                        <?php foreach ($bussns as $bus) { ?>
                                                            <option value="<?php echo $bus['id'] ?>" <?php echo ($bus['id'] == $users['business_type']) ? "selected" : "" ?>><?php echo $bus['business_type'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="lab">Select Industries <span class="text-danger">*</span></label>
                                                    <select name="industries" id="indust" class="form-control">
                                                        <?php foreach ($industers as $indus) { ?>
                                                            <option value="<?php echo $indus['indus_id'] ?>" <?php echo ($indus['indus_id'] == $users['industries']) ? "selected" : "" ?>><?php echo $indus['indus'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="container">
                                                <div class="row" id="business_section" style="display:none;">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Business Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="business_name" id="business_name" value="<?php echo $users['business_name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Registration Number <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="registration_number" id="registration_number" value="<?php echo $users['registration_number'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Registered Address <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="registration_address" id="registration_address" value="<?php echo $users['registration_address'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Email Id <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $users['email'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Contact Number <span class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" name="contact_no" id="contact_no" value="<?php echo $users['contact_no'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <?php if($users['sector'] == 18) { ?>
                                                <div class="container">
                                                    <div class="row" id="business_diaplay_data_section">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="lab">Business Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="business_name" id="business_name" value="<?php echo $users['business_name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="lab">Registration Number <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="registration_number" id="registration_number" value="<?php echo $users['registration_number'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="lab">Registered Address <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="registration_address" id="registration_address" value="<?php echo $users['registration_address'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="lab">Email Id <span class="text-danger">*</span></label>
                                                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $users['email'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="lab">Contact Number <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" name="contact_no" id="contact_no" value="<?php echo $users['contact_no'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-lg-6 col-md-6" id="city_section" style="display:none;">
                                                <div class="form-group">
                                                    <label class="lab">Current City <span class="text-danger">*</span></label>
                                                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $users['city'] ?>">
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
                                                        <option value="1" <?php echo ($users['legal_gst'] == 1) ? "selected" : "" ?>>Yes</option>
                                                        <option value="2" <?php echo ($users['legal_gst'] == 2) ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6" id="legal_gst_no_section" style="display:none;">
                                                <div class="form-group">
                                                    <label class="lab">GST No.</label>
                                                    <input type="text" name="legal_gst_no" id="legal_gst_no" class="form-control" placeholder="Enter Gst Number">
                                                </div>
                                            </div>
                                            <?php if($users['legal_gst'] == 1) { ?>
                                                <div class="col-lg-6 col-md-6" id="disp_legal_gst_no">
                                                    <div class="form-group">
                                                        <label class="lab">GST No.</label>
                                                        <input type="text" name="legal_gst_no" id="legal_gst_no" class="form-control" value="<?php echo $users['legal_gst_no'] ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="lab">Do You File ITR ?</label>
                                                    <select name="legal_itr_file" id="legal_itr_file" class="form-control" onchange="getLegalItrFile(this.value)">
                                                        <option value="">--- Select One --- </option>
                                                        <option value="1" <?php echo ($users['legal_itr_file'] == 1) ? "selected" : "" ?>>Yes</option>
                                                        <option value="2" <?php echo ($users['legal_itr_file'] == 2) ? "selected" : "" ?>>No</option>
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
                                            <?php if($users['legal_itr_file'] == 1) { ?>
                                                <div class="col-lg-6 col-md-6" id="disp_legal_filling_itr">
                                                    <div class="form-group">
                                                        <label class="lab">Since When are You Filling ITR ? </label>
                                                        <select name="legal_filling_itr" id="legal_filling_itr" class="form-control" >
                                                            <option value="">--- Select One --- </option>
                                                            <option value="1" <?php echo ($users['legal_filling_itr'] == 1) ? "selected" : "" ?>>1 Year</option>
                                                            <option value="2" <?php echo ($users['legal_filling_itr'] == 2) ? "selected" : "" ?>>2 Year</option>
                                                            <option value="3" <?php echo ($users['legal_filling_itr'] == 3) ? "selected" : "" ?>>3 Year</option>
                                                            <option value="4" <?php echo ($users['legal_filling_itr'] == 4) ? "selected" : "" ?>>4 Year</option>
                                                            <option value="5" <?php echo ($users['legal_filling_itr'] == 5) ? "selected" : "" ?>>5 Year</option>
                                                            <option value="6" <?php echo ($users['legal_filling_itr'] == 6) ? "selected" : "" ?>>6 Year</option>
                                                            <option value="7" <?php echo ($users['legal_filling_itr'] == 7) ? "selected" : "" ?>>7 Year</option>
                                                            <option value="8" <?php echo ($users['legal_filling_itr'] == 8) ? "selected" : "" ?>>8 Year</option>
                                                            <option value="9" <?php echo ($users['legal_filling_itr'] == 9) ? "selected" : "" ?>>9 Year</option>
                                                            <option value="10" <?php echo ($users['legal_filling_itr'] == 10) ? "selected" : "" ?>>10 Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="disp_legal_last_year_turnover">
                                                    <div class="form-group">
                                                        <label class="lab">Last Year Turn Over</label>
                                                        <input type="text" name="legal_last_year_turnover" id="legal_last_year_turnover" class="form-control" value="<?php echo $users['legal_last_year_turnover'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="disp_legal_firm_name">
                                                    <div class="form-group">
                                                        <label class="lab">Enter Firm Name</label>
                                                        <input type="text" name="legal_firm_name" id="legal_firm_name" class="form-control" value="<?php echo $users['legal_firm_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="disp_legal_ca_name">
                                                    <div class="form-group">
                                                        <label class="lab">Enter CA Name</label>
                                                        <input type="text" name="legal_ca_name" id="legal_ca_name" class="form-control" value="<?php echo $users['legal_ca_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6" id="disp_legal_ca_mobile_no">
                                                    <div class="form-group">
                                                        <label class="lab">Enter CA Mobile No.</label>
                                                        <input type="text" name="legal_ca_mobile_no" id="legal_ca_mobile_no" class="form-control" value="<?php echo $users['legal_ca_mobile_no'] ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

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
                                                        <option value="">--- Select One ---</option>
                                                        <option value="1" <?php echo ($users['area_type'] == 1) ? "selected" : "" ?>>Rural</option>
                                                        <option value="2" <?php echo ($users['area_type'] == 2) ? "selected" : "" ?>>Urban</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="lab">Enter Voter ID Number </label>
                                                    <input type="text" class="form-control" name="voter_id" id="voter_id" value="<?php echo $users['voter_id'] ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Rural Section Start -->
                                        <div class="container">
                                            <div class="row" id="rural_section" style="display:none;">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Distric </label>
                                                        <select name="rural_distric" id="rural_distric" class="form-control" onchange=" getblocks(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <?php foreach ($ruldistrict as $ruldis) { ?>
                                                                <option value="<?php echo $ruldis['id'] ?>" <?php echo ($ruldis['id'] == $users['rul_dis']) ? "selected" : "" ?>><?php echo $ruldis['rural'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Block Office </label>
                                                        <select name="rural_block" id="rural_block" class="form-control" >
                                                        <?php if(empty($users['rural_block'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($ruldata as $rulblock) { ?>
                                                            <option value="<?php echo $rulblock['block_office_id'] ?>" <?php echo ($rulblock['block_office_id'] == $users['rul_block']) ? "selected" : "" ?>><?php echo $rulblock['block_office_name'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Constituency </label>
                                                        <select name="rural_cons" id="rural_cons" class="form-control" onchange="getPanchyats(this.value)">
                                                        <?php if(empty($users['rural_cons'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($ruldata as $rulcons) { ?>
                                                            <option value="<?php echo $rulcons['constituency_id'] ?>" <?php echo ($rulcons['constituency_id'] == $users['rural_con']) ? "selected" : "" ?>><?php echo $rulcons['constituency_name'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Panchyat </label>
                                                        <select name="rural_panchyat" id="rural_panchyat" class="form-control" onchange="getPollingNames(this.value)">
                                                        <?php if(empty($users['rural_panchyat'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($ruldata as $rulpan) { ?>
                                                            <option value="<?php echo $rulpan['panchayat_name_id'] ?>" <?php echo ($rulpan['panchayat_name_id'] == $users['rural_pan']) ? "selected" : "" ?>><?php echo $rulpan['panchayat_names'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Name </label>
                                                        <select name="rural_polling_nm" id="rural_polling_nm" class="form-control" onchange="getPollingNoes(this.value)">
                                                        <?php if(empty($users['rural_polling_nm'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($ruldata as $rulboothname) { ?>
                                                            <option value="<?php echo $rulboothname['booth_name_id'] ?>" <?php echo ($rulboothname['booth_name_id'] == $users['pooling_name']) ? "selected" : "" ?>><?php echo $rulboothname['booth_names'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Number </label>
                                                        <select name="rural_polling_num" id="rural_polling_num" class="form-control" >
                                                        <?php if(empty($users['rural_polling_num'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($ruldata as $rulboothno) { ?>
                                                            <option value="<?php echo $rulboothno['booth_no_id'] ?>" <?php echo ($rulboothno['booth_no_id'] == $users['polling_num']) ? "selected" : "" ?>><?php echo $rulboothno['booth_nos'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <?php if($users['area_type'] == 1) { ?>
                                            <div class="container">
                                                <div class="row" id="rural_display_data_section">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Distric </label>
                                                            <select name="rural_distric" id="rural_distric" class="form-control" onchange=" getblock(this.value)">
                                                                <option value="">--- Select One --- </option>
                                                                <?php foreach ($ruldistrict as $ruldis) { ?>
                                                                    <option value="<?php echo $ruldis['id'] ?>" <?php echo ($ruldis['id'] == $users['rul_dis']) ? "selected" : "" ?>><?php echo $ruldis['rural'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Block Office </label>
                                                            <select name="rural_block" id="rur_block" class="form-control" >
                                                            
                                                            <?php foreach($ruldata as $rulblock) { ?>
                                                                <option value="<?php echo $rulblock['block_office_id'] ?>" <?php echo ($rulblock['block_office_id'] == $users['rul_block']) ? "selected" : "" ?>><?php echo $rulblock['block_office_name'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Constituency </label>
                                                            <select name="rural_cons" id="rur_cons" class="form-control" onchange="getPanchyat(this.value)">
                                                            <?php if(empty($users['rural_cons'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($ruldata as $rulcons) { ?>
                                                                <option value="<?php echo $rulcons['constituency_id'] ?>" <?php echo ($rulcons['constituency_id'] == $users['rural_con']) ? "selected" : "" ?>><?php echo $rulcons['constituency_name'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Panchyat </label>
                                                            <select name="rural_panchyat" id="rur_panchyat" class="form-control" onchange="getPollingName(this.value)">
                                                            <?php if(empty($users['rural_panchyat'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($ruldata as $rulpan) { ?>
                                                                <option value="<?php echo $rulpan['panchayat_name_id'] ?>" <?php echo ($rulpan['panchayat_name_id'] == $users['rural_pan']) ? "selected" : "" ?>><?php echo $rulpan['panchayat_names'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Polling Booth Name </label>
                                                            <select name="rural_polling_nm" id="rural_polling_nam" class="form-control" onchange="getPollingNos(this.value)">
                                                            <?php if(empty($users['rural_polling_nm'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($ruldata as $rulboothname) { ?>
                                                                <option value="<?php echo $rulboothname['booth_name_id'] ?>" <?php echo ($rulboothname['booth_name_id'] == $users['pooling_name']) ? "selected" : "" ?>><?php echo $rulboothname['booth_names'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Polling Booth Number </label>
                                                            <select name="rural_polling_num" id="rural_polling_numb" class="form-control" >
                                                            <?php if(empty($users['rural_polling_num'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($ruldata as $rulboothno) { ?>
                                                                <option value="<?php echo $rulboothno['booth_no_id'] ?>" <?php echo ($rulboothno['booth_no_id'] == $users['polling_num']) ? "selected" : "" ?>><?php echo $rulboothno['booth_nos'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        <?php } ?>
                                        <!-- Rural Section End-->

                                        <!-- Urban Section Start -->
                                        <div class="container">
                                                <div class="row" id="urban_section" style="display:none;">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select District </label>
                                                        <select name="urban_district" id="urban_district" class="form-control" onchange="getAssmMuncs(this.value)">
                                                            <option value="">--- Select One --- </option>
                                                            <?php foreach ($urbdistrict as $urdis) { ?>
                                                                <option value="<?php echo $urdis['id'] ?>" <?php echo ($urdis['id'] == $users['urb_dis']) ? "selected" : "" ?>><?php echo $urdis['urban'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Assembly Constitution </label>
                                                        <select name="urban_assembly" id="urban_assembly" class="form-control"  onchange="getPollingNms(this.value)">
                                                        <?php if(empty($users['urban_assembly'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($urbdata as $urbassm) { ?>
                                                            <option value="<?php echo $urbassm['assembly_id'] ?>" <?php echo ($urbassm['assembly_id'] == $users['urb_assembly']) ? "selected" : "" ?>><?php echo $urbassm['assembly_name'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Muncipal Coorperation </label>
                                                        <select name="urban_muncipal_cor" id="urban_muncipal_cor" class="form-control" onchange="getCouns(this.value)">
                                                        <?php if(empty($users['urban_muncipal_cor'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($urbdata as $urbassm) { ?>
                                                            <option value="<?php echo $urbassm['munciple_id'] ?>" <?php echo ($urbassm['munciple_id'] == $users['urban_munciple']) ? "selected" : "" ?>><?php echo $urbassm['munciple_name'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Ward Councillors Name </label>
                                                        <select name="urban_ward_coun" id="urban_ward_coun" class="form-control" onchange="getWards(this.value)">
                                                        <?php if(empty($users['urban_ward_coun'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($urbdata as $urbassm) { ?>
                                                            <option value="<?php echo $urbassm['ward_concillor_id'] ?>" <?php echo ($urbassm['ward_concillor_id'] == $users['urb_ward_coun']) ? "selected" : "" ?>><?php echo $urbassm['ward_concillor_name'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Ward Number </label>
                                                        <select name="urban_ward_no" id="urban_ward_no" class="form-control" onchange="gethouseNos(this.value)">
                                                        <?php if(empty($users['urban_ward_no'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($urbdata as $urbassm) { ?>
                                                            <option value="<?php echo $urbassm['ward_no_id'] ?>" <?php echo ($urbassm['ward_no_id'] == $users['urban_ward']) ? "selected" : "" ?>><?php echo $urbassm['ward_nos'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select House Number </label>
                                                        <select name="urban_house_no" id="urban_house_no" class="form-control">
                                                        <?php if(empty($users['urban_house_no'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($urbdata as $urbassm) { ?>
                                                            <option value="<?php echo $urbassm['house_no_id'] ?>" <?php echo ($urbassm['house_no_id'] == $users['urban_house']) ? "selected" : "" ?>><?php echo $urbassm['house_nos'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Name </label>
                                                        <select name="urban_polling_nm" id="urban_polling_nm" class="form-control" onchange="getPollingN(this.value)">
                                                        <?php if(empty($users['urban_polling_nm'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($urbdata as $urbassm) { ?>
                                                            <option value="<?php echo $urbassm['polling_booth_id'] ?>" <?php echo ($urbassm['polling_booth_id'] == $users['booth_name']) ? "selected" : "" ?>><?php echo $urbassm['polling_booth_name'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="lab">Select Polling Booth Number </label>
                                                        <select name="urban_polling_num" id="urban_polling_num" class="form-control" >
                                                        <?php if(empty($users['urban_polling_num'])) { ?>
                                                            <option value=""></option>
                                                        <?php } ?>
                                                        <?php foreach($urbdata as $urbassm) { ?>
                                                            <option value="<?php echo $urbassm['polling_booth_no_id'] ?>" <?php echo ($urbassm['polling_booth_no_id'] == $users['booth_no']) ? "selected" : "" ?>><?php echo $urbassm['polling_booth_nos'] ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if($users['area_type'] == 2) { ?>
                                            <div class="container">
                                                <div class="row" id="urban_display_data_section">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select District </label>
                                                            <select name="urban_district" id="urban_district" class="form-control" onchange="getAssmMunc(this.value)">
                                                                <option value="">--- Select One --- </option>
                                                                <?php foreach ($urbdistrict as $urdis) { ?>
                                                                    <option value="<?php echo $urdis['id'] ?>" <?php echo ($urdis['id'] == $users['urb_dis']) ? "selected" : "" ?>><?php echo $urdis['urban'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Assembly Constitution </label>
                                                            <select name="urban_assembly" id="urban_assemb" class="form-control"  onchange="getPollingNm(this.value)">
                                                            <?php if(empty($users['urban_assembly'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($urbdata as $urbassm) { ?>
                                                                <option value="<?php echo $urbassm['assembly_id'] ?>" <?php echo ($urbassm['assembly_id'] == $users['urb_assembly']) ? "selected" : "" ?>><?php echo $urbassm['assembly_name'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Muncipal Coorperation </label>
                                                            <select name="urban_muncipal_cor" id="urban_muncipal" class="form-control" onchange="getCoun(this.value)">
                                                            <?php if(empty($users['urban_muncipal_cor'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($urbdata as $urbassm) { ?>
                                                                <option value="<?php echo $urbassm['munciple_id'] ?>" <?php echo ($urbassm['munciple_id'] == $users['urban_munciple']) ? "selected" : "" ?>><?php echo $urbassm['munciple_name'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Ward Councillors Name </label>
                                                            <select name="urban_ward_coun" id="ur_ward_coun" class="form-control" onchange="getWard(this.value)">
                                                            <?php if(empty($users['urban_ward_coun'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($urbdata as $urbassm) { ?>
                                                                <option value="<?php echo $urbassm['ward_concillor_id'] ?>" <?php echo ($urbassm['ward_concillor_id'] == $users['urb_ward_coun']) ? "selected" : "" ?>><?php echo $urbassm['ward_concillor_name'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Ward Number </label>
                                                            <select name="urban_ward_no" id="urb_ward_no" class="form-control" onchange="gethouseNo(this.value)">
                                                            <?php if(empty($users['urban_ward_no'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($urbdata as $urbassm) { ?>
                                                                <option value="<?php echo $urbassm['ward_no_id'] ?>" <?php echo ($urbassm['ward_no_id'] == $users['urban_ward']) ? "selected" : "" ?>><?php echo $urbassm['ward_nos'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select House Number </label>
                                                            <select name="urban_house_no" id="urb_house_no" class="form-control">
                                                            <?php if(empty($users['urban_house_no'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($urbdata as $urbassm) { ?>
                                                                <option value="<?php echo $urbassm['house_no_id'] ?>" <?php echo ($urbassm['house_no_id'] == $users['urban_house']) ? "selected" : "" ?>><?php echo $urbassm['house_nos'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Polling Booth Name </label>
                                                            <select name="urban_polling_nm" id="urb_polling_nm" class="form-control" onchange="getPollingNo(this.value)">
                                                            <?php if(empty($users['urban_polling_nm'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($urbdata as $urbassm) { ?>
                                                                <option value="<?php echo $urbassm['polling_booth_id'] ?>" <?php echo ($urbassm['polling_booth_id'] == $users['booth_name']) ? "selected" : "" ?>><?php echo $urbassm['polling_booth_name'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="lab">Select Polling Booth Number </label>
                                                            <select name="urban_polling_num" id="urban_polling_numb" class="form-control" >
                                                            <?php if(empty($users['urban_polling_num'])) { ?>
                                                                <option value=""></option>
                                                            <?php } ?>
                                                            <?php foreach($urbdata as $urbassm) { ?>
                                                                <option value="<?php echo $urbassm['polling_booth_no_id'] ?>" <?php echo ($urbassm['polling_booth_no_id'] == $users['booth_no']) ? "selected" : "" ?>><?php echo $urbassm['polling_booth_nos'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- Urban Section End -->
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <input type="submit" class="btn btn-danger" name="submit" value="submit">
                                </div>
                            </form>
                            <?php if($users['sector'] == 18) { ?>
                                <div class="col-6">
                                    <form id="up_photo" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        <label class="lab">Upload Your Business Image:</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="photo" id="photo">
                                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $users['id'] ?>">
                                            <input type="submit" name="submit" class="btn btn-success btn-sm" value="Upload">
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
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
        $('#frm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>user/Common/update_profile',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    //$('#empmsg').html(data);
                    //console.log(data);
                    var obj = JSON.parse(data);
                    //console.log(obj.icon);
                    //return false;
                    if (obj.icon == "error") {
                        var valid = '';
                        $.each(obj.text, function(i, item) {
                            valid += item;
                        });
                        Toast.fire({
                            icon: obj.icon,
                            html: valid,
                        })

                    } else {
                        Toast.fire({
                            icon: obj.icon,
                            text: obj.text
                        })
                        //setTimeout(location.reload.bind(location), 3000);
                        window.location.reload(true);
                    }
                }
            });
        });

        $('#up_photo').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>user/Common/update_pic',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    var obj = JSON.parse(data);
                    if (obj.icon == "error") {
                        var valid = '';
                        $.each(obj.text, function(i, item) {
                            valid += item;
                        });
                        Toast.fire({
                            icon: obj.icon,
                            html: valid,
                        })

                    } else {
                        Toast.fire({
                            icon: obj.icon,
                            text: obj.text
                        })
                        //setTimeout(location.reload.bind(location), 3000);
                        window.location.reload(true);
                    }
                }
            });
        });

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

        function getLegalGst(id) {
            if (id == 1) {
                $('#legal_gst_no_section').show('slow');
                $('#disp_legal_gst_no').hide('slow');
            } else if (id == 2) {
                $('#legal_gst_no_section').hide('slow');
                $('#disp_legal_gst_no').hide('slow');
            }
        }

        function getLegalItrFile(id) {
            if (id == 1) {
                $('#filling_itr_section').show('slow');
                $('#last_year_turnover_section').show('slow');
                $('#firm_name_section').show('slow');
                $('#ca_name_section').show('slow');
                $('#ca_mobile_no_section').show('slow');
                $('#disp_legal_filling_itr').hide('slow');
                $('#disp_legal_last_year_turnover').hide('slow');
                $('#disp_legal_firm_name').hide('slow');
                $('#disp_legal_ca_name').hide('slow');
                $('#disp_legal_ca_mobile_no').hide('slow');
            }else if (id == 2) {
                $('#filling_itr_section').hide('slow');
                $('#last_year_turnover_section').hide('slow');
                $('#firm_name_section').hide('slow');
                $('#ca_name_section').hide('slow');
                $('#ca_mobile_no_section').hide('slow');
                $('#disp_legal_filling_itr').hide('slow');
                $('#disp_legal_last_year_turnover').hide('slow');
                $('#disp_legal_firm_name').hide('slow');
                $('#disp_legal_ca_name').hide('slow');
                $('#disp_legal_ca_mobile_no').hide('slow');
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

        function getDisGst(id) {
            if (id == 1) {
                $('#dis_gst_no_section').show('slow');
            }else if (id == 2) {
                $('#dis_gst_no_section').hide('slow');
            }
        }

        function getDisItrFile(id) {
            if (id == 1) {
                $('#dis_last_itr_section').show('slow');
                $('#dis_last_year_finance_section').show('slow');
                $('#dis_firm_or_ca_no_section').show('slow');
            }else if (id == 2) {
                $('#dis_last_itr_section').hide('slow');
                $('#dis_last_year_finance_section').hide('slow');
                $('#dis_firm_or_ca_no_section').hide('slow');
            }
        }

        function getIndustries(sector) {

            if(sector == 18) {
                $('#business_section').show('slow');
                $('#business_diaplay_data_section').hide('slow');
                $('#business_type_display_section').hide('slow');
                $('#business_type_section').show('slow');
                $('#city_section').hide('slow');
            } else {
                $('#business_section').hide('slow');
                $('#business_diaplay_data_section').hide('slow');
                $('#business_type_display_section').hide('slow');
                $('#business_type_section').hide('slow');
                $('#city_section').show('slow');
            }

            $.ajax({
                url: '<?= base_url() ?>User/Register/get_industries',
                type: "POST",
                data: {
                    'sector': sector
                },
                dataType: 'json',
                success: function(data) {
                    $('#indust').empty();
                    $('#indust').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#indust').append('<option value="' + item.id + '">' + item.industeries_name + '</option>')
                        console.log(item);
                    });
                }
            });
        }

        function vote_show(area) {
            if (area == 1) {
                $('#rural_section').show('slow');
                $('#urban_section').hide('slow');
                $('#urban_display_data_section').hide('slow');
                
            } else if (area == 2) {
                $('#rural_section').hide('slow');
                $('#rural_display_data_section').hide('slow');
                $('#urban_section').show('slow');
            }
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
                },
                success: function(data) {
                    $('#urban_assemb').empty();
                    $('#urban_assemb').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_assemb').append('<option value="' + item.id + '">' + item.urban + '</option>')
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
                },
                success: function(data) {
                    $('#urban_muncipal').empty();
                    $('#urban_muncipal').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_muncipal').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getAssmMuncs(dist) {
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
                },
                success: function(data) {
                    $('#urb_polling_nm').empty();
                    $('#urb_polling_nm').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urb_polling_nm').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getPollingNms(pollingno) {
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
                },
                success: function(data) {
                    $('#ur_ward_coun').empty();
                    $('#ur_ward_coun').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#ur_ward_coun').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getCouns(mus) {
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
                },
                success: function(data) {
                    $('#urb_ward_no').empty();
                    $('#urb_ward_no').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urb_ward_no').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getWards(ward) {
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
                },
                success: function(data) {
                    $('#urb_house_no').empty();
                    $('#urb_house_no').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urb_house_no').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function gethouseNos(house) {
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
                },
                success: function(data) {
                    $('#urban_polling_numb').empty();
                    $('#urban_polling_numb').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#urban_polling_numb').append('<option value="' + item.id + '">' + item.urban + '</option>')
                    });
                }
            });
        }

        function getPollingN(poll) {
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

        function getblocks(dis) {
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
                },
                success: function(data) {
                    $('#rur_block').empty();
                    $('#rur_block').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rur_block').append('<option value="' + item.id + '">' + item.rural + '</option>')
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
                },
                success: function(data) {
                    $('#rur_cons').empty();
                    $('#rur_cons').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rur_cons').append('<option value="' + item.id + '">' + item.rural + '</option>')
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
                },
                success: function(data) {
                    $('#rur_panchyat').empty();
                    $('#rur_panchyat').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rur_panchyat').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });
        }

        function getPanchyats(cons) {
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
                },
                success: function(data) {
                    $('#rural_polling_nam').empty();
                    $('#rural_polling_nam').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rural_polling_nam').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });
        }

        function getPollingNames(panch) {
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
                },
                success: function(data) {
                    $('#rural_polling_numb').empty();
                    $('#rural_polling_numb').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#rural_polling_numb').append('<option value="' + item.id + '">' + item.rural + '</option>')
                    });
                }
            });
        }

        function getPollingNoes(polling) {
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

        
    </script>
</body>

</html>