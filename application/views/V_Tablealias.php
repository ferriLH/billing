<?php
$this->load->view('parts/V_Header');
$this->load->view('parts/V_Navigation');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $title;?>
			<small>Optional description</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a></li>
			<li class="active"><?php echo $title;?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<h2><center>Tabel Partner</center></h2>
				<a href="<?php echo base_url('partner/tablealias/export')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<h4><center></center></h4>

				<table id="tblpartner" class="table table-bordered table-striped">
					<thead>
					<tr>
							<th>No</th>
							<th>Judul RBT</th>
							<th>Penyanyi</th>
							<th>Pencipta</th>
							<th>Kode Tsel Alias</th>
							<th>Kode Tsel Sistem</th>
							<th>Kode XL Alias</th>
							<th>Kode XL Sistem</th>
							<th>Kode Indosat Alias</th>
							<th>Kode Indosat Sistem</th>
					</tr>
					</thead>
					<?php $no = 1?>
					<?php foreach ($prbt as $rbt){?>
						<tr>
							<td><?php echo $no?></td> <?php $no++?>
							<td><?php echo $rbt->judul?></td>
							<td><?php echo $rbt->artis?></td>
							<?php foreach ($this->M_Partner->get_pencipta($rbt->penciptaId) as $pencipta){?>
							<td><?php echo $pencipta->namaPencipta?></td>
							<?php }?>
							<?php foreach ($this->M_Partner->get_alias($rbt->id) as $kode){?>
							<td><?php echo $kode->kd_tsel_alias?></td>
							<td><?php echo $kode->kd_tsel_sistem?></td>
							<td><?php echo $kode->kd_xl_alias?></td>
							<td><?php echo $kode->kd_xl_sistem?></td>
							<td><?php echo $kode->kd_indosat_alias?></td>
							<td><?php echo $kode->kd_indosat_sistem?></td>
							<?php }?>
					</tr>
					<?php }?>
						
					</tbody>
				</table>
            </div>

		</div>
	</section>
    <!-- /.content -->
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered table-responsive">
							<tr>
								<td><b><u><center>Petunjuk Aktivasi RBT</center></u></b></td>
<!--								<td><b><u><center>Petunjuk Aktivasi RBT "$judul"</center></u></b></td>-->
							</tr>
							<tr>
								<td><b>Telkomsel</b>  Ketik : <b>Kode RBT</b> Kirim SMS ke: 1212 <br>
									<b>XL</b>              Ketik : <b>Kode RBT</b> Kirim SMS ke: 1818 <br>
									<b>Indosat</b>      Ketik : <b>SET</b> <i>spasi</i> <b>Kode RBT</b> Kirim SMS ke: 808</td>

<!--								<td><b>Telkomsel</b>  Ketik : <b>TERGILA1</b> Kirim SMS ke: 1212 <br>-->
<!--									<b>XL</b>              Ketik : <b>TERGILA1</b> Kirim SMS ke: 1818 <br>-->
<!--									<b>Indosat</b>      Ketik : <b>SET TERGILA1</b> Kirim SMS ke: 808</td>-->
							</tr>
						</table>
					</div>

					<div class="box-body">
						<table class="table table-bordered table-responsive">
							<tr>
								<td><b><i>Tarif :</i></b></td>
							</tr>
							<tr>
								<td>Telkomsel: KartuHALO Rp.9.000/lagu/30 hari, SimPATI, KartuAS Rp. 9.900/lagu/30 hari, <br>
									Indosat, XL: Download Rp. 7.000/lagu, Langganan Rp. 5.500/bulan, <br>
									<b><i>* Harga belum termasuk PPN 10%</i></b></td>
							</tr>
						</table>
					</div>

					<div class="box-body">
						<table class="table table-bordered table-responsive">
							<tr>
								<td><b><u>Petunjuk Memberikan/mengirimkan RBT ke teman</u></b></td>
							</tr> 
							<tr>
								<td><b>Telkomsel</b>  Ketik : <b>GIFT</b> <i>spasi</i> <b>Kode RBT</b> <i>spasi</i> <b>Nomor HP Telkomsel teman</b> Kirim SMS ke: 1212<br>
									<b>XL</b>              Ketik : <b>GIFT</b> <i>spasi</i> <b>Nomor HP XL teman</b> <i>spasi</i> <b>Kode RBT</b> Kirim SMS ke: 1818 <br>
									<b>Indosat</b>      Ketik : <b>GIFT</b> <i>spasi</i> <b>Kode RBT</b> <i>spasi</i> <b>No HP Indosat teman</b> Kirim SMS ke: 808</b></td>
							</tr>
						</table>
					</div>

				</div>
			</div>
		</div>
	</section>
	  </div>

  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
