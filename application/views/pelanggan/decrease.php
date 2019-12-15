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

                <h2>Total Nilai Kontrak</h2>
                <?php 
                    $total = ($decrease->periode_kontrak * $decrease->nilai_kontrak);
                ?>
                <h3>Rp.<?=number_format($total) ?>,-</h3>
                <div class="form-group col-sm-12">
                    <label>Nilai Decrease</label>
                    <input type="text" class="form-control" name="decrease" placeholder="Masukan nilai Decrease">
                </div>
                <button type="number" name="submit" value="update" class="btn btn-primary pull-right">Update</button>
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
