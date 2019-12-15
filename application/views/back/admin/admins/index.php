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
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Admin</h3>
                        <?= $this->session->flashdata('message');
                        ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <!-- <th>Password</th> -->
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admins as $adm) : ?>
                                <tr>
                                    <td><?= $adm->name ?></td>
                                    <td><?= $adm->email ?></td>
                                   <!-- <td><?= $adm->password ?></td> -->
                                   <td>
                                        <?php if ($adm->status == 'aktif') : ?>
                                        <a href="<?= base_url('admin/admins/nonaktif/' . $adm->id) ?>" onclick="return confirm ('anda yakin ingin menonaktifkan akun ini ?')"> <?= $adm->status ?></a>
                                        <?php else : ?>
                                        <a href="<?= base_url('admin/admins/aktif/' . $adm->id) ?>" onclick="return confirm ('anda yakin ingin mengaktifkan akun ini ?')"> <?= $adm->status ?></a>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/admins/hapus/' . $adm->id) ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Admin" onclick="return confirm ('anda yakin ingin menghapus data ini ?')"> Hapus</a>
                                        <a href="<?= base_url('admin/admins/edit/' . $adm->id) ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit Data Admin"> Edit</a>
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

<?php $this->load->view('back/templates/admin/foot');
?>