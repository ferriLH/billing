
  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        RBT FOR TSEL
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
          <div class="row" style="padding-left: 400px">
            <div class="col-md-6">
              <div class="form-group">
                <label>Month</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Januari</option>
                  <option>Febuari</option>
                  <option>Maret</option>
                  <option>April</option>
                  <option>Mei</option>
                  <option>Juni</option>
                  <option>Juli</option>
                  <option>Agustus</option>
                  <option>September</option>
                  <option>Oktober</option>
                  <option>November</option>
                  <option>Desember</option>
                </select>
                <label>Years</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">2000</option>
                  <option>2001</option>
                  <option>2002</option>
                  <option>2003</option>
                  <option>2004</option>
                  <option>2005</option>
                  <option>2006</option>
                  <option>2007</option>
                  <option>2008</option>
                  <option>2009</option>
                  <option>2010</option>
                  <option>2011</option>
                  <option>2012</option>
                  <option>2013</option>
                  <option>2014</option>
                  <option>2015</option>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                </select>
              </div>
              <button type="button" class="btn btn-block btn-primary btn-lg">View</button>
        </div>
      </div>
    </div>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header">
          <?php if($this->session->flashdata('sukses')){ ?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Information</strong><br>
              <?php echo $this->session->flashdata('sukses'); ?>
            </div>
          <?php }?>
          <a href="<?php echo base_url('rbtcontent/add')?>">
            <button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-plus"></i></button> <br> <br>
          </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tsel" class="table table-responsive table-bordered table-striped">
            <thead>
            <tr>
              <td >OPERATOR</td>
              <td >Total Revenue</td>
              <td >Total Summary</td>
              <td >Total 100 (n)</td>
              <td >Total 200 (n)</td>
              <td >Total 300 (n)</td>
              <td >Total 400 (n)</td>
              <td >Total 500 (n)</td>
              <td >Total 600 (n)</td>
              <td >Total 700 (n)</td>
              <td >Total 800 (n)</td>
              <td >Total 900 (n)</td>
              <td >Total 1000 (n)</td>
              <td >Total 1500 (n)</td>
              <td >Total 2000 (n)</td>
              <td >Total 2500 (n)</td>
              <td >Total 3000 (n)</td>
              <td >Total 3500 (n)</td>
              <td >Total 4000 (n)</td>
              <td >Total 4500 (n)</td>
              <td >Total 5000 (n)</td>
              <td >Total 5500 (n)</td>
              <td >Total 6000 (n)</td>
              <td >Total 6500 (n)</td>
              <td >Total 7000 (n)</td>
              <td >Total 7500 (n)</td>
              <td >Total 8000 (n)</td>
              <td >Total 8500 (n)</td>
              <td >Total 9000 (n)</td>
              <td> Submited</td>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-edit"></i></button> |
                  <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
              </tr>
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