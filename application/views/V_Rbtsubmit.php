
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
								  <option selected="selected" value='1'>Januari</option>
								  <option value='2'>Febuari</option>
								  <option value='3'>Maret</option>
								  <option value='4'>April</option>
								  <option value='5'>Mei</option>
								  <option value='6'>Juni</option>
								  <option value='7'>Juli</option>
								  <option value='8'>Agustus</option>
								  <option value='9'>September</option>
								  <option value='10'>Oktober</option>
								  <option value='11'>November</option>
								  <option value='12'>Desember</option>
							  </select>
							  <label>Years</label>
							  <select class="form-control select2" style="width: 100%;" name="tahun" id="tahun">
								  <option selected="selected">2000</option>
								  <?php
								  for ($i=1; $i <= 50; $i++) {
									  if ($i<10) {
										  echo "<option>200".$i."</option>";
									  }else {
										  echo "<option>20".$i."</option>";
									  }
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
				  <a href="<?php echo base_url('rbtcontent/add')?>">
					  <button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-plus"></i></button> <br> <br>
				  </a
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
				  <table id="submit" class="table table-responsive table-bordered table-striped">
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
						<?php foreach ($operator->result() as $a ){?>
						  <tr>
							  <td><?php echo $a->operator?></td>
							  <td><?php echo $this->M_Rbtsubmit->get_rev($month,$a->id)?></td>
							  <td><?php $total1 = $this->M_Rbtsubmit->get_total1($month,$a->id); echo $total1; ?></td>
							  <td><?php $total2 = $this->M_Rbtsubmit->get_total2($month,$a->id); echo $total2;?></td>
							  <td><?php $total3 = $this->M_Rbtsubmit->get_total3($month,$a->id); echo $total3;?></td>
							  <td><?php $total4 = $this->M_Rbtsubmit->get_total4($month,$a->id); echo $total4;?></td>
							  <td><?php $total5 = $this->M_Rbtsubmit->get_total5($month,$a->id); echo $total5 ?></td>
							  <td><?php $total6 = $this->M_Rbtsubmit->get_total6($month,$a->id); echo $total6?></td>
							  <td><?php $total7 = $this->M_Rbtsubmit->get_total7($month,$a->id); echo $total7?></td>
							  <?php $int1 = (int)$total1;
							  		$int2 = (int)$total2;
							  		$int3 = (int)$total3;
							  		$int4 = (int)$total4;
							  		$int5 = (int)$total5;
							  		$int6 = (int)$total6;
							  		$int7 = (int)$total7;
							  		$totalall = $int1+$int2+$int3+$int4+$int5+$int6+$int7;
							  ?>
							  <td><?php echo $totalall?></td>
							  <td>
								  <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-edit"></i></button> |
								  <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i></button>
							  </td>
						  </tr>
					  <?php }?>
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
