<body class="hold-transition skin-blue sidebar-mini">
  <?php
$name 	= $this->session->userdata('nama');
$email 	= $this->session->userdata('email');
$role 	= $this->session->userdata('role');
$login 	= $this->session->userdata('isLogin');
$id 	= $this->session->userdata('id_user');
?>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php if ($login=='admin'){echo base_url('admin');}else{echo base_url('home');}?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>ILL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Billing</b>RBT</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url()?>assets/images/user.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/images/user.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $name;?>
                  <small><?php echo $email;?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('profile/'.$id)?>" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php if ($login=='admin'){echo base_url('logoutAdmin');}else{echo base_url('logoutPartner');}?>" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/images/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name;?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigation Menu</li>
        <!-- Optionally, you can add icons to the links -->
		  <?php if ($login=='admin') {
		  	?>
			  <li class="<?php if($this->uri->segment(1)=="admin"){echo "active";}?>">
				  <a href="<?php if ($login=='admin'){echo base_url('admin');}else{echo base_url('home');}?>"><i class="fa fa-link"></i> <span>HOME</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="rbtcontent"){echo "active";}?>">
				  <a href="<?php echo base_url('rbtcontent')?>"><i class="fa fa-link"></i> <span>RBT CONTENT</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="partner"){echo "active";}?>">
				  <a href="<?php echo base_url('partner')?>"><i class="fa fa-link"></i> <span>PARTNER</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="pencipta"){echo "active";}?>">
				  <a href="<?php echo base_url('pencipta')?>"><i class="fa fa-link"></i> <span>PENCIPTA</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="rbtsubmit"){echo "active";}?>">
				  <a href="<?php echo base_url('rbtsubmit')?>"><i class="fa fa-link"></i> <span>RBT SUBMIT</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="traffic"){echo "active";}?>">
				  <a href="<?php echo base_url('traffic')?>"><i class="fa fa-link"></i> <span>TRAFFIC</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="sharepartner"){echo "active";}?>">
				  <a href="<?php echo base_url('sharepartner')?>"><i class="fa fa-link"></i> <span>SHARE PARTNER</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="sharepencipta"){echo "active";}?>">
				  <a href="<?php echo base_url('sharepencipta')?>"><i class="fa fa-link"></i> <span>SHARE PENCIPTA</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="summary"){echo "active";}?>">
				  <a href="<?php echo base_url('summary')?>"><i class="fa fa-link"></i> <span>SUMMARY</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="payment"){echo "active";}?>">
				  <a href="<?php echo base_url('payment')?>"><i class="fa fa-link"></i> <span>PAYMENT</span></a>
			  </li>
			  <li class="<?php if($this->uri->segment(1)=="rbttsel"){echo "active";}?>">
				  <a href="<?php echo base_url('rbttsel')?>"><i class="fa fa-link"></i> <span>RBT FOR TSEL</span></a>
			  </li>
			  <?php
		  }elseif (($login=='partner')&&($role=='partner')) {
		  	?>
			  <li><a href="<?php echo base_url('sharepartner')?>"><i class="fa fa-link"></i> <span>SHARE PARTNER</span></a></li>
        <li><a href="<?php echo base_url('partner/tablealias')?>"><i class="fa fa-link"></i> <span>DAFTAR KODE RBT</span></a></li>
			  <?php
		  }elseif (($login=='partner')&&($role=='pencipta')) {
		  ?>
			  <li><a href="<?php echo base_url('sharepencipta')?>"><i class="fa fa-link"></i> <span>SHARE PENCIPTA</span></a></li>
       <!-- <li><a href="<?php echo base_url('pencipta/tablepencipta')?>"><i class="fa fa-link"></i> <span>TABEL PENCIPTA</span></a></li> -->
			  <?php
		  }
		  ?>
        
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
