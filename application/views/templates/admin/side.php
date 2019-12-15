<!-- Ambil data by session -->
<?php
$email = $this->session->userdata('email');
$user = $this->db->get_where('users', array('email' => $email))->row();
?>
<?php
$email = $this->session->userdata('email');
$user2 = $this->db->get_where('users', array('email' => $email, 'level' => 0))->row();
?>

<aside class="main-sidebar side">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('style/admin/lte/dist/img/default.png') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user->name_user ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

 
        <!-- tampil menu berdasar group -->
        <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?=base_url('admin/dashboard')?>">
                                <i class="fa fa-home"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if($user2):?>
                        <li class="treeview">
                            <a href="#" class="dropdown-btn">
                                <i class="fa fa-user"></i>
                                <span>Data User</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url('sales')?>"><i class="fa fa-angle-double-right"></i> Sales</a></li>
                                <li><a href="<?=base_url('admin/about/tambah')?>"><i class="fa fa-angle-double-right"></i>Service</a></li>
                                <li><a href="<?=base_url('admin/about/tambah')?>"><i class="fa fa-angle-double-right"></i>HR</a></li>
                                <li><a href="<?=base_url('admin/about/tambah')?>"><i class="fa fa-angle-double-right"></i>FA</a></li>
                                <li><a href="<?=base_url('admin/about/tambah')?>"><i class="fa fa-angle-double-right"></i>QA</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#" class="dropdown-btn">
                                <i class="fa fa-star"></i>
                                <span>Data Pelanggan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url('pelanggan')?>"><i class="fa fa-angle-double-right"></i> All</a></li>
                                <li><a href="<?=base_url('pelanggan/kontrak')?>"><i class="fa fa-angle-double-right"></i> Kontrak</a></li>
                                <li><a href="<?=base_url('pelanggan/job')?>"><i class="fa fa-angle-double-right"></i> Job</a></li>
                                <li><a href="<?=base_url('pelanggan/data_inc')?>"><i class="fa fa-angle-double-right"></i>Price Increase</a></li>
                                <li><a href="<?=base_url('pelanggan/data_dec')?>"><i class="fa fa-angle-double-right"></i> Price Decrease</a></li>
                                <li><a href="<?=base_url('pelanggan/data_terminate/')?>"><i class="fa fa-angle-double-right"></i> Data Termination</a></li> 
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('pelanggan/data_terminate') ?>" class="dropdown-btn">
                                <i class="fa fa-close"></i>
                                <span>Data Termination</span>
                                
                            </a> 
                        </li> -->
                        <li class="treeview">
                            <a href="#" class="dropdown-btn">
                                <i class="fa fa-bars"></i>
                                <span>Data Penjualan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url('pelanggan')?>"><i class="fa fa-angle-double-right"></i> All</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li class="treeview">
                            <a href="#" class="dropdown-btn">
                                <i class="fa fa-star"></i>
                                    <span>Pelanggan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url('pelanggan')?>"><i class="fa fa-angle-double-right"></i> Data Pelanggan</a></li>
                                <!-- <li><a href="<?=base_url('admin/news/tambah')?>"><i class="fa fa-angle-double-right"></i> Tambah News</a></li> -->
                            </ul>
                        </li><?php endif ?>
                    </ul>
    </section>
    <!-- /.sidebar -->
</aside>