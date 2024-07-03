<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $this->session->userdata('company_name') ?> | New Member
    </title>
    <? $this->load->view('admin/include/css') ?>
    <style>
        .lab {
            color: gray;
            font-size: 15px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <? $this->load->view('admin/include/header') ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <? $this->load->view('admin/include/left') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?php echo $title; ?>
                            </h1>
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
                            <form id="Member_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <!-- Personal Detils -->
                                <h4><i class="ti-user"></i> Personal Details</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Name </label>
                                            <input type="text" class="form-control" name="nm" id="nm"
                                                placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="lab">Father Name </label>
                                                <input type="text" class="form-control" name="fnm" id="fnm"
                                                    placeholder="Enter Father Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="lab">Nominee Name </label>
                                                <input type="text" class="form-control" name="nominee" id="nominee"
                                                    placeholder="Enter Nominee Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Date Of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="dob" id="dob">
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact Detils -->
                                <h4><i class="ti-headphone-alt"></i> Contact Details</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Mobile Number </label>
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Email Id </label>
                                            <input type="email" class="form-control" name="mail" id="mail"
                                                placeholder="Enter Email ID">
                                        </div>
                                    </div>
                                </div>
                                <!-- KYC Detils -->
                                <h4><i class="ti-headphone-alt"></i> KYC Details</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">PAN Card: </label><br>
                                            <input type="file" name="pan_img" id="pan_img">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">PAN Card No. </label>
                                            <input type="text" class="form-control" name="pan_no" id="pan_no"
                                                placeholder="Enter PAN Card No.">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Identity Proof(<span style="font-weight:500;">Aadhaar
                                                    Card, Driving Licence, Passport, Voter ID, etc.</span>):
                                            </label><br>
                                            <input type="file" name="identity_proof_img" id="identity_proof_img">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Identity Proof No. <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="id_proof_no" id="id_proof_no"
                                                placeholder="Enter Identity Proof No.">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Signature Proof(<span style="font-weight:500;">Passport,
                                                    PAN Card, etc.</span>): </label><br>
                                            <input type="file" name="signature_proof_img" id="signature_proof_img">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Address Proof(<span style="font-weight:500;">Passport
                                                    Copy, Aadhar Card, Driving licence, Utility bill-gas or electricity
                                                    bill, Voter Id, ration card, rent agreement, etc.</span>):
                                            </label><br>
                                            <input type="file" name="address_proof_img" id="address_proof_img">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Bank Statement of the past 6 month: </label><br>
                                            <input type="file" name="bank_statement_img" id="bank_statement_img">
                                        </div>
                                    </div>
                                </div>
                                <!-- Address Detils -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tr-single-header">
                                            <h4><i class="ti-location-pin"></i> Temporary Address</h4>
                                        </div>
                                        <div class="Reveal-other-body">
                                            <div class="form-group">
                                                <label class="lab">Village / City </label>
                                                <input type="text" class="form-control" name="tvillage" id="tvillage"
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="lab">Bulding / House Number </label>
                                                <input type="text" class="form-control" name="tbulding" id="tbulding"
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="lab">Landmark </label>
                                                <input type="text" class="form-control" name="tlandmark" id="tlandmark"
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="lab">Select State </label>
                                                <select name="tstate" id="tstate" class="form-control"
                                                    onchange="getDistric(this.value)">
                                                    <option value="">--- Select One ---</option>
                                                    <?php foreach ($state as $st) { ?>
                                                        <option value="<?php echo $st['id'] ?>">
                                                            <?php echo $st['location']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Selct Distric </label>
                                                <select name="tdistric" id="tdistric" class="form-control"
                                                    onchange="getPolice(this.value)">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Police Station </label>
                                                <select name="tpolice" id="tpolice" class="form-control">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Block </label>
                                                <select name="tblock" id="tblock" class="form-control">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Post Office </label>
                                                <select name="tpost" id="tpost" class="form-control"
                                                    onchange="getPin(this.value)">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Pin Code </label>
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
                                                <label class="lab">Village / City </label>
                                                <input type="text" class="form-control" name="pvillage" id="pvillage"
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="lab">Bulding / House Number </label>
                                                <input type="text" class="form-control" name="pbulding" id="pbulding"
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="lab">Landmark </label>
                                                <input type="text" class="form-control" name="plandmark" id="plandmark"
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="lab">Select State </label>
                                                <select name="pstate" id="pstate" class="form-control"
                                                    onchange="getpDistric(this.value)">
                                                    <option value="">--- Select One ---</option>
                                                    <?php foreach ($state as $st) { ?>
                                                        <option value="<?php echo $st['id'] ?>">
                                                            <?php echo $st['location']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Selct Distric </label>
                                                <select name="pdistric" id="pdistric" class="form-control"
                                                    onchange="getpPolice(this.value)">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Police Station </label>
                                                <select name="ppolice" id="ppolice" class="form-control"
                                                    onchange="getpBlock(this.value)">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Block </label>
                                                <select name="pblock" id="pblock" class="form-control">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Post Office </label>
                                                <select name="ppost" id="ppost" class="form-control"
                                                    onchange="getpPin(this.value)">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="lab">Select Pin Code </label>
                                                <select name="ppin" id="ppin" class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <? $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->

    <? $this->load->view('admin/include/js') ?>
    <script>

        function getDistric(state) {
            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_distric',
                type: "POST",
                data: {
                    'state': state
                },
                dataType: 'json',
                success: function (data) {
                    $('#tdistric').empty();
                    $('#tdistric').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#tdistric').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getPolice(distric) {
            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_police',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function (data) {
                    $('#tpolice').empty();
                    $('#tpolice').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#tpolice').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_post',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function (data) {
                    $('#tpost').empty();
                    $('#tpost').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#tpost').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_block',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function (data) {
                    $('#tblock').empty();
                    $('#tblock').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#tblock').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getPin(post) {
            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_pin',
                type: "POST",
                data: {
                    'post': post
                },
                dataType: 'json',
                success: function (data) {
                    $('#tpin').empty();
                    $('#tpin').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#tpin').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getpDistric(state) {
            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_distric',
                type: "POST",
                data: {
                    'state': state
                },
                dataType: 'json',
                success: function (data) {
                    $('#pdistric').empty();
                    $('#pdistric').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#pdistric').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getpPolice(distric) {
            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_police',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function (data) {
                    $('#ppolice').empty();
                    $('#ppolice').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#ppolice').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_post',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function (data) {
                    $('#ppost').empty();
                    $('#ppost').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#ppost').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_block',
                type: "POST",
                data: {
                    'distric': distric
                },
                dataType: 'json',
                success: function (data) {
                    $('#pblock').empty();
                    $('#pblock').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#pblock').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function getpPin(post) {
            $.ajax({
                url: '<?= base_url() ?>admin/Member/get_pin',
                type: "POST",
                data: {
                    'post': post
                },
                dataType: 'json',
                success: function (data) {
                    $('#ppin').empty();
                    $('#ppin').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function (i, item) {
                        $('#ppin').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        $('#Member_data').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Member/member_datas',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                dataType: 'json',
                success: function (data) {
                    if (data.icon == "error") {
                        var valid = '';
                        $.each(data.text, function (i, item) {
                            valid += item;
                        });
                        Toast.fire({
                            icon: data.icon,
                            html: valid,
                        });
                    } else {
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