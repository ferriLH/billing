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
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<h4><center><?php echo $month;?></center></h4>

				<?php $th = substr($month,4,1);?>
				<?php		if ($th >= "9") {
					$pajak = 0.02;
				}
				else {
					$pajak = 0.045;
				}
				$fixtax = $pajak*100;?>
				<?php foreach ($op as $operator){?>
					<h2><center><?php echo $operator->operator;?></center></h2>
				<?php }?>
				<table id="revpart" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>Nama Partner</th>
						<th>Net</th>
						<th>Tax(<?php echo $fixtax?>%)</th>
						<th>Revenue</th>
					</tr>
					</thead>

					<?php foreach ($this->M_Summary->get_share($operator->id,$month) as $partner) {?>
						<tr>
						<?php $tax = number_format($partner->share * $pajak);?>
						<?php $net = number_format($partner->share - ($partner->share * $pajak));?>
						<?php $tmpshare=number_format($partner->share);?>
						<?php foreach ( $this->M_Summary->get_nama_partner($partner->partnerId) as $var){?>
							<td><?php echo $var->namaPartner?></td>
							<td><?php echo $net?></td>
							<td><?php echo $tax?></td>
							<td><?php echo $tmpshare?></td>
					</tr>
						<?php } }?>
					</tbody>
				</table>
<!--				<div class="box-body">-->
<!--              	<table class="table table-bordered">-->
<!--                <tr>-->
<!--                  <th>TOTAL</th>-->
<!--                  <th>0</th>-->
<!--                  <th>0</th>-->
<!--                  <th>0</th>-->
<!--                </tr>-->
<!--              </table>-->
            </div>
<!--			</div>-->

            <!-- /.box-body -->

		</div>
	</section>
    <!-- /.content -->
	  </div>

  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
