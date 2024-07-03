<style>
    .lab {
        color: gray;
        font-size: 15px;
    }
</style>
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
                            <label class="lab">Name </label>
                            <input type="hidden" class="form-control" name="id" id="id"
                                value="<?php echo $upmembr['id'] ?>">
                            <input type="text" class="form-control" name="nm" id="nm"
                                value="<?php echo $upmembr['name'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="lab">Father Name </label>
                                <input type="text" class="form-control" name="fnm" id="fnm"
                                    value="<?php echo $upmembr['father_name'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="lab">Nominee Name </label>
                                <input type="text" class="form-control" name="nominee" id="nominee"
                                    value="<?php echo $upmembr['nominee_name'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="lab">Relation </label>
                            <input type="text" class="form-control" name="relation" id="relation"
                                value="<?php echo $upmembr['relation'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="lab">Date Of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="dob" id="dob"
                                value="<?php echo $upmembr['dob'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="lab">Agent <span class="text-danger">*</span></label>
                                <select name="agent" id="agent" class="form-control">
                                    <option value="">--- Select One ---</option>
                                    <?php foreach ($agent as $agnt) { ?>
                                        <option value="<?php echo $agnt['id'] ?>" <?php echo ($agnt['id'] == $upmembr['agent']) ? "Selected" : ""; ?>><?php echo "IMBLL" . $agnt['agent_id'] . " | " . $agnt['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
                            <label class="lab">Mobile Number </label>
                            <input type="number" class="form-control" name="mobile" id="mobile"
                                value="<?php echo $upmembr['mobile'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="lab">Email Id </label>
                            <input type="email" class="form-control" name="mail" id="mail"
                                value="<?php echo ($upmembr['mail'] != 'N/A') ? $upmembr['mail'] : '' ?>">
                        </div>
                    </div>
                </div>

                <!-- KYC Detils -->
                <h4><i class="ti-headphone-alt"></i> KYC Details</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="lab">PAN Card No. </label>
                            <input type="text" class="form-control" name="pan_no" id="pan_no"
                                value="<?php echo $upmembr['pan_no'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="lab">Identity Proof No. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="id_proof_no" id="id_proof_no"
                                value="<?php echo $upmembr['id_proof_no'] ?>">
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
                                <label class="lab">Full Address</label>
                                <textarea name="temporary_address" id="temporary_address" cols="30" rows="3"
                                    class="form-control"
                                    placeholder="Enter Full Address"> <?php echo $upmembr['temporary_address'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="lab">State </label>
                                <input type="text" class="form-control" name="temporary_state" id="temporary_state"
                                    value="<?php echo ($upmembr['temporary_state'] != 'N/A') ? $upmembr['temporary_state'] : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="lab">Pin Code </label>
                                <input type="text" class="form-control" name="temporary_pin" id="temporary_pin"
                                    value="<?php echo ($upmembr['temporary_pin'] != 'N/A') ? $upmembr['temporary_pin'] : '' ?>">
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
                                <textarea name="permanent_address" id="permanent_address" cols="30" rows="3"
                                    class="form-control"
                                    placeholder="Enter Full Address"> <?php echo $upmembr['permanent_address'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="lab">State </label>
                                <input type="text" class="form-control" name="permanent_state" id="permanent_state"
                                    value="<?php echo ($upmembr['permanent_state'] != 'N/A') ? $upmembr['permanent_state'] : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="lab">Pin Code </label>
                                <input type="text" class="form-control" name="permanent_pin" id="permanent_pin"
                                    value="<?php echo ($upmembr['permanent_pin'] != 'N/A') ? $upmembr['permanent_pin'] : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- KYC Detils -->
                <h4><i class="ti-headphone-alt"></i> KYC Details</h4>
                <div class="row">
                    <div class="col-6">
                        <form id="up_pan_img" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <label>PAN Card:</label>
                            <div class="input-group mb-3">
                                <input type="file" name="pan_img" id="pan_img">
                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?php echo $upmembr['id'] ?>">
                                <input type="submit" name="submit" class="btn btn-success btn-sm" value="Upload">
                            </div>
                        </form>
                        <label>Current Photo:</label><br>
                        <img class="profile-user-img img-fluid"
                            src="<?php echo !empty($upmembr['pan_img']) ? $upmembr['pan_img'] : base_url("uploads/no_image.jpg") ?>"
                            alt="User PAN Card Image">
                    </div>
                    <div class="col-6">
                        <form id="up_identity_proof_img" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data">
                            <label>Identity Proof:</label>
                            <div class="input-group mb-3">
                                <input type="file" name="identity_proof_img" id="identity_proof_img">
                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?php echo $upmembr['id'] ?>">
                                <input type="submit" name="submit" class="btn btn-success btn-sm" value="Upload">
                            </div>
                        </form>
                        <label>Current Photo:</label><br>
                        <img class="profile-user-img img-fluid"
                            src="<?php echo !empty($upmembr['identity_proof_img']) ? $upmembr['identity_proof_img'] : base_url("uploads/no_image.jpg") ?>"
                            alt="User Identity Proof Image">
                    </div>
                    <div class="col-6">
                        <form id="up_signature_proof_img" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data">
                            <label>Signature Proof:</label>
                            <div class="input-group mb-3">
                                <input type="file" name="signature_proof_img" id="signature_proof_img">
                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?php echo $upmembr['id'] ?>">
                                <input type="submit" name="submit" class="btn btn-success btn-sm" value="Upload">
                            </div>
                        </form>
                        <label>Current Photo:</label><br>
                        <img class="profile-user-img img-fluid"
                            src="<?php echo !empty($upmembr['signature_proof_img']) ? $upmembr['signature_proof_img'] : base_url("uploads/no_image.jpg") ?>"
                            alt="User Signature Proof Image">
                    </div>
                    <div class="col-6">
                        <form id="up_address_proof_img" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data">
                            <label>Address Proof:</label>
                            <div class="input-group mb-3">
                                <input type="file" name="address_proof_img" id="address_proof_img">
                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?php echo $upmembr['id'] ?>">
                                <input type="submit" name="submit" class="btn btn-success btn-sm" value="Upload">
                            </div>
                        </form>
                        <label>Current Photo:</label><br>
                        <img class="profile-user-img img-fluid"
                            src="<?php echo !empty($upmembr['address_proof_img']) ? $upmembr['address_proof_img'] : base_url("uploads/no_image.jpg") ?>"
                            alt="User Address Proof Image">
                    </div>
                    <div class="col-6">
                        <form id="up_bank_statement_img" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data">
                            <label>Bank Statement of the past 6 month:</label>
                            <div class="input-group mb-3">
                                <input type="file" name="bank_statement_img" id="bank_statement_img">
                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?php echo $upmembr['id'] ?>">
                                <input type="submit" name="submit" class="btn btn-success btn-sm" value="Upload">
                            </div>
                        </form>
                        <label>Current Photo:</label><br>
                        <img class="profile-user-img img-fluid"
                            src="<?php echo !empty($upmembr['bank_statement_img']) ? $upmembr['bank_statement_img'] : base_url("uploads/no_image.jpg") ?>"
                            alt="User Bank Statement of the past 6 month Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $('#up_pan_img').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url() ?>admin/Member/update_pan_img',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.icon == "error") {
                    var valid = '';
                    $.each(obj.text, function (i, item) {
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

    $('#up_identity_proof_img').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url() ?>admin/Member/update_identity_proof_img',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.icon == "error") {
                    var valid = '';
                    $.each(obj.text, function (i, item) {
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

    $('#up_signature_proof_img').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url() ?>admin/Member/update_signature_proof_img',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.icon == "error") {
                    var valid = '';
                    $.each(obj.text, function (i, item) {
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

    $('#up_address_proof_img').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url() ?>admin/Member/update_address_proof_img',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.icon == "error") {
                    var valid = '';
                    $.each(obj.text, function (i, item) {
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

    $('#up_bank_statement_img').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url() ?>admin/Member/update_bank_statement_img',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.icon == "error") {
                    var valid = '';
                    $.each(obj.text, function (i, item) {
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
</script>