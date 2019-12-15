<?php $this->load->view('back/templates/login/head');
?>

<!-- <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p> -->
<div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>Admin</b>Login</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<!-- <p class="login-box-msg">Sign in to start your session</p> -->

		<div id="infoMessage"><?php echo $message; ?></div>

		<?php echo form_open("auth/forgot_password"); ?>
		<div class="form-group has-feedback">
			<label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label> <br />
			<?php echo form_input($identity); ?>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="row">

			<!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
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