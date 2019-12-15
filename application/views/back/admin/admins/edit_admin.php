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
                <h3 class="box-title">Edit Admin</strong></h3>
            </div>
            <div class="box-body ">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required value="<?= $admins->nama ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required value="<?= $admins->email ?>">
                        <?= form_error('email', '<small class="text-danger" style="padding-left:5px">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Password Baru <sup>(opsional)</sup></label>
                        <input type="password" class="form-control" name="password">
                        <?= form_error('password', '<small class="text-danger" style="padding-left:5px">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru <sup>(opsional)</sup></label>
                        <input type="password" class="form-control" name="passwordc">
                        <?= form_error('passwordc', '<small class="text-danger" style="padding-left:5px">', '</small>') ?>
                    </div>
                   <button type="submit" name="submit" value="edit" class="btn btn-primary btn-lg pull-right">Update</button>


                </form>
            </div>
        </div>
    </section>
</div>


<!-- =============================================== -->
<!-- Footer -->

<?php $this->load->view('back/templates/admin/foot');
?>