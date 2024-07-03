<?
$controller = $this->uri->segment(2);
$menu = $this->uri->segment(3);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?php echo base_url() ?>media/images/favicon.png" alt="Camwel" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $this->session->userdata('company_name') ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url() ?>media/images/pic.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('name'); ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php 
                //  print_r($menu['registration_status']);die;
                    if($menu_chk['registration_status'] == 0 ) { ?>
                        <li class="nav-item">
                            <a href="<?= base_url('user/dashboard') ?>" class="nav-link <?= ($controller == "dashboard") ? "active" : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                    <?php } elseif($menu_chk['registration_status'] == 1 ) { ?>
                        <li class="nav-item">
                            <a href="<?= base_url('user/dashboard') ?>" class="nav-link <?= ($controller == "dashboard") ? "active" : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= ($controller == "Register") ? "menu-open" : ''; ?>">
                            <a href="#" class="nav-link <?= ($controller == "Register") ? "active" : ''; ?>">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Register     
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('user/Register/add_register') ?>" class="nav-link <?= ($menu == "add_register") ? "active" : ''; ?>">
                                        <i class="fa fa-arrow-right nav-icon"></i>
                                        <p>Add Register</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('user/Register/manage_register') ?>" class="nav-link <?= ($menu == "manage_register") ? "active" : ''; ?>">
                                        <i class="fa fa-arrow-right nav-icon"></i>
                                        <p>Manage Register</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>