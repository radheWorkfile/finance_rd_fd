<?php
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
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($controller == "dashboard") ? "active" : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= ($controller == "setting") ? "menu-open" : ''; ?>">
                    <a href="#" class="nav-link <?= ($controller == "setting") ? "active" : ''; ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/setting/software_setting') ?>" class="nav-link <?= ($menu == "software_setting") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Admin Setting</p>
                            </a>
                        </li>
                    </ul>
                </li><i class=""></i>
                <li class="nav-item <?= ($controller == "Category") ? "menu-open" : ''; ?>">
                    <a href="#" class="nav-link <?= ($controller == "Category") ? "active" : ''; ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Category/location') ?>" class="nav-link <?= ($menu == "location") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Create Location</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Category/rd_plan') ?>" class="nav-link <?= ($menu == "rd_plan") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Create RD Plan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Category/fd_plan') ?>" class="nav-link <?= ($menu == "fd_plan") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Create FD Plan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($controller == "Agent") ? "menu-open" : ''; ?>">
                    <a href="#" class="nav-link <?= ($controller == "Agent") ? "active" : ''; ?>">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Agent
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Agent/add_agent') ?>" class="nav-link <?= ($menu == "add_agent") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Add Agent</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Agent/manage_agent') ?>" class="nav-link <?= ($menu == "manage_agent") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Manage Agent</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($controller == "Member") ? "menu-open" : ''; ?>">
                    <a href="#" class="nav-link <?= ($controller == "Member") ? "active" : ''; ?>">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Member
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Member/add_member') ?>" class="nav-link <?= ($menu == "add_member") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Add Member</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Member/manage_member') ?>" class="nav-link <?= ($menu == "manage_member") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Manage Member</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($controller == "Rd") ? "menu-open" : ''; ?>">
                    <a href="#" class="nav-link <?= ($controller == "Rd") ? "active" : ''; ?>">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            RD
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Rd/rd') ?>" class="nav-link <?= ($menu == "rd") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Add RD</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Rd/manage_rd') ?>" class="nav-link <?= ($menu == "manage_rd") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Manage RD</p>
                            </a>
                        </li>
                    </ul>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Rd/manage_passbook') ?>" class="nav-link <?= ($menu == "manage_passbook") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Passbook</p>
                            </a>
                        </li>
                    </ul> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Rd/manage_close_rd_plan') ?>" class="nav-link <?= ($menu == "manage_close_rd_plan") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Close RD Plan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($controller == "Fd") ? "menu-open" : ''; ?>">
                    <a href="#" class="nav-link <?= ($controller == "Fd") ? "active" : ''; ?>">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            FD
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Fd/fd') ?>" class="nav-link <?= ($menu == "fd") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Add FD</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Fd/manage_fd') ?>" class="nav-link <?= ($menu == "manage_fd") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Manage FD</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Fd/manage_close_fd_plan') ?>" class="nav-link <?= ($menu == "manage_close_fd_plan") ? "active" : ''; ?>">
                                <i class="fa fa-arrow-right nav-icon"></i>
                                <p>Close FD Plan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- --------------------------------------- work start of Maturity -------------------  -->

                
                <!-- --------------------------------------- work end of Maturity -------------------  -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>