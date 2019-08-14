<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($id as $i) {?>
            <form action="<?php echo base_url(). 'CrudPartner/Editpartner'; ?>" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" disabled>No</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $i->id ?>" name="id">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $i->nama ?>" name="namaPartner">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telp</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $i->telp ?>" name="noTelp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fax</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $i->fax ?>" name="noFax">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Acc</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $i->acc ?>" name="noAcc">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bank</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $i->bank ?>" name="bank">
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