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
                    <label for="client">Nama</label>
                    <input type="text" name="sales" id="sales" class="form-control" value="<?= $sales->name_user ?>" required="required">
                </div>
                <div class="form-group">
                    <label for="client">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $sales->email ?>" required="required">
                </div>
                <div class="form-group">
                    <label for="client">Password Baru <sup>(opsional)</sup></label>
                    <input type="text" name="password" id="password" class="form-control" value="<?= $sales->password ?>" >
                </div>
                <div class="form-group">
                    <label for="client">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= $sales->phone ?>" required="required">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="img">Gambar</label>
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="img">Before</label>
                            <img src="<?= base_url('assets/images/user/') . $sales->photo . $sales->p_type ?>" width="250" alt="">
                        </div>
                    </div>               
                </div>
                <div class="form-group">
                    <label for="id_news">Cabang</label>
                    <select class="form-control" name="id_cabang" id="id_cabang"> 
                        
                        <?php 
                        	if ($sales->id_cabang==0): ?>
								<option value=0 selected>-Pilih-</option>
							<?php endif ?>
                      <?php  $cabang= $this->db->get('cabang')->result();
                                    foreach ($cabang as $ne) :?>

                                    <?php if ($sales->id_cabang==$ne->id_ca): ?>
                                        <option value=<?=$ne->id_ca ?> selected><?=$ne->nama_cabang ?></option>
                                    
                                    <?php else :?>
                                        <option value=<?=$ne->id_ca ?>><?=$ne->nama_cabang ?></option>
                                    <?php endif ?>
                                
                        <?php endforeach ?> 
				    </select>
                </div>
                <button type="" name="submit" value="update" class="btn btn-primary pull-right">Update</button>
                <a type="button" href="<?= site_url('admin/team') ?>" name="submit" value="batal" class="btn btn-warning pull-right" style="margin-right:5px;">Batal</a>
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