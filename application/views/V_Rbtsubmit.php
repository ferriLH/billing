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
				  <div class="row" style="padding-left: 400px">
					  <div class="col-md-6">
						  <div class="form-group">
							  <label>Month</label>
							  <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
								  <option value='1' <?php if ($bulan==1) {echo "selected";}?>>Januari</option>
								  <option value='2' <?php if ($bulan==2) {echo "selected";}?>>Febuari</option>
								  <option value='3' <?php if ($bulan==3) {echo "selected";}?>>Maret</option>
								  <option value='4' <?php if ($bulan==4) {echo "selected";}?>>April</option>
								  <option value='5' <?php if ($bulan==5) {echo "selected";}?>>Mei</option>
								  <option value='6' <?php if ($bulan==6) {echo "selected";}?>>Juni</option>
								  <option value='7' <?php if ($bulan==7) {echo "selected";}?>>Juli</option>
								  <option value='8' <?php if ($bulan==8) {echo "selected";}?>>Agustus</option>
								  <option value='9' <?php if ($bulan==9) {echo "selected";}?>>September</option>
								  <option value='10' <?php if ($bulan==10) {echo "selected";}?>>Oktober</option>
								  <option value='11' <?php if ($bulan==11) {echo "selected";}?>>November</option>
								  <option value='12' <?php if ($bulan==12) {echo "selected";}?>>Desember</option>
							  </select>
							  <label>Years</label>
							  <select class="form-control select2" style="width: 100%;" name="tahun" id="tahun">
								  <option <?php if ($tahun==1) {echo "selected";}?>>2006</option>
								  <?php
								  for ($i=7; $i <= 50; $i++) {
									  if ($i<10) {
										  echo "<option ";if ($tahun=="200".$i){echo "selected";} echo ">200".$i."</option>";
									  }else {
										  echo "<option ";if ($tahun=="20".$i){echo "selected";} echo ">20".$i."</option>";									  }
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
						  <td> Action</td>
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



							  <td>
								  <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-edit"></i></button> |
								  <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i></button>
							  </td>

					  <?php } }  ?>
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
