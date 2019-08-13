
  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PAYMENT
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>SILAHKAN PILIH</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">PENCIPTA</option>
                </select>
              </div>
              <button type="button" class="btn btn-block btn-primary btn-lg">View</button>
        </div>
      </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>