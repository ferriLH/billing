<?php
$this->load->view('parts/V_Header');
$this->load->view('parts/V_Navigation');
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $title; ?>
			<small><?php echo $pencipta[0]['namaPencipta'];?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a></li>
			<li><a href="<?php echo base_url('payment')?>"></i>Payment</a></li>
			<li class="active"><?php echo $title?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<center> <h3 class="box-title"><b>SHARE PARTNER</b></h3> <br></center>
						<center> <h4><?php echo $pencipta[0]['namaPencipta'];?></h4></center>
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
	</section>
	<!-- /.content -->
</div>
<?php
$this->load->view('parts/V_Footer');
?>
