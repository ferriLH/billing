  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
<form action="" method="post">
        <div class="box-body" >
          <div class="row" style="padding-left: 400px">
            <div class="col-md-6">
              <div class="form-group">
                <label style="padding-left: 80px"><h2>SORT BY</h2></label>
                <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
                  <option selected="selected" value='1'>MAX Revenue</option>
                  <option value='2'>ABJAD</option>
                </select>
              </div>
              <a href="<?php echo base_url('sharepencipta')?>">
                <button type="button" class="btn btn-block btn-primary btn-lg">View</button>
              </a>
            </div>
          </div>
        </div>
      </form> 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>