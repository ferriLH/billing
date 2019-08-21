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

					  ?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Rp.<?php echo $ops->operator?></th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <td>Total Revenue From Operator</td>
                  <td></td>
                  <td>Rp.<?php echo $tempSumOp?></td>
                </tr>
                <tr>
                  <td>Total Revenue From Partner</td>
					<?php $grandpartner = 0; ?>
					<?php foreach ($this->M_Summary->get_sh_partner($ops->id,$month) as $shpart){?>
                  <?php $totalpartner = $totalpartner + $shpart->share ;
                  $tmptotalpartner = number_format($totalpartner);
						$grandpartner= $grandpartner + $totalpartner;
						?>
					<?php }?>
                  		<td>Rp.<?php echo $tmptotalpartner; ?></td>
                  <td></td>

                </tr>
                <tr>
                  <td>Total Revenue From Pencipta</td>
					<?php $grandoperator = 0; ?>
					  <?php foreach ($this->M_Summary->get_sh_pencipta($ops->id,$month) as $shpencipta){?>
						  <?php $totalpencipta = $totalpencipta + $shpencipta->share; $tmptotalpencipta = number_format($totalpencipta);
						  $grandoperator=$grandoperator+$totalpencipta;?>
					  <?php }?>
                  <td>Rp.<?php echo $tmptotalpencipta?></td>
                  <td></td>

                </tr>
                <tr>
                  <td>Total Revenue From AlphaOmega</td>
					<?php $tmprevaop = number_format($sum->sum - $shpencipta->share - $shpart->share);?>
                  <td>Rp.<?php echo $tmprevaop?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Total</b>  </td>
                  <td>Rp. <?php echo $tempSumOp?></td>
                  <td>Rp. <?php echo $tempSumOp?></td>
                </tr>
              </table>
            </div>
			<?php }}?>





            <div class="box-body">
              <table class="table table-bordered">
				  <?php $tmpgrandoperator = number_format($grandoperator);
				  		$tmpgrandpartner = number_format($grandpartner);
				  ?>
                <tr>
                  <th>TOTAL</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <td>Total Revenue From Operator</td>
                  <td></td>
                  <td>Rp. <?php echo $tmpgrandoperator?></td>
                </tr>
                <tr>
                  <td>Total Revenue From Partner</td>
                  <td>331313</td>
                  <td>Rp.<?php echo $tmpgrandpartner?></td>
                </tr>
                <tr>
                  <td>Total Revenue From Pencipta</td>
                  <td>ACAN AJG</td>
                  <td>  </td>
                  
                </tr>
                <tr>
                  <td>Total Revenue From AlphaOmega</td>
                  <td>DUAR</td>
                  <td>MEMEK</td>
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
