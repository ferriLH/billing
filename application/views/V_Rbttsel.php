
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

				<form action="<?php echo base_url('rbttsel/commit')?>" method="post">
					<div class="box-body" >
						<div class="row" style="padding-left: 400px">
							<div class="col-md-6">
								<div class="form-group">
									<label>Month</label>
									<select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
										<option value='1' <?php if ($bulan==1) {echo "selected";}?>>Januari</option>
										<option value='2' <?php if ($bulan==2) {echo "selected";}?>>Febuari</option>
										<option value='3' <?php if ($bulan==3) {echo "selected";}?>>Maret</option>
										<option value='4' <?php if ($bulan==4) {echo "selected";}?>>April</option>
										<option value='5' <?php if ($bulan==5) {echo "selected";}?>>Mei</option>
										<option value='6' <?php if ($bulan==6) {echo "selected";}?>>Juni</option>
										<option value='7' <?php if ($bulan==7) {echo "selected";}?>>Juli</option>
										<option value='8' <?php if ($bulan==8) {echo "selected";}?>>Agustus</option>
										<option value='9' <?php if ($bulan==9) {echo "selected";}?>>September</option>
										<option value='10' <?php if ($bulan==10) {echo "selected";}?>>Oktober</option>
										<option value='11' <?php if ($bulan==11) {echo "selected";}?>>November</option>
										<option value='12' <?php if ($bulan==12) {echo "selected";}?>>Desember</option>
									</select>
									<label>Years</label>
									<select class="form-control select2" style="width: 100%;" name="tahun" id="tahun">
										<option <?php if ($tahun==1) {echo "selected";}?>>2006</option>
										<?php
										for ($i=7; $i <= 50; $i++) {
											if ($i<10) {
												echo "<option ";if ($tahun=="200".$i){echo "selected";} echo ">200".$i."</option>";
											}else {
												echo "<option ";if ($tahun=="20".$i){echo "selected";} echo ">20".$i."</option>";									  }
										}
										?>
									</select>
								</div>
								<button type="submit" class="btn btn-block btn-primary btn-lg">View</button>
							</div>
						</div>
					</div>
				</form>

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
			<?php foreach ($operator as $a ) {
				$rev=0;
				$totalall=0;
				$total1=0;
				$total2=0;
				$total3=0;
				$total4=0;
				$total5=0;
				$total6=0;
				$total7=0;
				$total8=0;
				$total9=0;
				$total10=0;
				$total11=0;
				$total12=0;
				$total13=0;
				$total14=0;
				$total15=0;
				$total16=0;
				$total17=0;
				$total18=0;
				$total19=0;
				$total20=0;
				$total21=0;
				$total22=0;
				$total23=0;
				$total24=0;
				$total25=0;
				$total26=0;
				?>
				<?php

				foreach ($this->M_Rbttsel->get_traffic_tsel($month, $a->id) as $traffic) {
					$total1=$total1+$traffic->n1;
					$total2=$total2+$traffic->n2;
					$total3=$total3+$traffic->n3;
					$total4=$total4+$traffic->n4;
					$total5=$total5+$traffic->n5;
					$total6=$total6+$traffic->n6;
					$total7=$total7+$traffic->n7;
					$total8=$total8+$traffic->n8;
					$total9=$total9+$traffic->n9;
					$total10=$total10+$traffic->n10;
					$total11=$total11+$traffic->n11;
					$total12=$total12+$traffic->n12;
					$total13=$total13+$traffic->n13;
					$total14=$total14+$traffic->n14;
					$total15=$total15+$traffic->n15;
					$total16=$total16+$traffic->n16;
					$total17=$total17+$traffic->n17;
					$total18=$total18+$traffic->n18;
					$total19=$total19+$traffic->n19;
					$total20=$total20+$traffic->n20;
					$total21=$total21+$traffic->n21;
					$total22=$total22+$traffic->n22;
					$total23=$total23+$traffic->n23;
					$total24=$total24+$traffic->n24;
					$total25=$total25+$traffic->n25;
					$total26=$total26+$traffic->n26;
				}
				foreach ($this->M_Rbttsel->get_price($month, $a->id) as $price) {
					if ($a->id == 3) {
						$totalrp1=$total1*$price->p1;
						$totalrp2=$total2;
						$totalrp3=$total3*$price->p3;
						$totalrp4=$total4*$price->p4;
						$totalrp5=$total5*$price->p5;
						$totalrp6=$total6*$price->p6;
						$totalrp7=$total7*$price->p7;
						$totalrp8=$total8*$price->p8;
						$totalrp9=$total9*$price->p9;
						$totalrp10=$total10*$price->p10;
						$totalrp11=$total11*$price->p11;
						$totalrp12=$total12*$price->p12;
						$totalrp13=$total13*$price->p13;
						$totalrp14=$total14*$price->p14;
						$totalrp15=$total15*$price->p15;
						$totalrp16=$total16*$price->p16;
						$totalrp17=$total17*$price->p17;
						$totalrp18=$total18*$price->p18;
						$totalrp19=$total19*$price->p19;
						$totalrp20=$total20*$price->p20;
						$totalrp21=$total21*$price->p21;
						$totalrp22=$total22*$price->p22;
						$totalrp23=$total23*$price->p23;
						$totalrp24=$total24*$price->p24;
						$totalrp25=$total25*$price->p25;
						$totalrp26=$total26*$price->p26;
					} else {
						$totalrp1=$total1*$price->p1;
						$totalrp2=$total2*$price->p2;
						$totalrp3=$total3*$price->p3;
						$totalrp4=$total4*$price->p4;
						$totalrp5=$total5*$price->p5;
						$totalrp6=$total6*$price->p6;
						$totalrp7=$total7*$price->p7;
						$totalrp8=$total8*$price->p8;
						$totalrp9=$total9*$price->p9;
						$totalrp10=$total10*$price->p10;
						$totalrp11=$total11*$price->p11;
						$totalrp12=$total12*$price->p12;
						$totalrp13=$total13*$price->p13;
						$totalrp14=$total14*$price->p14;
						$totalrp15=$total15*$price->p15;
						$totalrp16=$total16*$price->p16;
						$totalrp17=$total17*$price->p17;
						$totalrp18=$total18*$price->p18;
						$totalrp19=$total19*$price->p19;
						$totalrp20=$total20*$price->p20;
						$totalrp21=$total21*$price->p21;
						$totalrp22=$total22*$price->p22;
						$totalrp23=$total23*$price->p23;
						$totalrp24=$total24*$price->p24;
						$totalrp25=$total25*$price->p25;
						$totalrp26=$total26*$price->p26;
					}
					$totalall=$totalrp1+$totalrp2+$totalrp3+$totalrp4+$totalrp5+$totalrp6+$totalrp7+$totalrp8+$totalrp9+$totalrp10+$totalrp11+$totalrp12+$totalrp13+$totalrp14+$totalrp15+$totalrp16+$totalrp17+$totalrp18+$totalrp19+$totalrp20+$totalrp21+$totalrp22+$totalrp23+$totalrp24+$totalrp25+$totalrp26;
				}


				foreach ($this->M_Rbttsel->get_rev($month, $a->id) as $reven) {
					if (isset($reven->sum)){
						echo "
									<tr>
									<td >$a->operator</td>
             						<td >$reven->sum</td>
             						<td >$totalall</td>
              						<td >$total1</td>
              						<td >$total2</td>
             					 	<td >$total3</td>
              						<td >$total4</td>
              						<td >$total5</td>
              						<td >$total6</td>
              						<td >$total7</td>
              						<td >$total8</td>
              						<td >$total9</td>
             	 					<td >$total10</td>
              						<td >$total11</td>
              						<td >$total12</td>
									<td >$total13</td>
									<td >$total14</td>
									<td >$total15</td>
									<td >$total16</td>
									<td >$total17</td>
									<td >$total18</td>
									<td >$total19</td>
									<td >$total20</td>
								 	<td >$total21</td>
								 	<td >$total22</td>
									<td >$total23</td>
									<td >$total24</td>
									<td >$total25</td>
									<td >$total26</td>
              						<td> Submited</td>
             
									";
					}else{
						echo "<tr>
									<td>$a->operator</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>not submited</td>
								
									";
					}

					?>
				<?php } }  ?>
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
