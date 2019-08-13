
  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PENCIPTA
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
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
                              $namaPencipta=$i['namaPencipta'];
                              $noTelp=$i['noTelp'];
                              $noFax=$i['noFax'];
                              $noAcc=$i['noAcc'];
                              $bank=$i['bank'];
                              
                  ?>
                <tr>
                  <td><?php echo $id;?></td>
                  <td><?php echo $namaPencipta;?></td>
                  <td><?php echo $noTelp;?></td>
                  <td><?php echo $noFax;?></td>
                  <td><?php echo $noAcc;?></td>
                  <td><?php echo $bank;?></td>
                  <td><button type="button" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></button> |<button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-edit"></i></button> | <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i></button></td>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>