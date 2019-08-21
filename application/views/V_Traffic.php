
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
	  </section>
    <!-- Main content -->
	  <section class="content container-fluid text-center">
		  <form action="<?php echo base_url('traffic/commit')?>" method="get">
			  <div class="box-body">
				  <div class="row">
					  <div class="col-md-4 col-md-offset-4">
						  <div class="form-group">
							  <label>Operator</label>
							  <select class="form-control select2" style="width: 100%;" name="op" id="op">
								  <?php foreach ($operator as $o) {?>
									  <option value="<?php echo $o->id;?>"><?php echo $o->operator?></option>
								  <?php }?>

							  </select>
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
			  <div class="box-body">
				  <table id="traffic" class="table table-bordered table-striped">
					  <thead>
					  <tr>
						  <td >Judul</td>
						  <td >Artis</td>
						  <td >Download</td>
						  <td >Renew</td>
						  <td >Campaign</td>
						  <td>Action</td>
					  </tr>
					  </thead>
					  <tbody>
					  <?php $judul="-"; $artist="-"; $total1=0;$total2=0;$total3=0;?>
					  <?php $url = $this->uri->segment(2)?>
					  <?php if ( $url == "commit"){?>
						  <?php foreach ($lagu as $a ){?>
							  <tr>
								  <td><?php  $judul = $a->judul; echo $judul ?></td>
								  <td><?php $artist = $a->artis; echo $artist?></td>
							  <?php foreach ($this->M_Traffic->get_kode($this->input->get('op'),$a->id) as $kode ) { ?>
								  <?php foreach ($this->M_Traffic->get_total($month, $kode->kode) as $total) {
									  $n1 = $total->n1;
									  $n2 = $total->n2;
									  $n3 = $total->n3;
									  //if (isset($n1 == 0)) {
										  echo "<td>$n1</td>
												<td>$n2</td>
												<td>$n3</td>
												";
									  //} else if (isset($n2 == 0)) {
										//  echo "<td>$n1</td>
										//		<td>0</td>
										//		<td>$n3</td>
									//			";
									//  } else if (isset($n3 == 0)) {
									//	  echo "<td>$n1</td>
									//			<td>$n2</td>
									//			<td>0</td>
									//			";
									  //} else {
										//  echo "<td>0</td>
										//		<td>0</td>
										//		<td>0</td>
										//		";
									  }
									  ?>
									  <td>
										  <button type="button" class="btn btn-danger"><i
												  class="glyphicon glyphicon-edit"></i></button>
										  |
										  <button type="button" class="btn btn-warning"><i
												  class="glyphicon glyphicon-trash"></i></button>
									  </td>
									  </tr>
									  <?php
								  }
							  }
					  }  ?>
					  </tbody>
				  </table>
			  </div>
		  </div>
	  </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
