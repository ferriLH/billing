
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <?php
$name 	= $this->session->userdata('nama');
$email 	= $this->session->userdata('email');
$role 	= $this->session->userdata('role');
$login 	= $this->session->userdata('isLogin');
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
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $name;?>
                  <small><?php echo $email;?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php if ($login=='admin'){echo base_url('logoutAdmin');}else{echo base_url('logoutPartner');}?>" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name;?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigation <?php echo $title;?></li>
        <!-- Optionally, you can add icons to the links -->
		  <?php if ($login=='admin') {
		  	?>
			  <li class="<?php if($this->uri->segment(1)=="admin"){echo "active";}?>">
				  <a href="<?php echo base_url('home')?>"><i class="fa fa-link"></i> <span>HOME</span></a>
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
		  }elseif ($login=='partner') {
		  	?>
			  <li><a href="<?php echo base_url('sharepartner')?>"><i class="fa fa-link"></i> <span>SHARE PARTNER</span></a></li>
			  <?php
		  }
		  ?>

        
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
