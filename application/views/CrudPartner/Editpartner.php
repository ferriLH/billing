<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php base_url('partner/add') ?>" method="post" class="form-horizontal">
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
                    <input type="text" class="form-control" id="namaPartner" name="namaPartner">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="noTelp" name="noTelp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fax</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="noFax" name="noFax">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Acc</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="noAcc" name="noAcc">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bank</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="bank" name="bank">
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
          <?php } ?>
          </div>