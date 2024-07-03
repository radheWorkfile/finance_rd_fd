<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Create Location</title>
    <? $this->load->view('admin/include/css') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
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
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_sector_modal" title='Click Add Location Source' class="btn btn-primary float-right"> <i class="fas fa-plus"></i> Create Location</a><br><br>
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">State</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">District</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Police Station</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Block Office</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-post-tab" data-toggle="pill" href="#custom-tabs-one-post" role="tab" aria-controls="custom-tabs-one-post" aria-selected="false">Post Office</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-pin-tab" data-toggle="pill" href="#custom-tabs-one-pin" role="tab" aria-controls="custom-tabs-one-pin" aria-selected="false">Pin Code</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>State</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($state as $sta => $stat) { ?>
                                                <tr>
                                                    <td><?php echo $sta +1 ?></td>
                                                    <td><?php echo $stat['location'] ?></td>
                                                    <td>
                                                        <?php
                                                        $status = ($stat['status'] == 1) ?
                                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $stat['id'] . "\",\"0\",\"location\",\"admin/common/chageStatus\")' title='Click to Di-Active State Data'><b><i class='fa fa-check'></i> </b></a>"
                                                            :
                                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $stat['id'] . "\",\"1\",\"location\",\"admin/common/chageStatus\")' title='Click to Active State Data '><b><i class='fa fa-times'></i> </b></a>";
                                                            echo "<span id=".$stat['id'].">".$status."</span>";
                                                        ?>&emsp;
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>State</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>District</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($vdistrict as $vdis => $vdris) { ?>
                                                <tr>
                                                    <td><?php echo $vdis +1 ?></td>
                                                    <td><?php echo $vdris['location'] ?></td>
                                                    <td>
                                                        <?php
                                                        $status = ($vdris['status'] == 1) ?
                                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $vdris['id'] . "\",\"0\",\"location\",\"admin/common/chageStatus\")' title='Click to Di-Active District Data'><b><i class='fa fa-check'></i> </b></a>"
                                                            :
                                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $vdris['id'] . "\",\"1\",\"location\",\"admin/common/chageStatus\")' title='Click to Active District Data '><b><i class='fa fa-times'></i> </b></a>";
                                                            echo "<span id=".$vdris['id'].">".$status."</span>";
                                                        ?>&emsp;
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>District</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                    <table id="example4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Police Station</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($vpolice as $vps => $vpls) { ?>
                                                <tr>
                                                    <td><?php echo $vps +1 ?></td>
                                                    <td><?php echo $vpls['location'] ?></td>
                                                    <td>
                                                        <?php
                                                        $status = ($vpls['status'] == 1) ?
                                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $vpls['id'] . "\",\"0\",\"location\",\"admin/common/chageStatus\")' title='Click to Di-Active Police Station Data'><b><i class='fa fa-check'></i> </b></a>"
                                                            :
                                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $vpls['id'] . "\",\"1\",\"location\",\"admin/common/chageStatus\")' title='Click to Active Police Station Data '><b><i class='fa fa-times'></i> </b></a>";
                                                            echo "<span id=".$vpls['id'].">".$status."</span>";
                                                        ?>&emsp;
                                                    </td>
                                                </tr>
                                            <?php } ?> 
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Polic Station</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                    <table id="example5" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Block Office</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($vblock as $vbo => $vblock) { ?>
                                                <tr>
                                                    <td><?php echo $vbo +1 ?></td>
                                                    <td><?php echo $vblock['location'] ?></td>
                                                    <td>
                                                        <?php
                                                        $status = ($vblock['status'] == 1) ?
                                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $vblock['id'] . "\",\"0\",\"location\",\"admin/common/chageStatus\")' title='Click to Di-Active Block Office Data'><b><i class='fa fa-check'></i> </b></a>"
                                                            :
                                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $vblock['id'] . "\",\"1\",\"location\",\"admin/common/chageStatus\")' title='Click to Active Block Office Data '><b><i class='fa fa-times'></i> </b></a>";
                                                            echo "<span id=".$vblock['id'].">".$status."</span>";
                                                        ?>&emsp;
                                                    </td>
                                                </tr>
                                            <?php } ?> 
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Block Office</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-post" role="tabpanel" aria-labelledby="custom-tabs-one-post-tab">
                                    <table id="example6" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Post Office</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($vpost as $vpo => $vpost) { ?>
                                                <tr>
                                                    <td><?php echo $vpo +1 ?></td>
                                                    <td><?php echo $vpost['location'] ?></td>
                                                    <td>
                                                        <?php
                                                        $status = ($vpost['status'] == 1) ?
                                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $vpost['id'] . "\",\"0\",\"location\",\"admin/common/chageStatus\")' title='Click to Di-Active Post Office Data'><b><i class='fa fa-check'></i> </b></a>"
                                                            :
                                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $vpost['id'] . "\",\"1\",\"location\",\"admin/common/chageStatus\")' title='Click to Active Post Office Data '><b><i class='fa fa-times'></i> </b></a>";
                                                            echo "<span id=".$vpost['id'].">".$status."</span>";
                                                        ?>&emsp;
                                                    </td>
                                                </tr>
                                            <?php } ?> 
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Post Office</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-pin" role="tabpanel" aria-labelledby="custom-tabs-one-pin-tab">
                                    <table id="example7" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>State</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($vpin as $vp => $vpi) { ?>
                                                <tr>
                                                    <td><?php echo $vp +1 ?></td>
                                                    <td><?php echo $vpi['location'] ?></td>
                                                    <td>
                                                        <?php
                                                        $status = ($vpi['status'] == 1) ?
                                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $vpi['id'] . "\",\"0\",\"location\",\"admin/common/chageStatus\")' title='Click to Di-Active State Data'><b><i class='fa fa-check'></i> </b></a>"
                                                            :
                                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $vpi['id'] . "\",\"1\",\"location\",\"admin/common/chageStatus\")' title='Click to Active State Data '><b><i class='fa fa-times'></i> </b></a>";
                                                            echo "<span id=".$vpi['id'].">".$status."</span>";
                                                        ?>&emsp;
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>State</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Add Industeries Modal Start -->
        <div class="modal fade" id="add_sector_modal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="location_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label>Location Type:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-ul"></i></span>
                                        </div>
                                        <select name="location_type" id="location_type" class="form-control myselect" onchange="return cross_check(this.value)">
                                            <option value="">---- Select Location type ----</option>
                                                <option value="1">Add State</option>
                                                <option value="2">Add District</option>
                                                <option value="3">Add Police Station</option>
                                                <option value="4">Add Block Office</option>
                                                <option value="5">Add Post Office</option>
                                                <option value="6">Add Pin Code</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="state_section" style="display:none;">
                                    <label>Add State:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                        </div>
                                        <input type="text" name="state" id="state" class="form-control" placeholder="Enter State Name">
                                    </div>
                                </div>
                                <div class="col-12" id="state_drp_section" style="display:none;" >
                                    <label>State:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-ul"></i></span>
                                        </div>
                                        <select name="state_drp" id="state_drp" class="form-control myselect" onchange="return get_state(this.value)">
                                            <option value="">---- Select State ----</option>
                                            <?php foreach($state as $sta) { ?>
                                            <option value="<?php echo $sta['id'] ?>"><?php echo $sta['location'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="district_section" style="display:none;">
                                    <label>Add District:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                        </div>
                                        <input type="text" name="district" id="district" class="form-control" placeholder="Enter District Name">
                                    </div>
                                </div>
                                <div class="col-12" id="district_drp_section" style="display:none;">
                                    <label>District:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-ul"></i></span>
                                        </div>
                                        <select name="district_drp" id="district_drp" class="form-control myselect" onchange="return get_district(this.value)">
                                         <option value="">---- Select District ----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="police_section" style="display:none;">
                                    <label>Add Police Station:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                        </div>
                                        <input type="text" name="police_station" id="police_station" class="form-control" placeholder="Enter Polic Station Name">
                                    </div>
                                </div>
                                <div class="col-12" id="police_drp_section" style="display:none;">
                                    <label>Police Station:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-ul"></i></span>
                                        </div>
                                        <select name="police_drp" id="police_drp" class="form-control myselect" onchange="return get_block(this.value)">
                                            <option value="">---- Select Police Station ----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="block_section" style="display:none;">
                                    <label>Add Block Office:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                        </div>
                                        <input type="text" name="block_office" id="block_office" class="form-control" placeholder="Enter Block Office Name">
                                    </div>
                                </div>
                                <div class="col-12" id="block_drp_section" style="display:none;">
                                    <label>Block Office:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-ul"></i></span>
                                        </div>
                                        <select name="block_drp" id="block_drp" class="form-control myselect" >
                                            <option value="">---- Select Block Office ----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="post_section" style="display:none;">
                                    <label>Add Post Office:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                        </div>
                                        <input type="text" name="post_office" id="post_office" class="form-control" placeholder="Enter Post Office Name">
                                    </div>
                                </div>
                                <div class="col-12" id="post_drp_section" style="display:none;">
                                    <label>Post Office:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list-ul"></i></span>
                                        </div>
                                        <select name="post_drp" id="post_drp" class="form-control myselect">
                                            <option value="">---- Select Post Office ----</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12" id="pin_code_section" style="display:none;">
                                    <label>Add Pin Code:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                        </div>
                                        <input type="text" name="pin_code" id="pin_code" class="form-control" placeholder="Enter Pin Code Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- Add industeries Modal End-->

        <!-- View industeries Modal Start -->
        <div class="modal fade" id="view_industeries_modal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-body  card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div id="show_industeries"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View industeries Modal End-->

        <!-- Update industeries Modal Start -->
        <div class="modal fade" id="update_industeries_modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="industeries_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_industeries"></div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="submit" value="update">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Update industeries Modal End-->


    <? $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('admin/include/js') ?>
    <script>
        function get_state(id){
            $.ajax({
                url : '<?= base_url() ?>admin/Category/get_state',
                type : "POST",
                data: {'id':id},
                dataType: 'json',
                success: function(data) {
                    $('#district_drp').empty();
                    $('#district_drp').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#district_drp').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function get_district(id){
            $.ajax({
                url : '<?= base_url() ?>admin/Category/get_district',
                type : "POST",
                data: {'id':id},
                dataType: 'json',
                success: function(data) {
                    $('#police_drp').empty();
                    $('#police_drp').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#police_drp').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });

            $.ajax({
                url : '<?= base_url() ?>admin/Category/get_post',
                type : "POST",
                data: {'id':id},
                dataType: 'json',
                success: function(data) {
                    $('#post_drp').empty();
                    $('#post_drp').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#post_drp').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function get_block(id){
            $.ajax({
                url : '<?= base_url() ?>admin/Category/get_block',
                type : "POST",
                data: {'id':id},
                dataType: 'json',
                success: function(data) {
                    $('#block_drp').empty();
                    $('#block_drp').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#block_drp').append('<option value="' + item.id + '">' + item.location + '</option>')
                    });
                }
            });
        }

        function cross_check(id) {
            if (id == 1) {
                $("#state_section").show('slow');
                $("#state_drp_section").hide('slow');
                $("#district_section").hide('slow');
                $("#district_drp_section").hide('slow');
                $("#police_section").hide('slow');
                $("#police_drp_section").hide('slow');
                $("#block_section").hide('slow');
                $("#block_drp_section").hide('slow');
                $("#post_section").hide('slow');
                $("#post_drp_section").hide('slow');
                $("#pin_code_section").hide('slow');
            } else if(id == 2){
                $("#state_section").hide('slow');
                $("#state_drp_section").show('slow');
                $("#district_section").show('slow');
                $("#district_drp_section").hide('slow');
                $("#police_section").hide('slow');
                $("#police_drp_section").hide('slow');
                $("#block_section").hide('slow');
                $("#block_drp_section").hide('slow');
                $("#post_section").hide('slow');
                $("#post_drp_section").hide('slow');
                $("#pin_code_section").hide('slow');
            } else if(id == 3){
                $("#state_drp_section").show('slow');
                $("#district_section").hide('slow');
                $("#district_drp_section").show('slow');
                $("#police_section").show('slow');
                $("#police_drp_section").hide('slow');
                $("#block_section").hide('slow');
                $("#block_drp_section").hide('slow');
                $("#post_section").hide('slow');
                $("#post_drp_section").hide('slow');
                $("#pin_code_section").hide('slow');
            } else if(id == 4) {
                $("#state_section").hide('slow');
                $("#state_drp_section").show('slow');
                $("#district_section").hide('slow');
                $("#district_drp_section").show('slow');
                $("#police_section").hide('slow');
                $("#police_drp_section").hide('slow');
                $("#block_section").show('slow');
                $("#block_drp_section").hide('slow');
                $("#post_section").hide('slow');
                $("#post_drp_section").hide('slow');
                $("#pin_code_section").hide('slow');
            } else if(id == 5) {
                $("#state_section").hide('slow');
                $("#state_drp_section").show('slow');
                $("#district_section").hide('slow');
                $("#district_drp_section").show('slow');
                $("#police_section").hide('slow');
                $("#police_drp_section").hide('slow');
                $("#block_section").hide('slow');
                $("#block_drp_section").hide('slow');
                $("#post_section").show('slow');
                $("#post_drp_section").hide('slow');
                $("#pin_code_section").hide('slow');
            } else if(id == 6) {
                $("#state_section").hide('slow');
                $("#state_drp_section").show('slow');
                $("#district_section").hide('slow');
                $("#district_drp_section").show('slow');
                $("#police_section").hide('slow');
                $("#police_drp_section").hide('slow');
                $("#block_section").hide('slow');
                $("#block_drp_section").hide('slow');
                $("#post_section").hide('slow');
                $("#post_drp_section").show('slow');
                $("#pin_code_section").show('slow');
            }
        }

        $('#location_data').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url : '<?= base_url() ?>admin/Category/add_location',
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

        $('#industeries_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Category/update_industeries_data',
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
    </script>
</body>
</html>