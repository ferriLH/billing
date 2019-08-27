
  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	  <section class="content-header">
		  <h1>
			  <?php echo $title; ?>
			  <small>Optional description</small>
		  </h1>
		  <ol class="breadcrumb">
			  <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a></li>
			  <li class="active"><?php echo $title?></li>
		  </ol>
		  <?php if($this->session->flashdata('failed')){ ?>
			  <div class="alert alert-danger">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Information</strong><br>
				  <?php echo $this->session->flashdata('failed'); ?>
			  </div>
		  <?php }?>
	  </section>
	  <!-- Main content -->
	  <section class="content container-fluid text-center">
		  <button class="btn btn-primary" onclick="partnerFunction()"><h4>Partner</h4></button>
		  <button class="btn btn-primary" onclick="penciptaFunction()"><h4>Pencipta</h4></button>
		  <br><br><br>
		  <div id="paymentPartner" style="display: none">
			  <form action="<?php echo base_url('payment/tablePartner')?>" method="post">
				  <div class="box-body" >
					  <div class="row">
						  <div class="col-md-4 col-md-offset-4">
							  <div class="form-group">
								  <label>Partner </label>
								  <select class="form-control select2" style="width: 100%;" name="partner">
									  <option value="0">- choose -</option>
									  <?php
									  foreach ($getPartner as $p) {
										  ?>
										  <option value="<?php echo $p->id?>"><?php echo $p->namaPartner?></option>
										  <?php
									  }
									  ?>
								  </select>
								  <label>From Month </label>
								  <select class="form-control select2" style="width: 100%;" name="bulanAwal" id="bulanAwal">
									  <?php
									  $sasih=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									  $jml_bln=count($sasih);
									  for($b=1; $b<$jml_bln; $b++){
										  ?>
										  <option value="<?php echo $b?>"><?php echo $sasih[$b];?></option>
										  <?php
									  }
									  ?>
								  </select>
								  <label>Until Month </label>
								  <select class="form-control select2" style="width: 100%;" name="bulanAkhir" id="bulanAkhir">
									  <?php
									  $sasih=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									  $jml_bln=count($sasih);
									  for($b=1; $b<$jml_bln; $b++){
										  ?>
										  <option value="<?php echo $b?>"><?php echo $sasih[$b];?></option>
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
										  <option value="<?php echo $x ?>"><?php echo $x ?></option>
										  <?php
									  }
									  ?>
								  </select>
							  </div>
							  <input type="submit" name="submit" value="View" class="btn btn-block btn-primary btn-lg">
						  </div>
					  </div>
				  </div>
			  </form>
		  </div>
		  <div id="paymentPencipta" style="display: none">
			  <form action="<?php echo base_url('payment/tablePencipta')?>" method="post">
				  <div class="box-body" >
					  <div class="row">
						  <div class="col-md-4 col-md-offset-4">
							  <div class="form-group">
								  <label>Pencipta </label>
								  <select class="form-control select2" style="width: 100%;" name="pencipta">
									  <option value="0">- choose -</option>
									  <?php
									  foreach ($getPencipta as $p) {
										  ?>
										  <option value="<?php echo $p->id?>"><?php echo $p->namaPencipta?></option>
										  <?php
									  }
									  ?>
								  </select>
								  <label>From Month </label>
								  <select class="form-control select2" style="width: 100%;" name="bulanAwal" id="bulanAwal">
									  <?php
									  $sasih=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									  $jml_bln=count($sasih);
									  for($b=1; $b<$jml_bln; $b++){
										  ?>
										  <option value="<?php echo $b?>"><?php echo $sasih[$b];?></option>
										  <?php
									  }
									  ?>
								  </select>
								  <label>Until Month </label>
								  <select class="form-control select2" style="width: 100%;" name="bulanAkhir" id="bulanAkhir">
									  <?php
									  $sasih=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									  $jml_bln=count($sasih);
									  for($b=1; $b<$jml_bln; $b++){
										  ?>
										  <option value="<?php echo $b?>"><?php echo $sasih[$b];?></option>
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
										  <option value="<?php echo $x ?>"><?php echo $x ?></option>
										  <?php
									  }
									  ?>
								  </select>
							  </div>
							  <input type="submit" name="submit" value="View" class="btn btn-block btn-primary btn-lg">
						  </div>
					  </div>
				  </div>
			  </form>
		  </div>
		  <script>
              function partnerFunction() {
                  var x = document.getElementById("paymentPartner");
                  var y = document.getElementById("paymentPencipta");
                  if (x.style.display === "none") {
                      x.style.display = "block";
                      y.style.display = "none";
                  } else {
                      x.style.display = "none";
                  }
              }
              function penciptaFunction() {
                  var x = document.getElementById("paymentPencipta");
                  var y = document.getElementById("paymentPartner");
                  if (x.style.display === "none") {
                      x.style.display = "block";
                      y.style.display = "none";
                  } else {
                      x.style.display = "none";
                  }
              }
		  </script>
	  </section>
	  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
