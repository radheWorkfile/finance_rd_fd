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
                            <form id="Rd_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <!-- Personal Detils -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="lab">Member Name <span class="text-danger">*</span></label>
                                            <select name="member_name" id="member_name" class="form-control myselect">
                                                <option value="">--- Select One ---</option>
                                                <?php foreach($member as $mbr) { ?>
                                                    <option value="<?php echo $mbr['id'] ?>"><?php echo  $mbr['user_id'] ." | ".$mbr['name'] ?></option>
                                                <?php } ?>
                                                <input type="hidden" name="user_id" id="user_id" >
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="lab">Rd Plan <span class="text-danger">*</span></label>
                                                <select name="rd_plan" id="rd_plan" class="form-control myselect" onchange="return rd_data(this.value)">
                                                    <option value="">--- Select One ---</option>
                                                    <?php foreach($rd_plan as $rd) {  
                                                        if ($rd['interval'] == 1) {
                                                            $duration =  $rd['duration'] ." Month";
                                                        } elseif ($rd['interval'] == 2) {
                                                            $duration =  $rd['duration'] ." Year";
                                                        } 
                                                    ?>
                                                        <option value="<?php echo $rd['id'] ?>"><?php echo $rd['plan_name']." | ".$duration ?></option>
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
                                            <label class="lab">Rd Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="rd_date" id="rd_date" value="<?php echo date('Y-m-d') ?>">
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
    <script>

        function rd_data(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Rd/get_rd_plan_data',
                type: "POST",
                data: {
                    'id': id
                },
                dataType:'json',
                success: function(data) {
                    // console.log(data);
                    if(data != null){
                        $('#duration').val(data.duration);
                        $('#amount').val(data.amount);
                        $('#interest_percent').val(data.interest_percent);
                        $('#interval').val(data.interval);
                        $('#plan_type').val(data.plan_type);
                        if(data.plan_type == 1){
                            $('#lable_nm').html('Contribution Amount')
                        }else if(data.plan_type == 2){
                            $('#lable_nm').html('Interest Percent')
                        }
                    }else{
                        $('#duration').val('');
                        $('#amount').val('');
                        $('#interest_percent').val('');
                        $('#interval').val('');
                        $('#plan_type').val('');                        
                        $('#lable_nm').html('Interest Percent')
                    }
                },
            });
        }


        $('#member_name').on('change',function(){
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Rd/get_member_data',
                type: "POST",
                data: {
                    'id': this.value
                },
                dataType:'json',
                success: function(data) {
                    // console.log(data);
                    if(data != null){
                        $('#dob').html(`<input type="date" class="form-control" value="${data.dob}" disabled readonly>`);                        
                    }else{
                        $('#dob').html(`<input type="date" class="form-control" disabled readonly>`);                
                    }
                },
            });
        })

        $('#Rd_data').submit(function(e) {
        e.preventDefault();
            $.ajax({
                url : '<?= base_url() ?>admin/Rd/add_rd',
                type : "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                dataType: 'json',
                success: function(data) {
                    if (data.icon == "error") {
                        var valid = '';
                        $.each(data.text, function(i, item){
                            valid += item;
                        });
                        Toast.fire({
                            icon: data.icon,
                            html: valid,
                        });
                    }else{
                        Toast.fire({
                            icon: data.icon,
                            text: data.text
                        });
                        window.location.reload(true);
                    }
                }
            });
        });

        $('#member_name').on('change',function(){
            let user_id = $('#member_name option:selected').text();
            $('#user_id').val(user_id.split('|')[0]);
        })

    </script>
</body>

</html>