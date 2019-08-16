<?php
$this->load->view('parts/V_Header');
?>
<style>
	.lockscreen{
		background: #d2d6de;
		background-image: url("<?php echo base_url('assets/')?>/images/partner.jpg");
		background-position: center center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	}
</style>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
	<div class="lockscreen-logo">
		<a href="<?php echo base_url('')?>"><b>Billing</b>RBT</a>
	</div>
	<!-- User name -->
	<div class="lockscreen-name">Insert Your Email</div>

	<!-- START LOCK SCREEN ITEM -->
	<div class="lockscreen-item">
		<!-- lockscreen image -->
		<div class="lockscreen-image">
			<img src="<?php echo base_url('assets/images/favicon.png')?>" alt="User Image">
		</div>
		<!-- /.lockscreen-image -->

		<!-- lockscreen credentials (contains the form) -->
		<form class="lockscreen-credentials" method="post" action="#">
			<div class="input-group">
				<input type="email" name="email" class="form-control" placeholder="Email">

				<div class="input-group-btn">
					<button type="submit" name="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
				</div>
			</div>
		</form>
		<!-- /.lockscreen credentials -->

	</div>
	<!-- /.lockscreen-item -->
	<div class="help-block text-center" style="color: #fff">
		enter your email to retrieve forgot password link
	</div>
	<div class="text-center">
		<a href="<?php echo base_url()?>">Or sign in as a different user</a>
	</div>
<!--	<div class="lockscreen-footer text-center">-->
<!--		Copyright &copy; 2014-2016 <b><a href="https://adminlte.io" class="text-black">Almsaeed Studio</a></b><br>-->
<!--		All rights reserved-->
<!--	</div>-->
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

