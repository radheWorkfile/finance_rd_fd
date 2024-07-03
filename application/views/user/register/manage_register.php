<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Manage Register</title>
    <? $this->load->view('user/include/css') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
    <div class="wrapper">
        <!-- Navbar -->
        <? $this->load->view('user/include/header') ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <? $this->load->view('user/include/left') ?>
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
                <div class="card card-default">
                    <div class="card-body">
                        <form id="filter_register_date" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <label> Sector Name:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <select name="sector" id="sector" class="form-control" onchange="getIndustries(this.value)">
                                            <option value="">--- Select One --- </option>
                                            <?php foreach ($sector as $sec) { ?>
                                                <option value="<?php echo $sec['id'] ?>"><?php echo $sec['sector_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label> Industeries Name:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <select name="industries" id="industries" class="form-control">
                                        <option value="">--- Select One --- </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>From:</label>
                                    <input type="date" name="from_date" id="from_date" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label>To:</label>
                                    <input type="date" name="to_date" id="to_date" class="form-control"><br>
                                </div>
                                <input type="submit" value="search" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                    <div id="filter_data">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($register as $re => $reges) { ?>
                                <tr>
                                    <td><?php echo $re +1 ?></td>
                                    <td><?php echo $reges['name'] ?></td>
                                    <td><?php echo $reges['mobile'] ?></td>
                                    <td><?php echo $reges['mail'] ?></td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_register_modal" onclick="view_register(<?php echo $reges['id'] ?>)" title='Click to View Register Data Details'><i class="fas fa-eye text-success"></i></a>&emsp;
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#update_register_modal" onclick="update_register(<?php echo $reges['id'] ?>)" title='Click to Update Register Data Details'><i class="fas fa-edit"></i></a>&emsp;
                                        <a href="javascript:void(0);" onclick="deletedata(<?php echo $reges['id'] ?>)" title='Click to Delete Register Data Details'><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>S.No.</th>
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
        
        <!-- View Lead Modal Start -->
        <div class="modal fade" id="view_register_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body  card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">register Data Details</h4>
                        <div id="show_register"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View Lead Modal End-->
        
        <!-- Update Lead Modal Start -->
        <div class="modal fade" id="update_register_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Register Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="register_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_register"></div>
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

    <? $this->load->view('user/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('user/include/js') ?>
    <script>
            $('#filter_register_date').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>user/register/register_search_data',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    $('#filter_data').html(data);
                    console.log(data);
                }
            });
        });

        function getIndustries(sector) {
            $.ajax({
                url: '<?= base_url() ?>user/Register/get_industries',
                type: "POST",
                data: {
                    'sector': sector
                },
                dataType: 'json',
                success: function(data) {
                    $('#industries').empty();
                    $('#industries').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#industries').append('<option value="' + item.id + '">' + item.industeries_name + '</option>')
                    });
                }
            });
        }


        function view_register(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'user/register/View_register',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#show_register').html(data);
                },
            });
        }

        function update_register(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'user/register/update_register',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#up_register').html(data);
                },
            });
        }

        function deletedata(id) {
            if (confirm("Do You Want To Delete")) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>' + 'user/register/delete_register',
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

        $('#register_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>user/Register/update_register_data',
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