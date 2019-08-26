 <?php

  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
 $id = $this->session->userdata('id_user');
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page <?php echo $title;?>
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i></a></li>
          <li class="active"><?php echo $title?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive " src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg"alt="User profile picture">
                        <h3 class="profile-username text-center"></h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama</b><a class="pull-right"><?php echo $this->session->userdata('nama') ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?php echo $this->session->userdata('email') ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Edit Profile</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form class="form-horizontal" action="<?php echo base_url('C_Profile/updateProfile/'.$id)?>" method="post">
								<div class="box-body">
									<?php if(validation_errors() || $this->session->flashdata('failed')){ ?>
										<div class="alert alert-warning">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Warning</strong>
											<?php echo validation_errors(); ?>
											<?php echo $this->session->flashdata('failed'); ?>
										</div>
									<?php } else {?>
									<?php if (validation_errors() || $this->session->flashdata('success'))
										{?>
											<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="alert">&times;</button>
												<strong>Success</strong>
												<?php echo validation_errors(); ?>
												<?php echo $this->session->flashdata('success'); ?>
											</div>
										<?php } } ?>
									<div class="form-group">
										<label for="nama" class="col-sm-2 control-label">Nama</label>

										<div class="col-sm-10">
											<?php if ($this->session->userdata('isLogin') == "partner"){ ?>
											<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?php echo $this->session->userdata('nama')?>" disabled>
											<?php } else{?>
											<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" >
											<?php }?>
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-sm-2 control-label">Email</label>

										<div class="col-sm-10">
											<input type="email" class="form-control" id="email" placeholder="Email" name="email">
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-sm-2 control-label">Password</label>

										<div class="col-sm-10">
											<input type="password" class="form-control" id="password" placeholder="Password" name="password">
										</div>
									</div>
									<div class="form-group">
										<label for="re-password" class="col-sm-2 control-label">Confirm Password</label>

										<div class="col-sm-10">
											<input type="password" class="form-control" id="re-password" placeholder="Confirm Password" name="re-password">
										</div>
									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-info pull-right">Confirm</button>
								</div>
								<!-- /.box-footer -->
							</form>
						</div>

						<!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
  </div>


  <?php
  $this->load->view('parts/V_Footer');
  ?>
