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
                    <?php $sama = $this->db->get('jenis_kerjasama')->result(); ?>
                    <?php foreach($sama as $l): ?>
                    <option value="<?= $l->id_ks; ?>"><?= $l->nama_kerja ?>   </option>
                    <?php endforeach ?>
                    </select>
                    </div>
                    <div class="form-group col-sm-6">      
                    <label for="id_cabang">Cabang</label>
                    <select class="form-control" name="id_cabang">
                    <?php $caba = $this->db->get('cabang')->result(); ?>
                    <?php foreach($caba as $l): ?>
                    <option value="<?= $l->id_ca; ?>"><?= $l->nama_cabang ?>   </option>
                    <?php endforeach ?>
                    </select>
                </div><br>
                <div class="form-inline">
                   
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputEmail4">ID Pelanggan</label>
                    <label> &nbsp;</label><input type="text" class="form-control" name="id_pelanggan" placeholder="ID Pelanggan">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="inputPassword4">No Kontrak</label>
                    <label> &nbsp;</label><input type="text" class="form-control" name="no_kontrak" placeholder="Kontrak Number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputEmail4">Name Familiar</label>
                    <input type="text" class="form-control" name="name" placeholder="Name Familiar">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="inputPassword4">Name PT</label>
                    <input type="text" class="form-control" name="name_pt" placeholder="Company Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputEmail4">Phone</label>
                    <input type="number" class="form-control" name="phone" placeholder="Telephone">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label>Nama Pic</label>
                    <input type="text" class="form-control" name="nama_pic" placeholder="PIC Name">
                </div>
                <div class="form-group col-sm-12">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat"></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label>Alamat Penagihan</label>
                    <textarea class="form-control" name="alamat_penagihan"></textarea>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="jenis_kunjungan">jenis kunjungan</label>
                    <select class="form-control" name="jenis_kunjungan">
                        <option value="visit">visit</option>
                        <option value="standby">StandBy</option>
                    </select>
                </div>
                <label class="form-group col-sm-6">
                    <label for="ket_kunjungan">Man power</label>
                    <input type="text" class="form-control" name="ket_kunjungan" placeholder="jumlah man power">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                <label for="id_pekerjaan">Jenis Pekerjaan</label>
                    <select class="form-control" name="id_pekerjaan">
                    <?php $peke = $this->db->get('jenis_pekerjaan')->result(); ?>
                    <?php foreach($peke as $l): ?>
                    <option value="<?= $l->id_peker; ?>"><?= $l->nama_pekerjaan ?>   </option>
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="periode_kontrak">Periode kontrak</label>
                    <input type="number" class="form-control" name="periode_kontrak" placeholder="Periode Kontrak">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="awal_kontrak">Awal Kontrak</label>
                    <input type="date" class="form-control" name="awal_kontrak" > 
                </div>
                <div class="form-group col-sm-6">
                    <label for="akhir_kontrak">Akhir Kontrak</label>
                    <input type="date" class="form-control" name="akhir_kontrak" > 
                </div>      
                </div>
                <div class="form-group col-sm-12">
                    <label>Nilai Kontrak</label>
                    <input type="text" class="form-control" name="nilai_kontrak" placeholder="Nilai Kontrak">
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id_sumber">Sumber</label>
                    <select class="form-control" name="id_sumber">
                    <?php $sum = $this->db->get('sumber')->result(); ?>
                    <?php foreach($sum as $l): ?>
                    <option value="<?= $l->id_sum; ?>"><?= $l->nama_sumber ?>   </option>
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ket_kunjungan">NPWP</label>
                    <input type="text" class="form-control" name="npwp" placeholder="No NPWP">
                </div>
                </div>
                <div class="form-group col-sm-12">
                    <label>Nama NPWP</label>
                    <input type="text" class="form-control" name="nama_npwp" placeholder="Nama NPWP">
                </div>
                <div class="form-group col-sm-12">
                    <label>Alamat NPWP</label>
                    <textarea class="form-control" name="alamat_npwp"></textarea>
                </div>
                <button type="" name="submit" value="update" class="btn btn-primary pull-right">SUbmit</button>
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