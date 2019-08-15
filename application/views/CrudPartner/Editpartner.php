  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
      <section class="content">
      <div class="row">
   
      <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="partner/edit/auth/" method="post" class="form-horizontal">
              <?php if(validation_errors()||$this->session->flashdata('failed')){ ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" disabled>No</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $edit[0]['id']?>" class="form-control" id="namaPartner" name="namaPartner">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $edit[0]['noTelp']?>" class="form-control" id="noTelp" name="noTelp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fax</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $edit[0]['noFax']?>" class="form-control" id="noFax" name="noFax">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Acc</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $edit[0]['noAcc']?>" class="form-control" id="noAcc" name="noAcc">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bank</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $edit[0]['bank']?>" class="form-control" id="bank" name="bank">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" value="simpan" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
</div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php } ?>
  <?php
  $this->load->view('parts/V_Footer');
  ?>