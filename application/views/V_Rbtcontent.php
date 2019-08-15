
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
    <section class="content container-fluid">

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
          <div class="box">
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
				</a>            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="rbt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Artis</th>
                  <th>Pencipta</th>
                  <th>Partner</th>
                  <th>$resoperator[Operator]</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($prbt->result() as $a ){?>
				<tr>
					<td><?php echo $a->id?></td>
					<td><?php echo $a->judul?></td>
					<td><?php echo $a->artis?></td>
					<td><?php echo $this->M_Rbtcontent->get_pencipta($a->penciptaId); ?></td>
					<td><?php echo $this->M_Rbtcontent->get_partner($a->partnerId);?></td>
					<td></td>
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
          <!-- /.box -->
     
      <!-- /.row -->
    </section>
  </div>

    <!-- /.content -->
  
<?php
$this->load->view('parts/V_Footer');
?>
