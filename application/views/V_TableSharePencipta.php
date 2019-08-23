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
			  <small> <?php echo $pencipta[0]['namaPencipta'];?></small>
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
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<?php
				$dateObjD   = DateTime::createFromFormat('!m', $dari);
				$dateObjS   = DateTime::createFromFormat('!m', $sampai);
				$dariName 	= $dateObjD->format('F');
				$sampaiName = $dateObjS->format('F');
				?>
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>TELKOMSEL</center></h2>
				<table id="tabelSharePencipta1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=1;$no=1; foreach ($getRBT as $rbt){?>
						<?php
						$traffic = $this->M_Sharepencipta->getTraf($rbt['id'],$monthdari,$op);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdTsel']?></td>
							<td><?php if (isset($traffic[0]['n1'])) {echo $traffic[0]['n1'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n2'])) {echo $traffic[0]['n2'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n3'])) {echo $traffic[0]['n3'];}else{echo 0;}?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2"><b>TOTAL SHARE BELUM PAJAK</b>  </td>
                  <td></td>
                </tr>
              </table>
            </div>

			</div>
            <!-- /.box-body -->

		</div>
	</section>
	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>INDOSAT</center></h2>
				<table id="tabelSharePencipta2" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=2;$no=1; foreach ($getRBT as $rbt){?>
						<?php
						$traffic = $this->M_Sharepencipta->getTraf($rbt['id'],$monthdari,$op);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdIsat']?></td>
							<td><?php if (isset($traffic[0]['n1'])) {echo $traffic[0]['n1'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n2'])) {echo $traffic[0]['n2'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n3'])) {echo $traffic[0]['n3'];}else{echo 0;}?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2"><b>TOTAL SHARE BELUM PAJAK</b>  </td>
                  <td></td>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>
	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center>JANUARI 2018</center></h4>
				<h2><center>XL</center></h2>
				<table id="tabelSharePencipta3" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=3;$no=1; foreach ($getRBT as $rbt){?>
						<?php
						$traffic = $this->M_Sharepencipta->getTraf($rbt['id'],$monthdari,$op);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdXL']?></td>
							<td><?php if (isset($traffic[0]['n1'])) {echo $traffic[0]['n1'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n2'])) {echo $traffic[0]['n2'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n3'])) {echo $traffic[0]['n3'];}else{echo 0;}?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2"><b>TOTAL SHARE BELUM PAJAK</b>  </td>
                  <td></td>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>
	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center>JANUARI 2018</center></h4>
				<h2><center>FLEXI</center></h2>
				<table id="tabelSharePencipta4" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=6;$no=1; foreach ($getRBT as $rbt){?>
						<?php
						$traffic = $this->M_Sharepencipta->getTraf($rbt['id'],$monthdari,$op);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdFlexi']?></td>
							<td><?php if (isset($traffic[0]['n1'])) {echo $traffic[0]['n1'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n2'])) {echo $traffic[0]['n2'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n3'])) {echo $traffic[0]['n3'];}else{echo 0;}?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2"><b>TOTAL SHARE BELUM PAJAK</b>  </td>
                  <td></td>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>

	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center>JANUARI 2018</center></h4>
				<h2><center>MOBILE8</center></h2>
				<table id="tabelSharePencipta5" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=5;$no=1; foreach ($getRBT as $rbt){?>
						<?php
						$traffic = $this->M_Sharepencipta->getTraf($rbt['id'],$monthdari,$op);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdM8']?></td>
							<td><?php if (isset($traffic[0]['n1'])) {echo $traffic[0]['n1'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n2'])) {echo $traffic[0]['n2'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n3'])) {echo $traffic[0]['n3'];}else{echo 0;}?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2"><b>TOTAL SHARE BELUM PAJAK</b>  </td>
                  <td></td>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>

	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center>JANUARI 2018</center></h4>
				<h2><center>ESIA</center></h2>
				<table id="tabelSharePencipta6" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=4;$no=1; foreach ($getRBT as $rbt){?>
						<?php
						$traffic = $this->M_Sharepencipta->getTraf($rbt['id'],$monthdari,$op);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php ?></td>
							<td><?php if (isset($traffic[0]['n1'])) {echo $traffic[0]['n1'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n2'])) {echo $traffic[0]['n2'];}else{echo 0;}?></td>
							<td><?php if (isset($traffic[0]['n3'])) {echo $traffic[0]['n3'];}else{echo 0;}?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2"><b>TOTAL SHARE BELUM PAJAK</b>  </td>
                  <td></td>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>
	<section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <center> <h3 class="box-title"><b>SHARE PARTNER</b></h3> <br></center>
             <center> <h4>PMM(Mobid)</h4></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>OPERATOR</th>
                  <th>$bulan</th>
                  <th>TOTAL</th>
                </tr>
                <tr>
                  <td>TELKOMSEL</td>
                  <td>3123131</td>
                  <td>25.000000</td>
                </tr>
                <tr>
                  <td>INDOSAT</td>
                  <td>331313</td>
                  <td>13131</td>
                </tr>
                <tr>
                  <td>XL</td>
                  <td>Cron job running</td>
                  <td>  </td>
                  
                </tr>
                <tr>
                  <td>FLEXI</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>MOBILE8</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>ESIA</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="2"><b>GRAND</b>  </td>
                  <td></td>
                </tr>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
