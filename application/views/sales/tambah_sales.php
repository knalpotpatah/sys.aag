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
        <div class="box">
            <div class="box-body">
                <?php echo form_open_multipart(''); ?>
                <div class="form-group">
                    <label for="team">Nama<span class="text-danger">*</span></label>
                    <input type="text" name="sales" id="sales" placeholder="name" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="title">Email<span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" placeholder="email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="title">Password<span class="text-danger">*</span></label>
                    <input type="text" name="password" id="password" placeholder="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="title">Phone<span class="text-danger">*</span></label>
                    <input type="text" name="phone" id="phone" placeholder="telephone" class="form-control" required="required">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="img">Gambar</label>
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-6">
                            <label>Gender</label><span class="text-danger">*</span>
                            <select class="form-control" required name="gender" id="gender">
                                <option value="">Choose Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Status</label><span class="text-danger">*</span>
                            <select class="form-control" required name="status" id="status">
                                <option value="">Choose Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Tidak Aktif</option>
                            </select>

                        </div>
                    </div>
                <button type="" name="submit" value="tambah" class="btn btn-primary pull-right">Submit</button>
                <a type="button" href="<?= site_url('sales') ?>" name="submit" value="batal" class="btn btn-warning pull-right" style="margin-right:5px;">Batal</a>
                <?php
                form_close();
                ?>
            </div>
        </div>

    </section>
</div>
<!-- Isi kontent selesai disini -->

<!-- =============================================== -->
<!-- Footer -->
<?php $this->load->view('templates/admin/foot');
?>