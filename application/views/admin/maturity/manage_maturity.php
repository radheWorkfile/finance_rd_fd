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
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="member_name" id="member_name" value="<?php echo $close_fd['nm']. "(" . $close_fd['u_id'] . ")"?>" readonly>
                <input type="hidden" class="form-control" name="fd_id" id="fd_id" value="<?php echo $close_fd['id'] ?>">
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $close_fd['user_id'] ?>">
            </div>
        </div>
        <div class="col-6">
            <label>Rd Plan:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="fd_plan" id="fd_plan" value="<?php echo $close_fd['p_nm'] ?>" readonly>
            </div>
        </div>
        <div class="col-6">
            <label>Total Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_amount" id="total_amount" value="<?php echo round((float)$total_amt) ?>" readonly>
            </div>
        </div>
        <div class="col-6">
            <label>Total Interest Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_interest_amount" id="total_interest_amount" value="<?php echo round((float)$interest_amt) ?>" readonly>
            </div>
        </div>
        <div class="col-6">
            <label>Interest Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                </div>
                <select name="interest_amt_permission" id="interest_amt_permission" class="form-control" onchange="return total_amt(this.value)">
                    <option value="">----Select One----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <label>Paid Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_paid_amount" id="total_paid_amount" placeholder="Enter Paid Amount" readonly>
            </div>
        </div>
        <div class="col-6">
            <label>Mode Of Payment:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                </div>
                <select name="mop" id="mop" class="form-control">
                    <option value="">----Select One----</option>
                    <option value="1">Online</option>
                    <option value="2">Cheque</option>
                    <option value="3">Cash</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <label>Paid date:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" name="paid_date" id="paid_date" value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>
        <div class="col-6">
            <label>Penalty Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="penalty_amount" id="penalty_amount" placeholder="Enter Penalty Amount">
            </div>
        </div>
        <div class="col-6">
            <label>Payment Remarks:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                </div>
                <textarea name="payment_remarks" id="payment_remarks" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-3">
        <input type="submit" name="submit" class="btn btn-primary" style="float: right;width:100%;">
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
 


</body>

</html>