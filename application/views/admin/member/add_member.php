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
                                <li class="breadcrumb-item active">
                                    <?php echo $breadcrumb; ?>
                                </li>
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
                                            <label class="lab">Name <span class="text-danger">*</span></label>
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
                                            <label class="lab">Relation </label>
                                            <select name="relation" id="relation" class="form-control myselect">
                                                <option value="">--- Select One ---</option>
                                                <option value="Grand-Father">Grand-Father</option>
                                                <option value="Grand-Mother">Grand-Mother</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Husband">Husband</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Son">Son</option>
                                                <option value="Other">Other</option>
                                            </select>
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
                                            <div class="form-group">
                                                <label class="lab">Agent <span class="text-danger">*</span></label>
                                                <select name="agent" id="agent" class="form-control myselect">
                                                    <option value="">--- Select One ---</option>
                                                    <?php foreach ($agent as $agnt) { ?>
                                                        <option value="<?php echo $agnt['id'] ?>"><?php echo "IMBLL" . $agnt['agent_id'] . " | " . $agnt['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
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
                                            <label class="lab">Identity Proof No. </label>
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
                                    <div class="offset-5 form-check col-sm-4">
                                        <input class="form-check-input" type="checkbox" value="1" name="address_same" id="address_same">
                                        <label class="form-check-label text-info">Check If Temporary & Permanent Address Same</label>
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
                                                <label class="lab">Full Address</label>
                                                <textarea name="temporary_address" id="temporary_address" cols="30"
                                                    rows="3" class="form-control"
                                                    placeholder="Enter Full Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lab">Select State </label>
                                            <select name="temporary_state" id="temporary_state"
                                                class="form-control myselect">
                                                <option value="">--- Select One ---</option>
                                                <?php foreach ($state as $st) { ?>
                                                    <option value=" <?php echo $st['location']; ?>">
                                                        <?php echo $st['location']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="lab">Pin Code </label>
                                                <input type="text" class="form-control" name="temporary_pin"
                                                    id="temporary_pin" placeholder="Enter Temporary Pin Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tr-single-header">
                                            <h4><i class="ti-location-pin"></i> Permanent Address</h4>
                                        </div>
                                        <div class="Reveal-other-body">
                                            <div class="form-group">
                                                <label class="lab">Full Address</label>
                                                <textarea name="permanent_address" id="permanent_address" cols="30"
                                                    rows="3" class="form-control"
                                                    placeholder="Enter Full Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lab">Select State </label>
                                            <select name="permanent_state" id="permanent_state"
                                                class="form-control myselect">
                                                <option value="">--- Select One ---</option>
                                                <?php foreach ($state as $st) { ?>
                                                    <option value=" <?php echo $st['location']; ?>">
                                                        <?php echo $st['location']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="lab">Pin Code </label>
                                                <input type="text" class="form-control" name="permanent_pin"
                                                    id="permanent_pin" placeholder="Enter Permanent Pin Code">
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

    <?php $this->load->view('admin/include/js') ?>
    <script>
        $('#address_same').on('change',function(){
            let add = $('#temporary_address').val();
            let state = $('#temporary_state').val();
            let pin = $('#temporary_pin').val();
            if ($(this).is(":checked")) {
                $('#permanent_address').val(add);
                // $('#permanent_state option[value="'+state+'"]').prop('selected', true);
                // $('#permanent_state').val(state);
                $('#permanent_pin').val(pin);
            } else {
                $('#permanent_address').val('');
                $('#permanent_state').val('');
                $('#permanent_pin').val('');
            }
        })
        
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