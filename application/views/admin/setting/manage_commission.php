<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Manage Commission</title>
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Category Name</th>
                                <th>Commission</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $rs => $dt) { ?>
                                <tr>
                                    <td><?php echo $rs + 1; ?></td>
                                    <td><?php echo $dt['name'] ?></td>
                                    <td><?php echo $dt['commission'] ?> %</td>
                                    <td><?php echo $dt['description'] ?></td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#update_category" onclick="update_commission(<?php echo $dt['id'] ?>)" title='Click to Update Commission Category Details'><i class="fas fa-edit"></i></a>&emsp;
                                        <?php
                                        $status = ($dt['status'] == 1) ?
                                            "<a href='javascript:void()' onClick='return changeStatus(\"" . $dt['id'] . "\",\"0\",\"commission_category\",\"admin/common/chageStatus\")' title='Click to Di-Active Commission Category'><b><i class='fa fa-check text-success'></i> </b></a>"
                                            :
                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $dt['id'] . "\",\"1\",\"commission_category\",\"admin/common/chageStatus\")' title='Click to Active Commission Category'><b><i class='fa fa-times'></i> </b></a>";
                                        echo $status;
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.No.</th>
                                <th>Category Name</th>
                                <th>Commission</th>
                                <th>Description</th>
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

        
        <!-- Update Category Modal Start -->
        <div class="modal fade" id="update_category">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="cat_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_cat"></div>
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
    <!-- Update Profile Modal End-->

    <? $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('admin/include/js') ?>
    <script>
       
        function update_commission(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/setting/update_commission',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#up_cat').html(data);
                },
            });
        }

        $('#cat_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/setting/update_commission_data',
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

    </script>

</body>

</html>