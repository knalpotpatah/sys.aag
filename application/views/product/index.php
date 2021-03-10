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
                            <th>Package Name</th>
                            <th>Created At</th>
                            <th>Item Product</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($package->result() as $row) :
                            $count++;
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row->package_name; ?></td>
                                <td><?php echo $row->package_created_at; ?></td>
                                <td><?php echo $row->item_product . ' Items'; ?></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm update-record" data-package_id="<?php echo $row->package_id; ?>" data-package_name="<?php echo $row->package_name; ?>">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete-record" data-package_id="<?php echo $row->package_id; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
        </div>

        <!-- Modal Add New Package-->
        <form action="<?php echo site_url('create-product'); ?>" method="post">
            <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Package</label>
                                <div class="col-sm-10">
                                    <input type="text" name="package" class="form-control" placeholder="Package Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product</label>
                                <div class="col-sm-10">
                                    <select class="bootstrap-select" name="product[]" data-width="100%" data-live-search="true" multiple required>
                                        <?php foreach ($product->result() as $row) : ?>
                                            <option value="<?php echo $row->product_id; ?>"><?php echo $row->product_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Update Package-->
        <form action="<?php echo site_url('update-product'); ?>" method="post">
            <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Package</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Package</label>
                                <div class="col-sm-10">
                                    <input type="text" name="package_edit" class="form-control" placeholder="Package Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product</label>
                                <div class="col-sm-10">
                                    <select class="bootstrap-select strings" name="product_edit[]" data-width="100%" data-live-search="true" multiple required>
                                        <?php foreach ($product->result() as $row) : ?>
                                            <option value="<?php echo $row->product_id; ?>"><?php echo $row->product_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="edit_id" required>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- Modal Delete Package-->
        <form action="<?php echo site_url('delete-product'); ?>" method="post">
            <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Package</h5>
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

        <?php
        $this->load->view('template/footer');
        $this->load->view('template/js'); ?>
        <!-- /.content -->