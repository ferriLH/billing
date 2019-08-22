  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
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

   <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button>
            </div>
            <!-- /.box-header -->
			  <?php foreach ($this->M_Summary->get_operator() as $ops){?>
				  <?php foreach ($this->M_Summary->get_summary($ops->id,$month) as $sum){?>
					  <?php $tempSumOp = number_format($sum->sum);
					  $totalpartner = 0 ;
					  $totalpencipta = 0;
					  $shpencipta = 0;
					  $tmptotalpencipta = 0;



					  $th = substr($month,4,1);?>
				<?php if ($th >= "9") {
						  $pajak = 0.02;
					  }
					  else {
						  $pajak = 0.045;
					  }
				$fixtax = $pajak*100;?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th><?php echo $ops->operator?></th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
					<td>Total Revenue From Operator</td>
                  <td></td>
                  <td>Rp.<?php echo $tempSumOp?></td>
                </tr>
                <tr>
					<td><a href="<?php echo base_url('summary/RevenuePartner/'.$ops->id.'/'.$month)?>">Total Revenue From Partner</a></td>
					<?php $grandpartner = 0; ?>
					<?php $tmptotalpartner = 0; ?>
					<?php foreach ($this->M_Summary->get_sh_partner($ops->id,$month) as $shpart){?>
                  <?php $totalpartner = $totalpartner + $shpart->share ;
                  $tmptotalpartner = number_format($totalpartner);
						$grandpartner = $grandpartner + $totalpartner;
						?>
					<?php }?>
                  		<td>Rp.<?php echo $tmptotalpartner; ?></td>
                  <td></td>

                </tr>
                <tr>
					<td><a href="<?php echo base_url('summary/RevenuePencipta/'.$ops->id.'/'.$month)?>">Total Revenue From Pencipta</a></td>
					<?php $shpencipta = 0; $grandpencipta=0;
					$grandoperator =0;?>
					  <?php foreach ($this->M_Summary->get_sh_pencipta($ops->id,$month) as $shpencipta){?>
						  <?php $totalpencipta = $totalpencipta + $shpencipta->share; $tmptotalpencipta = number_format($totalpencipta);
						   $grandoperator = $grandoperator + $totalpencipta;
						  $grandpencipta=$grandpencipta + $totalpencipta;
						  ?>
					  <?php }?>
                  <td>Rp.<?php echo $tmptotalpencipta?></td>
                  <td></td>

                </tr>
                <tr>
                  <td>Total Revenue From AlphaOmega</td>
					<?php $tmprevaop = number_format(($sum->sum) - ($totalpencipta) - ($totalpartner));?>
                  <td>Rp.<?php echo $tmprevaop?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Total</b>  </td>
                  <td>Rp. <?php echo $tempSumOp ?></td>
                  <td>Rp. <?php echo $tempSumOp ?></td>
                </tr>
              </table>
            </div>
			<?php }}?>





            <div class="box-body">
              <table class="table table-bordered">
				  <?php if (!isset($grandoperator,$grandpencipta,$grandpartner)){
				  	$grandpencipta =0;
				  	$grandpartner = 0;
				  	$grandoperator = 0;
					  $tmpgrandoperator = number_format($grandoperator);
					  $tmpgrandpartner = number_format($grandpartner);
					  $tmpgrandpencipta = number_format($grandpencipta);
					  $tmpgrandaop = number_format($grandoperator - $grandpartner - $grandpencipta);
				  } else {
					  $tmpgrandoperator = number_format($grandoperator);
					  $tmpgrandpartner = number_format($grandpartner);
					  $tmpgrandpencipta = number_format($grandpencipta);
					  $tmpgrandaop = number_format($grandoperator - $grandpartner - $grandpencipta);
				  }
				  ?>
                <tr>
                  <th>TOTAL</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <td>Total Revenue From Operator</td>
                  <td></td>
                  <td><?php echo $tmpgrandoperator?></td>
                </tr>
                <tr>
                  <td>Total Revenue From Partner</td>
                  <td></td>
                  <td><?php echo $tmpgrandpartner?></td>
                </tr>
                <tr>
                  <td>Total Revenue From Pencipta</td>
                  <td></td>
                  <td><?php echo $tmpgrandpencipta ?></td>
                  
                </tr>
                <tr>
                  <td>Total Revenue From AlphaOmega</td>
                  <td></td>
                  <td><?php echo $tmpgrandaop ?></td>
                </tr>
              </table>
            </div>
            </div>
          </div>
        </div>
      
    </section>
    <!-- /.content -->
    </div>
<?php
  $this->load->view('parts/V_Footer');
?>
