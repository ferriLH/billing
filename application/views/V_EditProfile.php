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
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#password" data-toggle="tab">Change Password</a></li>
                        <li><a href="#profile" data-toggle="tab">Update Profile</a></li>
                    </ul>
                    <div class="tab-content">
                        <?php
                        if (validation_errors() || $this->session->flashdata('result_login')) {
                            ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Warning!</strong>
                                <?php echo validation_errors(); ?>
                                <?php echo $this->session->flashdata('result_login'); ?>
                            </div>
                        <?php } ?>
                        <div class="active tab-pane" id="password">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('C_Profile/updatePassword/'.$id)?>" >
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" required="" class="form-control" name="inputOPassword" id="inputOPassword" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" required="" class="form-control" name="pass" id="pass" onchange="isPasswordMatch()" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" required="" class="form-control" name="cpass" id="cpass" onchange="isPasswordMatch()" placeholder="Confirm Password">
                                    </div>
                                    <div id="divCheckPassword"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" id="next" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="profile">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('C_Profile/updateProfile/'.$id)?>" >
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" required="" class="form-control" name="inputName" id="inputName" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" required="" class="form-control" name="inputEmail" id="inputEmail" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
