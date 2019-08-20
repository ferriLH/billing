
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
		  <?php if($this->session->flashdata('failed')){ ?>
			  <div class="alert alert-danger">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Information</strong><br>
				  <?php echo $this->session->flashdata('failed'); ?>
			  </div>
		  <?php }?>
		  <?php if($this->session->flashdata('sukses')){ ?>
			  <div class="alert alert-success">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Information</strong><br>
				  <?php echo $this->session->flashdata('sukses'); ?>
			  </div>
		  <?php }?>
	  </div>
      <!-- /.box-header -->
      <form role="form" action="<?php echo base_url('partner/edit/auth/').$edit[0]['id']?>" method="post">
		  <div class="box-body">
			  <div class="form-group">
				  <label for="namaPencipta">ID</label>
				  <input type="number" class="form-control" name="id" id="id" placeholder="No" value="<?php echo $edit[0]['id']?>" disabled>
			  </div>
			  <div class="form-group">
				  <label for="noTelp">Nama</label>
				  <input type="text" class="form-control" name="namaPartner" id="namaPartner" placeholder="Nama" value="<?php echo $edit[0]['namaPartner']?>">
			  </div>
			  <div class="form-group">
				  <label for="noFax">No Telp</label>
				  <input type="number" class="form-control" name="noTelp" id="noTelp" placeholder="No Telp" value="<?php echo $edit[0]['noTelp']?>">
			  </div>
			  <div class="form-group">
				  <label for="noAcc">No Fax</label>
				  <input type="number" class="form-control" name="noFax" id="noFax" placeholder="No Fax" value="<?php echo $edit[0]['noFax']?>">
			  </div>
			  <div class="form-group">
				  <label for="bank">No Acc</label>
				  <input type="number" class="form-control" name="noAcc" id="noAcc" placeholder="No Acc" value="<?php echo $edit[0]['noAcc']?>">
			  </div>
			  <div class="form-group">
				  <label for="bank">Bank</label>
				  <input type="text" class="form-control" name="bank" id="bank" placeholder="Bank" value="<?php echo $edit[0]['bank']?>">
			  </div>
		  </div>
		  <div class="box-body">
			  <div class="form-group">
				  <label for="email">Email</label>
				  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $editUser[0]['email']?>" required>
			  </div>
			  <div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="">
			  </div>
		  </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="submit" class="btn btn-primary">
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
