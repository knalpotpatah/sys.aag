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
                                    <th>Nilai Kontrak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($terminate as $h) : ?>
                                    <tr>
                                        <td><?= $h->nama_cabang ?></td>
                                        <td><?= $h->id_pelanggan ?></td>
                                        <td><a href="<?= base_url('pelanggan/detail_terminate/').$h->id_pe?>"><?= $h->name_pt ?></a></td>
                                        <td><?= $h->no_kontrak ?></td>
                                        <td><?= $h->nilai_kontrak ?></td>
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