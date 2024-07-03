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
                            <label class="lab">Date Of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="dob" id="dob"
                                value="<?php echo $upmembr['dob'] ?>">
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
                                value="<?php echo $upmembr['mail'] ?>">
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
                                <label class="lab">Village / City </label>
                                <input type="text" class="form-control" name="tvillage" id="tvillage"
                                    value="<?php echo $upmembr['tvillage'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="lab">Bulding / House Number </label>
                                <input type="text" class="form-control" name="tbulding" id="tbulding"
                                    value="<?php echo $upmembr['tbulding'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="lab">Landmark </label>
                                <input type="text" class="form-control" name="tlandmark" id="tlandmark"
                                    value="<?php echo $upmembr['tlandmark'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="lab">Select State </label>
                                <select name="tstate" id="tstate" class="form-control"
                                    onchange="getDistric(this.value)">
                                    <option value="">--- Select One ---</option>
                                    <?php foreach ($state as $st) { ?>
                                        <option value="<?php echo $st['id'] ?>" <?php echo ($st['id'] == $upmembr['tstate']) ? "selected" : "" ?>>
                                            <?php echo $st['location']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Selct Distric </label>
                                <select name="tdistric" id="tdistric" class="form-control"
                                    onchange="getPolice(this.value)">
                                    <?php if (empty($upmembr['tdistric'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($distr as $dis) { ?>
                                        <option value="<?php echo $dis['district_id'] ?>" <?php echo ($dis['district_id'] == $upmembr['tdis']) ? "selected" : "" ?>>
                                            <?php echo $dis['district_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Police Station </label>
                                <select name="tpolice" id="tpolice" class="form-control">
                                    <?php if (empty($upmembr['tpolice'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($police as $poic) { ?>
                                        <option value="<?php echo $poic['police_id'] ?>" <?php echo ($poic['police_id'] == $upmembr['tpolc']) ? "selected" : "" ?>>
                                            <?php echo $poic['police_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Block </label>
                                <select name="tblock" id="tblock" class="form-control">
                                    <?php if (empty($upmembr['tblock'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($block as $blck) { ?>
                                        <option value="<?php echo $blck['block_id'] ?>" <?php echo ($blck['block_id'] == $upmembr['tbloc']) ? "selected" : "" ?>>
                                            <?php echo $blck['block_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Post Office </label>
                                <select name="tpost" id="tpost" class="form-control" onchange="getPin(this.value)">
                                    <?php if (empty($upmembr['tpost'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($post as $pst) { ?>
                                        <option value="<?php echo $pst['post_id'] ?>" <?php echo ($pst['post_id'] == $upmembr['tpos']) ? "selected" : "" ?>>
                                            <?php echo $pst['post_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Pin Code </label>
                                <select name="tpin" id="tpin" class="form-control">
                                    <?php if (empty($upmembr['tpin'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($pin as $pn) { ?>
                                        <option value="<?php echo $pn['pin_id'] ?>" <?php echo ($pn['pin_id'] == $upmembr['tpn']) ? "selected" : "" ?>>
                                            <?php echo $pn['pin_no'] ?>
                                        </option>
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
                                <label class="lab">Village / City </label>
                                <input type="text" class="form-control" name="pvillage" id="pvillage"
                                    value="<?php echo $upmembr['pvillage'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="lab">Bulding / House Number </label>
                                <input type="text" class="form-control" name="pbulding" id="pbulding"
                                    value="<?php echo $upmembr['pbulding'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="lab">Landmark </label>
                                <input type="text" class="form-control" name="plandmark" id="plandmark"
                                    value="<?php echo $upmembr['plandmark'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="lab">Select State </label>
                                <select name="pstate" id="pstate" class="form-control"
                                    onchange="getpDistric(this.value)">
                                    <option value="">--- Select One ---</option>
                                    <?php foreach ($state as $st) { ?>
                                        <option value="<?php echo $st['id'] ?>" <?php echo ($st['id'] == $upmembr['pstate']) ? "selected" : "" ?>>
                                            <?php echo $st['location']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Selct Distric </label>
                                <select name="pdistric" id="pdistric" class="form-control"
                                    onchange="getpPolice(this.value)">
                                    <?php if (empty($upmembr['pdistric'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($distr as $dis) { ?>
                                        <option value="<?php echo $dis['district_id'] ?>" <?php echo ($dis['district_id'] == $upmembr['pdis']) ? "selected" : "" ?>>
                                            <?php echo $dis['district_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Police Station </label>
                                <select name="ppolice" id="ppolice" class="form-control">
                                    <?php if (empty($upmembr['ppolice'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($police as $polc) { ?>
                                        <option value="<?php echo $polc['police_id'] ?>" <?php echo ($polc['police_id'] == $upmembr['ppolc']) ? "selected" : "" ?>>
                                            <?php echo $polc['police_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Block </label>
                                <select name="pblock" id="pblock" class="form-control">
                                    <?php if (empty($upmembr['pblock'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($block as $blck) { ?>
                                        <option value="<?php echo $blck['block_id'] ?>" <?php echo ($blck['block_id'] == $upmembr['pbloc']) ? "selected" : "" ?>>
                                            <?php echo $blck['block_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Post Office </label>
                                <select name="ppost" id="ppost" class="form-control" onchange="getpPin(this.value)">
                                    <?php if (empty($upmembr['ppost'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($post as $pst) { ?>
                                        <option value="<?php echo $pst['post_id'] ?>" <?php echo ($pst['post_id'] == $upmembr['ppos']) ? "selected" : "" ?>>
                                            <?php echo $pst['post_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lab">Select Pin Code </label>
                                <select name="ppin" id="ppin" class="form-control">
                                    <?php if (empty($upmembr['ppin'])) { ?>
                                        <option value=""></option>
                                    <?php } ?>
                                    <?php foreach ($pin as $pn) { ?>
                                        <option value="<?php echo $pn['pin_id'] ?>" <?php echo ($pn['pin_id'] == $upmembr['ppn']) ? "selected" : "" ?>>
                                            <?php echo $pn['pin_no'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
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