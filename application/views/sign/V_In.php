<?php
$this->load->view('parts/V_Header');
?>
<style>
	.login-page{
		background: #d2d6de;
		background-image: url("<?php echo base_url('assets/')?>/images/partner.jpg");
		background-position: center center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	}
	.login-box-body{
		background: #fff;
		opacity: 0.8;
		padding: 20px;
		color: #000;
		border-top: 0;
		color: #000;
	}
</style>
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url()?>"><b>Login</b>Partner</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form  method="post" action="<?php echo base_url('login/auth') ?>">
		<?php if(validation_errors()||$this->session->flashdata('failed')){ ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning</strong>
				<?php echo validation_errors(); ?>
				<?php echo $this->session->flashdata('failed'); ?>
			</div>
			<script>
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
			</script>
		<?php }?>
		<?php if($this->session->flashdata('sukses')){ ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Information</strong><br>
				<?php echo $this->session->flashdata('sukses'); ?>
			</div>
		<?php }?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
<!--        <div class="col-xs-8">-->
<!--          <div class="checkbox icheck">-->
<!--            <label>-->
<!--              <input type="checkbox"> Remember Me-->
<!--            </label>-->
<!--          </div>-->
<!--        </div>-->
        <!-- /.col -->

		  <div class="col-xs-8">
			  <a href="<?php echo base_url('forgotMyPassword')?>">I forgot my password</a><br>
		  </div>
		  <div class="col-xs-4">
			  <input class="btn btn-primary btn-block btn-flat" type="submit" value="Log in">
		  </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->


   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
