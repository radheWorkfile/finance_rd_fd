<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $this->session->userdata('company_name') ?> | Manage Close FD Plan
    </title>
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
                    <div id="filter_data">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Member Name</th>
                                    <th>RD Plan</th>
                                    <th>Total Paid Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($close_fd as $cf => $cls_fd) { ?>
                                    <tr>
                                        <td><?php echo $cf + 1 ?></td>
                                        <td><?php echo $cls_fd['member_name'] . "(" . $cls_fd['member_id'] . ")" ?></td>
                                        <td><?php echo $cls_fd['p_nm'] ?></td>
                                        <td><?php echo $cls_fd['total_paid_amount'] ?></td>
                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_fd_modal"
                                            onclick="view_close_fd_plan(<?php echo $cls_fd['id'] ?>)" title='Click to View close RD Plan Data Details'><i class="fas fa-eye text-success"></i></a>&emsp;
                                            <?php
                                            $status = ($cls_fd['status'] == 1) ? 
                                                "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $cls_fd['id'] . "\",\"0\",\"registration\",\"admin/common/chageStatus\")' title='Click to Di-Active RD Details Data'><b><i class='fa fa-check'></i> </b></a>"
                                                :
                                                "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $cls_fd['id'] . "\",\"1\",\"registration\",\"admin/common/chageStatus\")' title='Click to Active RD Details Data '><b><i class='fa fa-times'></i> </b></a>";
                                            echo "<span id=" . $cls_fd['id'] . ">" . $status . "</span>";
                                            ?>&emsp;
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Member Name</th>
                                    <th>RD Plan</th>
                                    <th>Total Paid Amount</th>
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

        <!-- View RD Data Modal Start -->
        <div class="modal fade" id="view_fd_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body  card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">FD Data Details</h4>
                        <div id="show_close_fd_plan"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View RD Data Modal End-->

        <!-- Update Lead Modal Start -->
        <div class="modal fade" id="update_rd_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update RD Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="Rd_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_rd"></div>
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

    <?php $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/include/js') ?>
    <script>

        function view_close_fd_plan(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Fd/view_close_fd_plan',
                type: "POST",
                data: {
                    'id': id
                },
                success: function (data) {
                    $('#show_close_fd_plan').html(data);
                },
            });
        }
        
    </script>
</body>

</html>