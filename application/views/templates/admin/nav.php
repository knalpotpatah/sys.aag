<?php
$email = $this->session->userdata('email');
$user = $this->db->get_where('users', array('email' => $email))->row();
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url('ngadmin/dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img class="cover" src="<?= base_url('assets/images/logo.png') ?>"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?= base_url('assets/images/logo_gede.png') ?>"></span>
       
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-bell text-warning"></i></a>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url('assets/images/user/').$user->photo.$user->p_type ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $user->name_user ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url('assets/images/user/').$user->photo.$user->p_type ?>" class="img-circle" alt="User Image">
                            <p>
                                <?= $user->name_user ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>