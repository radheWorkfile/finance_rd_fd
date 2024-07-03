<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $this->session->userdata('company_name') ?> | Create RD Plan
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
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_sector_modal"
                        title='Click Add Income Source' class="btn btn-primary float-right"> <i class="fas fa-plus"></i>
                        Create Rd Plan</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Plan Name</th>
                                <th>Duration</th>
                                <th>Amount</th>
                                <th>Interest Amount  / Percentage(%)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($plan as $pl => $pln) { ?>
                                <tr>
                                    <td>
                                        <?php echo $pl + 1 ?>
                                    </td>
                                    <td>
                                        <?php echo $pln['plan_name'] ?>
                                    </td>
                                    <td>
                                        <?php if ($pln['interval'] == 1) {
                                            echo $pln['duration'] . "&emsp;Month";
                                        } elseif ($pln['interval'] == 2) {
                                            echo $pln['duration'] . "&emsp;Year";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo $pln['amount'] ?>
                                    </td>
                                    <td>
                                        <?php echo (($pln['plan_type'] == 1) ? "₹ " : "") .$pln['interest_percent']. (($pln['plan_type'] == 2) ? " %" : " /-") ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal"
                                            data-target="#update_rd_plan_modal"
                                            onclick="update_rd_plan(<?php echo $pln['id'] ?>)"
                                            title='Click to Update Register Data Details'><i
                                                class="fas fa-edit"></i></a>&emsp;
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.No.</th>
                                <th>Plan Name</th>
                                <th>Duration</th>
                                <th>Amount</th>
                                <th>Interest Amount</th>
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

        <!-- Add Sector Modal Start -->
        <div class="modal fade" id="add_sector_modal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New RD Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="rd_plan_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-12">
                                <label>Plan Name:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                    </div>
                                    <input type="text" name="plan_name" id="plan_name" class="form-control"
                                        placeholder="Enter Plan Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Plan Type:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                    </div>
                                    <select name="plan_type" id="plan_type" class="form-control">
                                        <option value="">--- Select One ----</option>
                                        <option value="1">Fixed Amount</option>
                                        <option value="2">Percentage</option>
                                    </select>
                                </div>
                            </div>
                            <div id="type_data"></div>
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
        <!-- Add Follow Up Sheet Modal End-->

        <!-- View Follow Up Sheet Modal Start -->
        <div class="modal fade" id="view_sector_modal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-body  card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div id="show_sector"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View Follow Up Sheet Modal End-->

        <!-- Update Follow Up Sheet Modal Start -->
        <div class="modal fade" id="update_rd_plan_modal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update RD Plan Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="rd_plan_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_rd_plan"></div>
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
    <!-- Update Follow Up Sheet Modal End-->


    <?php $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/include/js') ?>
    <script>

        $('#plan_type').on('change', function () {
            let type = this.value;
            let str = '';
            if (parseInt(type) == 1) {
                str = `<div class="col-12">
                        <label>Duration:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="text" name="duration" id="duration" class="form-control"
                                placeholder="Enter Duration">
                            <select class="form-control" name="interval" id="interval">
                                <option value="">select interval</option>
                                <option value="1">Month</option>
                                <option value="2">Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Amount:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <input type="text" name="amount" id="amount" class="form-control"
                                placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Interest Amount:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <input type="text" name="fixed_amt" id="fixed_amt"
                                class="form-control" placeholder="Enter Fixed Amount">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Remark:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check"></i></span>
                            </div>
                            <textarea type="text" name="remark" id="remark" class="form-control"
                                placeholder="Enter Remark"></textarea>
                        </div>
                    </div>`;
                $('#type_data').html(str);
            } else if (parseInt(type) == 2) {
                str = `<div class="col-12">
                        <label>Duration:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="text" name="duration" id="duration" class="form-control"
                                placeholder="Enter Duration">
                            <select class="form-control" name="interval" id="interval">
                                <option value="">select interval</option>
                                <option value="1">Month</option>
                                <option value="2">Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Amount:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <input type="text" name="amount" id="amount" class="form-control"
                                placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Interest Percent(%):<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <input type="text" name="interest_percent" id="interest_percent"
                                class="form-control" placeholder="Enter Interest Percent">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Remark:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check"></i></span>
                            </div>
                            <textarea type="text" name="remark" id="remark" class="form-control"
                                placeholder="Enter Remark"></textarea>
                        </div>
                    </div>`;
                $('#type_data').html(str);
            } else {
                $('#type_data').html(' ');
            }

        })

        $('#rd_plan_data').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Category/add_rd_plan',
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

        function update_rd_plan(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Category/update_rd_plan',
                type: "POST",
                data: {
                    'id': id
                },
                success: function (data) {
                    $('#up_rd_plan').html(data);
                },
            });
        }

        $('#rd_plan_updata').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Category/update_rd_plan_data',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    //$('#empmsg').html(data);
                    //console.log(data);
                    var obj = JSON.parse(data);
                    //console.log(obj.icon);
                    //return false;
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

    </script>

</body>

</html>