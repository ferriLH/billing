
<?php
$this->load->view('parts/V_Header');
$this->load->view('parts/V_Navigation');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Page <?php echo $title;?>
			<small>Optional description</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a></li>
			<li class="active"><?php echo $title?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<button class="btn btn-toolbar">ID : <?php echo $idPencipta[0]['id']+1;?></button>
				<?php if($this->session->flashdata('failed')){ ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Information</strong><br>
						<?php echo $this->session->flashdata('failed'); ?>
					</div>
				<?php }?>			</div>
			<!-- /.box-header -->
			<form role="form" action="<?php echo base_url('pencipta/add/auth')?>" method="post">
				<div class="box-body">
					<input type="hidden" value="<?php echo $idPencipta[0]['id']+1;?>" name="idPencipta">
					<div class="form-group">
						<label for="namaPencipta">Nama Pencipta</label>
						<input type="text" class="form-control" name="namaPencipta" id="namaPencipta" placeholder="Nama Pencipta" required>
					</div>
					<div class="form-group">
						<label for="noTelp">No Telpon</label>
						<input type="number" class="form-control" name="noTelp" id="noTelp" placeholder="No Telpon" value="">
					</div>
					<div class="form-group">
						<label for="noFax">No Fax</label>
						<input type="number" class="form-control" name="noFax" id="noFax" placeholder="No Fax" value="">
					</div>
					<div class="form-group">
						<label for="noAcc">No Acc</label>
						<input type="number" class="form-control" name="noAcc" id="noAcc" placeholder="No Acc" value="">
					</div>
					<div class="form-group">
						<label for="bank">Bank</label>
						<input type="text" class="form-control" name="bank" id="bank" placeholder="Bank" value="">
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="submit" name="submit" id="submit" class="btn btn-primary">
				</div>
			</form>
			<!-- /.box-body -->
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
