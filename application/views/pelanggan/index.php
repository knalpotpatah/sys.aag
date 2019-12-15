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
<!-- konten -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Pelanggan</h3>
                        <?= $this->session->flashdata('message');
                        ?>
                        <a href="<?= base_url('pelanggan/tambah') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Pelanggan</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Tabel Halaman -->
                        <table id="example1" class="display table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cabang</th>
                                    <th>ID Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No Kontrak</th>
                                    <th>Periode</th>
                                    <th>Nilai Kontrak</th>
                                    <th>Total Nilai Kontrak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pelanggan as $h) : 
                                    $hasil = ($h->nilai_kontrak * $h->periode_kontrak); ?>
                                    <tr>
                                        <td><?= $h->nama_cabang ?></td>
                                        <td><?= $h->id_pelanggan ?></td>
                                        <td><a href="<?= base_url('pelanggan/detail/').$h->id_pe?>"><?= $h->name_pt ?></a></td>
                                        <td><?= $h->no_kontrak ?></td>
                                        <td><?= $h->periode_kontrak ?>&nbsp;Bulan</td>
                                        <?php if($h->increase == '0'):
                                            $hasil_inc = ($hasil - $h->decrease);
                                            $final = ($hasil_inc / $h->periode_kontrak)
                                            ?>
                                        <td>Rp.<?= number_format($final) ?>,-</td>
                                        <td>Rp.<?= number_format($hasil_inc) ?>,-</td>
                                        <?php elseif($h->decrease == '0'):
                                             $hasil_dec = ($hasil + $h->increase);
                                             $final2 = ($hasil_dec / $h->periode_kontrak)
                                        ?>
                                        <td>Rp.<?= number_format($final2) ?>,-</td>
                                        <td>Rp.<?= number_format($hasil_dec) ?>,-</td>
                                        <?php else : ?>
                                        <td>Rp.<?= number_format($h->nilai_kontrak) ?>,-</td>
                                        <td>Rp.<?= number_format($hasil) ?>,-</td>
                                        <?php endif ?>
                                        <td>
                                            <a href="<?= base_url('pelanggan/edit/') . $h->id_pe ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pen"></i></a>
                                            <a href="<?= base_url('pelanggan/hapus/') . $h->id_pe ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                             </tbody>   
                        </table>
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