<!-- =============================================== -->
<!-- Head & Navbar -->
<?php $this->load->view('templates/admin/head');
?>
<?php $this->load->view('templates/admin/nav');
?>

<!-- =============================================== -->
<!-- Sidebar -->
<?php $this->load->view('templates/admin/side');
?>

<!-- =============================================== -->
<!-- Isi kontent dimulai dari sini -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title text-danger"><font size="5" style="text-transform:uppercase;"><b><?= $detail->name_pt ?></b></font></h1>
                        <?= $this->session->flashdata('message');
                        ?>
                        <a href="<?= base_url('pelanggan/edit/').$detail->id_pe ?>" class="btn btn-primary pull-right"><i class="fa fa-pen"></i></a>
                        <a href="<?= base_url('pelanggan/decrease/').$detail->id_pe ?>" class="btn btn-warning pull-right">Decrease</a>
                        <a href="<?= base_url('pelanggan/increase/').$detail->id_pe ?>" class="btn btn-success pull-right">Increase</a>
                        <a href="<?= base_url('pelanggan/terminate/').$detail->id_pe ?>" class="btn btn-danger pull-right">Terminate</a>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                       <div class="form-group col-sm-12">
                            <h3><?= $detail->name ?></h3>
                       </div>
                       <div class="form-group col-sm-12">
                            <label><i class="fa fa-location-arrow"></i>&nbsp;<font size="4">Alamat Lengkap</font></label><h4><h4 size="3"><?= $detail->alamat ?></h4>
                       </div>
                       <div class="form-group col-sm-12">
                            <i class="fa fa-phone"></i>&nbsp;<font size="3"><?= $detail->phone ?></font>
                       </div>
                       <div class="form-group col-sm-12">
                            <i class="fa fa-envelope"></i>&nbsp;<font size="3"><?= $detail->email ?></font>
                       </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- Isi kontent selesai disini -->

<!-- =============================================== -->
<!-- Footer -->
<?php $this->load->view('templates/admin/foot');
?>