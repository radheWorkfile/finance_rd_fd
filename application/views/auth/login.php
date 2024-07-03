<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name')?> | Login</title>
    <? $this->load->view('admin/include/css') ?>
    <style>
        #back{
            background-image: url('media/images/bak_img.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:100%; 
        }
    </style>
</head>
<body class="hold-transition login-page" id="back">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3"><b><?php echo $this->session->userdata('company_name')?></b></a>
            </div>
            <div class="card-body">
                <?php
                if ($_REQUEST['msg'] == 'invalid') {
                    echo '<div class="alert alert-warning">
                    Invalid Login Details!!</div>';
                }
                ?>
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?php echo base_url() ?>login/auth" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email_id" value="<?php echo set_value('email_id') ?>" placeholder="Enter your username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red"><?php echo form_error('email_id') ?></span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red"><?php echo form_error('password') ?></span>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- jQuery -->
        <? $this->load->view('admin/include/js') ?>
</body>

</html>