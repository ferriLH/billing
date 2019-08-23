
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
	  <section class="content container-fluid" style="text-align: center">
		  <form action="<?php echo base_url('summary/table')?>" method="get">
			  <div class="box-body" >
				  <div class="row">
					  <div class="col-md-4 col-md-offset-4">
						  <div class="form-group">
							  <label>Month</label>
							  <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
								  <?php
								  $sasih=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
								  $jml_bln=count($sasih);
								  for($b=1; $b<$jml_bln; $b++){
								  	?>
									  <option value="<?php echo $b?>" <?php if ($bulan==$b) {echo "selected";}?>><?php echo $sasih[$b];?></option>
									  <?php
								  }
								  ?>
							  </select>
							  <label>Years</label>
							  <select class="form-control select2" style="width: 100%;" name="tahun" id="tahun">
								  <?php
								  $thn_skr = date('Y');
								  for ($x = $thn_skr; $x >= 2006; $x--) {
									  ?>
									  <option <?php if ($tahun==$x){echo "selected";}?> value="<?php echo $x ?>"><?php echo $x ?></option>
									  <?php
								  }
								  ?>
							  </select>
						  </div>
						  <button type="submit" class="btn btn-block btn-primary btn-lg">View</button>
					  </div>
				  </div>
			  </div>
		  </form>
	  </section>
	  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
