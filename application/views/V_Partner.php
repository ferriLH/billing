
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
		<div class="box box-primary">
			<div class="box-header">
				<?php if($this->session->flashdata('sukses')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Information</strong><br>
						<?php echo $this->session->flashdata('sukses'); ?>
					</div>
				<?php }?>
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-plus"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<table id="pencipta" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Telp</th>
						<th>Fax</th>
						<th>Acc</th>
						<th>Bank</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach($data->result_array() as $i):
						$id=$i['id'];
						$namaPartner=$i['namaPartner'];
						$noTelp=$i['noTelp'];
						$noFax=$i['noFax'];
						$noAcc=$i['noAcc'];
						$bank=$i['bank'];
						?>
						<tr>
							<td><?php echo $id;?></td>
							<td><?php echo $namaPartner;?></td>
							<td><?php echo $noTelp;?></td>
							<td><?php echo $noFax;?></td>
							<td><?php echo $noAcc;?></td>
							<td><?php echo $bank;?></td>
							<td>
								<a href="<?php echo base_url('partner/edit/').$id?>">
									<button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-edit"></i></button> |
								</a>
								<button data-target="<?php echo base_url('partner/delete/').$id?>"
									type="button" class="btn btn-warning delete-partner"><i class="glyphicon glyphicon-trash"></i>
								</button>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
            <!-- /.box-body -->
		</div>
	</section>
    <!-- /.content -->
	  <script>
          $(function() {
              $('.delete-partner').click(function(e) {
                  e.preventDefault();
                  var href = $(this).attr('data-target');
                  Swal.fire({
                      title: 'Are you sure?',
                      text: "You will delete this forever!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: "Yes, i'm sure!"
                  }).then((result) => {
                      if (result.value) {
                          Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                          )
                          document.location.href = href;
                      }
                  })
              });
          });
	  </script>
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
