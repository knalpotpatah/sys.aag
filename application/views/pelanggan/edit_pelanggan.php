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

                
              
                <div class="form-row">
                    <div class="form-group col-sm-6"> 
                    <label for="id_kerjasama">Jenis Kerjasama</label>
                    <select class="form-control" name="id_kerjasama"> 
                       <?php 
                        	if ($pelanggan->id_kerjasama==0): ?>
								<option value=0 selected>-Pilih-</option>
							<?php endif ?>
                      <?php  $sama= $this->db->get('jenis_kerjasama')->result();
                                    foreach ($sama as $ne) :?>

                                    <?php if ($pelanggan->id_kerjasama==$ne->id_ks): ?>
                                        <option value=<?=$ne->id_ks ?> selected><?=$ne->nama_kerja ?></option>
                                    
                                    <?php else :?>
                                        <option value=<?=$ne->id_ks ?>><?=$ne->nama_kerja ?></option>
                                    <?php endif ?>
                                
                        <?php endforeach ?> 
				    </select>
                    </div>
                    <div class="form-group col-sm-6">      
                    <label for="id_cabang">Cabang</label>
                    <select class="form-control" name="id_cabang"> 
                       <?php 
                        	if ($pelanggan->id_cabang==0): ?>
								<option value=0 selected>-Pilih-</option>
							<?php endif ?>
                      <?php  $ca= $this->db->get('cabang')->result();
                                    foreach ($ca as $ne) :?>

                                    <?php if ($pelanggan->id_cabang==$ne->id_ca): ?>
                                        <option value=<?=$ne->id_ca ?> selected><?=$ne->nama_cabang ?></option>
                                    
                                    <?php else :?>
                                        <option value=<?=$ne->id_ca ?>><?=$ne->nama_cabang ?></option>
                                    <?php endif ?>
                                
                        <?php endforeach ?> 
				    </select>
                </div>
            
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputEmail4">ID Pelanggan</label>
                    <label> &nbsp;</label><input type="text" class="form-control" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan?>">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="inputPassword4">No Kontrak</label>
                    <label> &nbsp;</label><input type="text" class="form-control" name="no_kontrak" value="<?= $pelanggan->no_kontrak?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputEmail4">Name Familiar</label>
                    <input type="text" class="form-control" name="name" value="<?= $pelanggan->name?>">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="inputPassword4">Name PT</label>
                    <input type="text" class="form-control" name="name_pt" value="<?= $pelanggan->name_pt?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputEmail4">Phone</label>
                    <input type="number" class="form-control" name="phone" value="<?= $pelanggan->phone?>">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $pelanggan->email?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label>Nama Pic</label>
                    <input type="text" class="form-control" name="nama_pic" value="<?= $pelanggan->nama_pic?>">
                </div>
                <div class="form-group col-sm-12">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat"><?= $pelanggan->alamat?></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label>Alamat Penagihan</label>
                    <textarea class="form-control" name="alamat_penagihan"><?= $pelanggan->alamat_penagihan?></textarea>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="jenis_kunjungan">jenis kunjungan</label>
                    <select class="form-control" name="jenis_kunjungan">
                        <option value="visit"<?= ($pelanggan->jenis_kunjungan == 'visit' ? ' select' : ''); ?>>visit</option>
                        <option value="standby"<?= ($pelanggan->jenis_kunjungan == 'standby' ? ' select' : ''); ?>>StandBy</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ket_kunjungan">Man Power</label>
                    <input type="text" class="form-control" name="ket_kunjungan" value="<?= $pelanggan->ket_kunjungan?>">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                <label for="id_pekerjaan">Jenis Pekerjaan</label>
                <select class="form-control" name="id_pekerjaan"> 
                       <?php 
                        	if ($pelanggan->id_pekerjaan==0): ?>
								<option value=0 selected>-Pilih-</option>
							<?php endif ?>
                      <?php  $pek= $this->db->get('jenis_pekerjaan')->result();
                                    foreach ($pek as $ne) :?>

                                    <?php if ($pelanggan->id_pekerjaan==$ne->id_peker): ?>
                                        <option value=<?=$ne->id_peker ?> selected><?=$ne->nama_pekerjaan ?></option>
                                    
                                    <?php else :?>
                                        <option value=<?=$ne->id_peker ?>><?=$ne->nama_pekerjaan ?></option>
                                    <?php endif ?>
                                
                        <?php endforeach ?> 
				    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="periode_kontrak">Periode kontrak</label>
                    <input type="number" class="form-control" name="periode_kontrak" value="<?= $pelanggan->periode_kontrak?>">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="awal_kontrak">Awal Kontrak</label>
                    <input type="date" class="form-control" name="awal_kontrak" value="<?= $pelanggan->awal_kontrak?>"> 
                </div>
                <div class="form-group col-sm-6">
                    <label for="akhir_kontrak">Akhir Kontrak</label>
                    <input type="date" class="form-control" name="akhir_kontrak"  value="<?= $pelanggan->akhir_kontrak?>">
                </div>      
                </div>
                <div class="form-group col-sm-12">
                    <label>Nilai Kontrak</label>
                    <input type="text" class="form-control" name="nilai_kontrak" value="<?= $pelanggan->nilai_kontrak?>">
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id_sumber">Sumber</label>
                    <select class="form-control" name="id_sumber"> 
                       <?php 
                        	if ($pelanggan->id_sumber==0): ?>
								<option value=0 selected>-Pilih-</option>
							<?php endif ?>
                      <?php  $sum= $this->db->get('sumber')->result();
                                    foreach ($sum as $ne) :?>

                                    <?php if ($pelanggan->id_sumber==$ne->id_sum): ?>
                                        <option value=<?=$ne->id_sum ?> selected><?=$ne->nama_sumber ?></option>
                                    
                                    <?php else :?>
                                        <option value=<?=$ne->id_sum ?>><?=$ne->nama_sumber ?></option>
                                    <?php endif ?>
                                
                        <?php endforeach ?> 
				    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="npwp">NPWP</label>
                    <input type="text" class="form-control" name="npwp" value="<?= $pelanggan->npwp?>">
                </div>
                </div>
                <div class="form-group col-sm-12">
                    <label>Nama NPWP</label>
                    <input type="text" class="form-control" name="nama_npwp" value="<?= $pelanggan->nama_npwp?>">
                </div>
                <div class="form-group col-sm-12">
                    <label>Alamat NPWP</label>
                    <textarea class="form-control" name="alamat_npwp"><?= $pelanggan->alamat_npwp?></textarea>
                </div>
                <button type="" name="submit" value="update" class="btn btn-primary pull-right">Update</button>
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
