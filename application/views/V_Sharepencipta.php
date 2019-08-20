
  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SHARE PENCIPTA
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <section class="content container-fluid">
<form action="" method="post">
        <div class="box-body" >
          <div class="row" style="padding-left: 400px">
            <div class="col-md-6">
              <div class="form-group">
                <label>Pencipta </label>
                <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
                  <option selected="selected" value='1'>A.Aziz Albaqis</option>
                  <option value='2'>A.Halomoan Hutapea</option>
                </select>
                <label>From Month </label>
                <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
                  <option selected="selected" value='1'>Januari</option>
                  <option value='2'>Febuari</option>
                  <option value='3'>Maret</option>
                  <option value='4'>April</option>
                  <option value='5'>Mei</option>
                  <option value='6'>Juni</option>
                  <option value='7'>Juli</option>
                  <option value='8'>Agustus</option>
                  <option value='9'>September</option>
                  <option value='10'>Oktober</option>
                  <option value='11'>November</option>
                  <option value='12'>Desember</option>
                </select>
                <label>Until Month </label>
                <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
                  <option selected="selected" value='1'>Januari</option>
                  <option value='2'>Febuari</option>
                  <option value='3'>Maret</option>
                  <option value='4'>April</option>
                  <option value='5'>Mei</option>
                  <option value='6'>Juni</option>
                  <option value='7'>Juli</option>
                  <option value='8'>Agustus</option>
                  <option value='9'>September</option>
                  <option value='10'>Oktober</option>
                  <option value='11'>November</option>
                  <option value='12'>Desember</option>
                </select>
                <label>Year </label>
                <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
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
              <a href="<?php echo base_url('sharepencipta/tableshare')?>">
                <button type="button" class="btn btn-block btn-primary btn-lg">View</button>
              </a>
            </div>
          </div>
        </div>
      </form> 

    </section>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>