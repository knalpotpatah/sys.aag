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
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Sales</h3>
                        <?= $this->session->flashdata('message');
                        ?>
                         <a href="<?= base_url('sales/tambah') ?>" class="btn btn-primary pull-right">Tambah Sales</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Cabang</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sales as $adm) : ?>
                                <tr>
                                    <td><a href="<?= base_url('sales/detail/' . $adm->id) ?>" class="" data-toggle="tooltip" title="detail sales" ><?= $adm->name_user ?></a></td>
                                    <td><?= $adm->email ?></td>
                                   <td><?= $adm->nama_cabang ?></td>
                                   <td>
                                        <?php if ($adm->status == 'aktif') : ?>
                                        <a href="<?= base_url('sales/nonaktif/' . $adm->id) ?>" onclick="return confirm ('anda yakin ingin menonaktifkan akun ini ?')"> <?= $adm->status ?></a>
                                        <?php else : ?>
                                        <a href="<?= base_url('sales/aktif/' . $adm->id) ?>" onclick="return confirm ('anda yakin ingin mengaktifkan akun ini ?')"> <?= $adm->status ?></a>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                    <a href="<?= base_url('sales/hapus/' . $adm->id) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="data pelanggan sales" > DATA PELANGGAN</a>
                                        <a href="<?= base_url('sales/hapus/' . $adm->id) ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Sales" onclick="return confirm ('anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i></a>
                                        <a href="<?= base_url('sales/edit/' . $adm->id) ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit Data Sales"> <i class="fa fa-pen"></i></a>
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
<!-- =============================================== -->
<!-- Footer -->

<?php $this->load->view('templates/admin/foot');
?>