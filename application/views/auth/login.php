<?php $this->load->view('back/templates/login/head');
?>

<!-- <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p> -->
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <div id="infoMessage"><?php echo $message; ?></div>

    <?php echo form_open("ngadmin/auth/login"); ?>
    <div class="form-group has-feedback">
      <?php echo form_input($identity); ?>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?php echo form_input($password); ?>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?> Remember me
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
    <?php echo form_close(); ?>

    <!-- /.social-auth-links -->

    <a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<?php $this->load->view('back/templates/login/foot');
?>
