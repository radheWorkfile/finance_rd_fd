<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Manage Member</title>
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
                    <div id="filter_data">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Agent Id</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($agent as $a => $ag) { ?>
                                <tr>
                                    <td><?php echo $a +1 ?></td>
                                    <td><?php echo "IMBLL".$ag['agent_id'] ?></td>
                                    <td><?php echo $ag['name'] ?></td>
                                    <td><?php echo $ag['mobile'] ?></td>
                                    <td><?php echo $ag['mail'] ?></td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_member_modal" onclick="view_agent(<?php echo $ag['id'] ?>)" title='Click to View Agent Data Details'><i class="fas fa-eye text-success"></i></a>&emsp;
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#update_member_modal" onclick="update_agent(<?php echo $ag['id'] ?>)" title='Click to Update Agent Data Details'><i class="fas fa-edit"></i></a>&emsp;
                                        <?php
                                            $status = ($ag['status'] == 1) ?
                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $ag['id'] . "\",\"0\",\"agent\",\"admin/common/chageStatus\")' title='Click to Di-Active Agent Details Data'><b><i class='fa fa-check'></i> </b></a>"
                                            :
                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $ag['id'] . "\",\"1\",\"agent\",\"admin/common/chageStatus\")' title='Click to Active Agent Details Data '><b><i class='fa fa-times'></i> </b></a>";
                                            echo "<span id=".$ag['id'].">".$status."</span>";
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Agent Id</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- View Lead Modal Start -->
        <div class="modal fade" id="view_member_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body  card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Agent Data Details</h4>
                        <div id="show_agent"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View Lead Modal End-->

        <!-- Update Lead Modal Start -->
        <div class="modal fade" id="update_member_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Agent Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="agent_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_agent"></div>
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
    <!-- Update lead Modal End-->

    <? $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('admin/include/js') ?>
    <script>
        function view_agent(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Agent/view_agent',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#show_agent').html(data);
                },
            });
        }

        function update_agent(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Agent/update_agent',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#up_agent').html(data);
                },
            });
        }

        $('#member_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Member/update_member_data',
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

        function Add_group(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Member/add_group',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#add_group').html(data);
                },
            });
        }

        $('#agent_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Agent/update_agent_data',
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