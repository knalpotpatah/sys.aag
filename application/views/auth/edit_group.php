<?php $this->load->view('back/templates/ngadmin/head');
?>
<?php $this->load->view('back/templates/ngadmin/nav');
?>

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<?php $this->load->view('back/templates/ngadmin/side');
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1>
                  General Form Elements
                  <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Forms</a></li>
                  <li class="active">General Elements</li>
            </ol>
      </section>
      <!-- Main content -->
      <section class="content">
            <div class="container">

                  <div id="infoMessage"><?php echo $message; ?></div>

                  <?php echo form_open(current_url()); ?>
                  <div class="form-group">



                        <p>
                              <?php echo lang('edit_group_name_label', 'group_name'); ?> <br />
                              <?php echo form_input($group_name); ?>
                        </p>

                        <p>
                              <?php echo lang('edit_group_desc_label', 'description'); ?> <br />
                              <?php echo form_input($group_description); ?>
                        </p>

                        <p><?php echo form_submit('submit', lang('edit_group_submit_btn')); ?></p>

                        <?php echo form_close(); ?>
                  </div>
            </div>
      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('back/templates/ngadmin/foot');
?>