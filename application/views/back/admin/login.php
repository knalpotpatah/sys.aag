<div class="login-box geser" id="ges">
    <div class="login-logo">
        <a href=""><img src="<?= base_url('assets/images/logo.png') ?>" width="100">Login</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?= $this->session->flashdata('message');
        ?>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
            </div>
            <button type="submit" name="submit" value="masuk" class="btn btn-primary btn-block btn-lg btn-flat">Sign In</button>
        </form>


        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>