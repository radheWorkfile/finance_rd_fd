<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $this->session->userdata('company_name') ?> | New Member
    </title>
    <? $this->load->view('admin/include/css') ?>
    <style>
        .lab {
            color: gray;
            font-size: 15px;
        }
    </style>
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
                    <div class="card card-default">
                        <div class="card-body">
                            <form id="agent_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <!-- Personal Detils -->
                                <h4><i class="ti-user"></i> Personal Details</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Date Of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="dob" id="dob">
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact Detils -->
                                <h4><i class="ti-headphone-alt"></i> Contact Details</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Mobile Number </label>
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Email Id </label>
                                            <input type="email" class="form-control" name="mail" id="mail"
                                                placeholder="Enter Email ID">
                                        </div>
                                    </div>
                                </div>
                                <!-- Address Detils -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="Reveal-other-body">
                                            <div class="form-group">
                                                <label class="lab">Full Address</label>
                                                <textarea name="address" id="address" cols="30" rows="3" class="form-control" placeholder="Enter Full Address"></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary">
                                    </div>
                                    
                                </div>
                            </form>
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

        $('#agent_data').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Agent/add_agent_data',
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

    </script>
</body>

</html>