<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Software Setting</title>
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
                    <div class="card card-default">
                        <div class="card-body">
                            <form id="software_setting" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Company Name:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="<?php echo $source['company_name'] ?>">
                                            <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter Company Name" value="<?php echo $source['id'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Company Url:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="company_url" id="company_url" placeholder="Enter Company Url" value="<?php echo $source['company_url'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Company Address:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <textarea name="company_address" class="form-control" id="company_address" rows="2" placeholder="Enter Company Address"><?php echo $source['company_address'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label>Company Logo:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="company_logo" id="company_logo">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label>Current Photo:</label><br>
                                        <img class="profile-user-img img-fluid"  src="<?php echo !empty(base_url($source['company_logo'])) ? base_url($source['company_logo']) : base_url("uploads/no_image.jpg") ?>" alt="Company Logo Image">
                                    </div>
                                    <div class="col-3">
                                        <label>Bill Header:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="bill_header" id="bill_header">
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary">
                                    </div>
                                    <div class="col-3">
                                        <label>Current Photo:</label><br>
                                        <img class="profile-user-img img-fluid" style="height: auto; width: 100%;" src="<?php echo !empty(base_url($source['bill_header'])) ? base_url($source['bill_header']) : base_url("uploads/no_image.jpg") ?>" alt="Company Bill Header Image">
                                    </div>
                                    <div class="col-3">
                                        <label>Watermark:<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="watermark" id="watermark">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label style="margin-top:8px;">Current Photo:</label><br>
                                        <img class="profile-user-img img-fluid" style="height: auto; width: 100%;" src="<?php echo !empty(base_url($source['watermark'])) ? base_url($source['watermark']) : base_url("uploads/no_image.jpg") ?>" alt="Company Watermark Image">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.modal -->
    <!-- Update Category Modal End-->

    <? $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('admin/include/js') ?>
    <script>
        $('#software_setting').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/setting/up_software_setting',
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