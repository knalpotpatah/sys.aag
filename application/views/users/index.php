<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
$this->load->view('template/sidebar');
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <!-- <div class="card direct-chat direct-chat-primary">

                    <div class="card-body">

                    </div>
                </div> -->
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewModal">Add New Package</button><br />
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($users as $row) :
                            $count++;
                            $id = $row->id_user;
                        ?>
                            <tr>
                                <td><?= $count; ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->email; ?></td>
                                <td><?= $row->last_login; ?></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm update-record" data-id_user="<?= $row->id_user; ?>" data-name="<?= $row->name; ?>" data-email="<?= $row->email ?>" data-password="<?= $row->password ?>">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="validate(this)" value="<?= $id ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
        </div>

        <!-- Modal Add New Package-->


        <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="tambahUser" action="<?= base_url('create-users'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="status_user"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Masukan Password">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit" class="btn btn-success btn-sm" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modal Update Package-->
        <form id="UpdateSubmit" action="<?= base_url('update-users'); ?>" method="post">
            <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_edit" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email_edit" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" name="password_edit" class="form-control" placeholder="Masukan Password Baru">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="text" name="id" required>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit" class="btn btn-success btn-sm" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- Modal Delete Package-->
        <form action="<?php echo site_url('delete-users'); ?>" method="post">
            <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h4>Are you sure to delete this package?</h4>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="delete_id" required>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success btn-sm">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php $this->load->view('template/footer'); ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });

                $('.bootstrap-select').selectpicker();

                //GET UPDATE
                $('.update-record').on('click', function() {
                    var id_user = $(this).data('id_user');
                    var name = $(this).data('name');
                    var email = $(this).data('email');
                    var password = $(this).data('password');
                    $(".strings").val('');
                    $('#UpdateModal').modal('show');
                    $('[name="id"]').val(id_user);
                    $('[name="name_edit"]').val(name);
                    $('[name="email_edit"]').val(email);
                    //AJAX REQUEST TO GET SELECTED PRODUCT

                    return false;
                });

                var url = $("#UpdateSubmit").attr("action");
                $("#UpdateSubmit").submit(function() {
                    
                    event.preventDefault();
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: $("#UpdateSubmit").serialize(),
                        dataType: 'json',
                        success: function(data) {
                            console.log("cpppp");
                            Swal.fire({
                                title: "Berhasil",
                                text: data.message,
                                // icon: data.statusreg == true ? 'success' : 'error',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "<?= base_url('users/index'); ?>"

                                }
                            })
                            setTimeout(function() {
                                window.location = "<?= base_url('users/index'); ?>"

                            }, 2000);
                        },
                        error: function(data){
                            console.log("error cuk");
                        }

                    });
                });

                $("#tambahUser").submit(function(event) {
                    event.preventDefault();
                    var url = $("#tambahUser").attr("action");
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: $("#tambahUser").serialize(),
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            $("#status_user").html(data.status);
                            $("#name").val("");
                            $("#email").val("");
                            $("#password").val("");
                            Swal.fire({
                                title:"sukses",
                                text: data.message,
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "<?= base_url('users/index'); ?>"

                                }
                            })
                            setTimeout(function() {
                                window.location = "<?= base_url('users/index'); ?>"

                            }, 2000);
                        }
                    });
                });


                //GET CONFIRM DELETE
                $('.delete-record').on('click', function() {
                    var id_user = $(this).data('id_user');
                    $('#DeleteModal').modal('show');
                    $('[name="delete_id"]').val(id_user);
                });

            });

            function validate(a) {
                var id = a.value;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        $(location).attr('href', '<?= base_url('users/delete/') ?>/' + id);


                    }
                })
            };
        </script>

        <?php $this->load->view('template/js'); ?>
        <!-- /.content -->