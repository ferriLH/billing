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
				<h4><center>JANUARI 2018</center></h4>
				<h2><center>TELKOMSEL</center></h2>
				<table id="revenue" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama Partner</th>
						<th>Net</th>
						<th>Tax (4,5%)</th>
						<th>Revenue</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>TOTAL</th>
                  <th>0</th>
                  <th>0</th>
                  <th>0</th>
                </tr>
              </table>
            </div>
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
