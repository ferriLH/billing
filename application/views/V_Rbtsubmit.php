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
		  <form action="<?php echo base_url('rbtsubmit/commit')?>" method="post">
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
	  <section class="content container-fluid">
		  <div class="box box-primary">
			  <div class="box-header">
				  <?php if($this->session->flashdata('sukses')){ ?>
					  <div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Information</strong><br>
						  <?php echo $this->session->flashdata('sukses'); ?>
					  </div>
				  <?php }?>
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
				  <table id="rbtsubmit" class="table table-responsive table-bordered table-striped">
					  <thead>
					  <tr>
						  <td >OPERATOR</td>
						  <td >Total Revenue</td>
						  <td >Total dl (n)</td>
						  <td >Total rn (n)</td>
						  <td >Total cp (n)</td>
						  <td >Total sp (n)</td>
						  <td >Total mc (n)</td>
						  <td >Total p6 (n)</td>
						  <td >Total p7 (n)</td>
						  <td >Total Summary (Rp)</td>
					  </tr>
					  </thead>
					  <tbody>
						<?php foreach ($operator as $a ) {
						$rev = 0;
						$totalall = 0;
						$total1 = 0;
						$total2 = 0;
						$total3 = 0;
						$total4 = 0;
						$total5 = 0;
						$total6 = 0;
						$total7 = 0;
						?>
						<?php

						foreach ($this->M_Rbtsubmit->get_traffic($month, $a->id) as $traffic) {
							$total1 = $total1 + $traffic->n1;
							$total2 = $total2 + $traffic->n2;
							$total3 = $total3 + $traffic->n3;
							$total4 = $total4 + $traffic->n4;
							$total5 = $total5 + $traffic->n5;
							$total6 = $total6 + $traffic->n6;
							$total7 = $total7 + $traffic->n7;
						}
						foreach ($this->M_Rbtsubmit->get_price($month, $a->id) as $price) {
							if ($a->id == 3) {
								$totalrp1 = $total1 * $price->p1;
								$totalrp2 = $total2;
								$totalrp3 = $total3 * $price->p3;
								$totalrp4 = $total4 * $price->p4;
								$totalrp5 = $total5 * $price->p5;
								$totalrp6 = $total6 * $price->p6;
								$totalrp7 = $total7 * $price->p7;
							} else {
								$totalrp1 = $total1 * $price->p1;
								$totalrp2 = $total2 * $price->p2;
								$totalrp3 = $total3 * $price->p3;
								$totalrp4 = $total4 * $price->p4;
								$totalrp5 = $total5 * $price->p5;
								$totalrp6 = $total6 * $price->p6;
								$totalrp7 = $total7 * $price->p7;
							}
							$totalall = $totalrp1 + $totalrp2 + $totalrp3 + $totalrp4 + $totalrp5 + $totalrp6 + $totalrp7;
						}


								foreach ($this->M_Rbtsubmit->get_rev($month, $a->id) as $reven) {
									if (isset($reven->sum)){
									echo "
									<tr>
									<td>$a->operator</td>
									<td>$reven->sum</td>
									<td>$total1</td>
									<td>$total2</td>
									<td>$total3</td>
									<td>$total4</td>
									<td>$total5</td>
									<td>$total6</td>
									<td>$total7</td>
									<td>$totalall</td>
									";
								 }else{
										echo "<tr>
									<td>$a->operator</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									";
								}
							?>
					  <?php
								}
						}
						?>
					  </tbody>
				  </table>
			  </div>
			  <!-- /.box-body -->
		  </div>
	  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
