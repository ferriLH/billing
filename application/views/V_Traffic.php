  <?php
  set_time_limit(700);
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
									  <option <?php if ($op==$o->id) {echo "selected";}?> value="<?php echo $o->id;?>"><?php echo $o->operator?></option>
								  <?php }?>

							  </select>
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
			  <div class="box-body">
				  <table id="traffic" class="table table-bordered table-striped">
					  <thead>
					  <tr>
						  <td >Judul</td>
						  <td >Artis</td>
						  <td >Download</td>
						  <td >Renew</td>
						  <td >Campaign</td>
					  </tr>
					  </thead>
					  <tbody>
					  <?php $judul="-"; $artist="-"; $total1=0;$total2=0;$total3=0;?>
					  <?php $url = $this->uri->segment(2)?>
					  <?php if ( $url == "commit"){ $op=$this->input->get('op');?>
						  <?php foreach ($lagu as $a ){?>
							  <?php
							  $pkode = $this->M_Traffic->get_kode($op,$a->id);
							  if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
							  $traffic=$this->M_Traffic->get_total($month, $kode,$op);
							  ?>
							  <tr>
								  <td><?php $judul = $a->judul; echo $judul ?></td>
								  <td><?php $artist = $a->artis; echo $artist?></td>
								  <td><?php if (isset($traffic[0]['n1'])) {echo $traffic[0]['n1'];}else{echo 0;}?></td>
								  <td><?php if (isset($traffic[0]['n2'])) {echo $traffic[0]['n2'];}else{echo 0;}?></td>
								  <td><?php if (isset($traffic[0]['n3'])) {echo $traffic[0]['n3'];}else{echo 0;}?></td>
							  </tr>
							  <?php
						  }
					  }
					  ?>
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
