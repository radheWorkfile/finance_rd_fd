<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Add Payment</title>
    <? $this->load->view('admin/include/css') ?>
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
                            <form id="payment_search" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Enter Member Id:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                            </div>
                                            <input type="text" name="member_id" id="member_id" class="form-control" placeholder="Enter Member Id"> &nbsp;
                                            <input type="submit" name="submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="rd_payment_data">
                            </div>
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

    <? $this->load->view('admin/include/js') ?>
    <script>
        $('#payment_search').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Rd/get_passbook_datas',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    $('#rd_payment_data').html(data);
                }
            });
        });
    </script>
</body>
</html>