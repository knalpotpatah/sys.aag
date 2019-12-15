<!-- =============================================== -->
<!-- Head & Navbar -->
<?php $this->load->view('back/templates/admin/head');
?>
<?php $this->load->view('back/templates/admin/nav');
?>

<!-- =============================================== -->
<!-- Sidebar -->
<?php $this->load->view('back/templates/admin/side');
?>
<!-- =============================================== -->
<!-- Isi kontent dimulai dari sini -->

<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tambah Admin</strong></h3>
            </div>
            <div class="box-body ">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required value="<?= set_value('nama') ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger" style="padding-left:5px">', '</small>') ?>
                    </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" required name="password">
                        <?= form_error('password', '<small class="text-danger" style="padding-left:5px">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control" required name="passwordc">
                        <?= form_error('passwordc', '<small class="text-danger" style="padding-left:5px">', '</small>') ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Status</label>
                            <select class="form-control" required name="status">
                                <option value="">Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Tidak Aktif</option>
                            </select>

                        </div>
                    </div>
                    <button type="submit" name="submit" value="tambah" class="btn btn-primary btn-lg pull-right">Tambah Admin</button>


                </form>
            </div>
        </div>
    </section>
</div>


<!-- =============================================== -->
<!-- Footer -->

<?php $this->load->view('back/templates/admin/foot');
?>