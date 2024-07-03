<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Add New RD</title>
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
                            <form id="Fd_datas" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <!-- Personal Detils -->
                                <div class="row">

                        <div class="col-6">
                        <label>Member:<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span></div>
                        <input type="text" class="form-control" name="member_name" id="member_name" value="<?php echo $close_fd['nm']. "(" . $close_fd['u_id'] . ")"?>" readonly>
                        <input type="hidden" class="form-control" name="fd_id" id="fd_id" value="<?php echo $close_fd['id'] ?>">
                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $close_fd['user_id'] ?>">
                        </div>
                        </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="lab">Fd Plan <span class="text-danger">*</span></label>
                                                <select name="fd_plan" id="fd_plan" class="form-control myselect" onchange="return fd_data(this.value)">
                                                    <option value="">--- Select One ---</option>
                                                    <?php foreach($fd_plan as $fd) {  
                                                        if ($fd['interval'] == 1) {
                                                            $duration =  $fd['duration'] ." Month";
                                                        } elseif ($fd['interval'] == 2) {
                                                            $duration =  $fd['duration'] ." Year";
                                                        }  
                                                    ?>
                                                    <option value="<?php echo $fd['id'] ?>"><?php echo $fd['plan_name']." | ".$duration ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Date Of Birth<span class="text-danger">*</span></label>
                                            <span id="dob"><input type="date" class="form-control" disabled readonly></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Fd Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="fd_date" id="fd_date" value="<?php echo date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="lab">Duration <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="duration" id="duration" readonly>
                                                <input type="hidden" class="form-control" name="interval" id="interval">
                                                <input type="hidden" class="form-control" name="plan_type" id="plan_type">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="lab">Amount <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="amount" id="amount" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="lab"><span id="lable_nm">Interest Percent</span><span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="interest_percent" id="interest_percent" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary" style="float: right;">
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

</body>

</html>