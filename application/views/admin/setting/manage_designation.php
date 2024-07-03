<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Manage Designation</title>
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
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_designation_modal" title='Click Add Designation Name' class="btn btn-primary float-right"> <i class="fas fa-plus"></i> Add Designation</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Designation Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($designation as $so => $sou) { ?>
                                <tr>
                                    <td><?php echo $so + 1; ?></th>
                                    <td><?php echo $sou['designation_name'] ?></td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#update_source_modal" onclick="update_designation(<?php echo $sou['id'] ?>)" title='Click to Update Source Details'><i class="fas fa-edit"></i></a>&emsp;
                                        <?php
                                        $status = ($sou['status'] == 1) ?
                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $sou['id'] . "\",\"0\",\"lead_source\",\"admin/common/chageStatus\")' title='Click to Di-Active Source'><b><i class='fa fa-check'></i> </b></a>"
                                            :
                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $sou['id'] . "\",\"1\",\"lead_source\",\"admin/common/chageStatus\")' title='Click to Active Source'><b><i class='fa fa-times'></i> </b></a>";
                                        echo $status;
                                        ?>&emsp;
                                        <a href="javascript:void(0);" onclick="deletedata(<?php echo $sou['id'] ?>)" title='Click to Delete Source Details'><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.No.</th>
                                <th>Designation Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Add Source Modal Start -->
        <div class="modal fade" id="add_designation_modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Designation Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="add_designation_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label> Designation Name:<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="designation_name" id="desi_name" placeholder="Enter Designation Name">
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
        <!-- Add Source Modal End-->

        <!-- Update Source Modal Start -->
        <div class="modal fade" id="update_source_modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Designation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="designation_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_designation"></div>
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
    <!-- Update Source Modal End-->


    <? $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('admin/include/js') ?>
    <script>
        $('#add_designation_data').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/setting/add_designation',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                dataType: 'json',
                success: function(data) {
                    if (data.icon == "error") {
                        var valid = '';
                        $.each(data.text, function(i, item) {
                            valid += item;
                        });
                        Toast.fire({
                            icon: data.icon,
                            html: valid,
                        })

                    } else {
                        Toast.fire({
                            icon: data.icon,
                            text: data.text
                        })
                        //setTimeout(location.reload.bind(location), 3000);
                        window.location.reload(true);
                    }
                }
            });
        });

        function update_designation(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/setting/update_designation',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#up_designation').html(data);
                },
            });
        }

        function deletedata(id) {
            if (confirm("Do You Want To Delete")) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>' + 'admin/setting/delete_designation',
                    data: {
                        'id': id,
                    },
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
                })
            }
        }

        $('#designation_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/setting/update_designation_data',
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