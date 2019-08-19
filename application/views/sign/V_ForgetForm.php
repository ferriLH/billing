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
		<a href="<?php echo base_url()?>"><b>Forgot</b>Password</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Password and confirm password must be match</p>
		<form  method="post" action="<?php echo base_url('forgotMyPasswordForm/auth/').encrypt_url($id) ?>">
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
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password" name="password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<input name="submit" class="btn btn-primary btn-block btn-flat" type="submit" value="submit">
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
</body>
</html>
