<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Dashboard</title>
    <? $this->load->view('user/include/css') ?>
    <style>
    .profile_img{
        border:1px solid #adb5bd;
        margin:0 auto;
        padding:2px;
        width: 450px;
        height:335px;
    }
    .he{
        height:140px;
    }
</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
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
            <section class="content">
                <div class="container-fluid">
                    <?php if($menu_chk['registration_status'] == 1) { ?>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner he">
                                    <h3><?php echo $menu_chk['pkg_nme'] ?></h3>
                                    <p>Current Package</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $fmly_mber ?></h3>

                                    <p>Total Family Member</p>
                                </div>
                                <div class="icon">
                                 <i class="fas fa-users"></i>
                                </div>
                                <a href="<?php echo base_url('user/Register/manage_register') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner he">
                                    <h3><?php echo $business ?></h3>

                                    <p>Total Business</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-briefcase"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner he">
                                    <h3><?php echo $industeries ?></h3>
                                    <p>Total Industeries</p>
                                </div>
                                <div class="icon">
                                 <i class="fas fa-industry"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                        <div id="filter_data">

                        </div>
                    <div class="row">
                        <?php foreach($ads as $ad) { ?>
                            <div class="row">
                                <div class="col-6" style="margin-left:50px; ">
                                <p style="padding-top:20px; text-align:center">
                                <b><?php echo $ad['title'] ?></b>
                            </p><br>
                            <img class="profile_img" src="<?php echo !empty($ad['photo']) ? $ad['photo'] : base_url("uploads/no_image.jpg") ?>" alt="User advertisement picture">
                                </div>
                            </div>
                            
                        <?php } ?>
                        
                    </div>
                    <?php } elseif($menu_chk['registration_status'] == 0){ ?>
                    <div class="row">
                        <h2>This  is User Panel ! Your ID not approved yet.</h2>
                    </div>
                    <?php } ?>
                </div><!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <? $this->load->view('user/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('user/include/js') ?>
    <script>
         $('#filter_voter_data').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>user/Dashboard/voter_search_data',
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
    </script>
</body>

</html>