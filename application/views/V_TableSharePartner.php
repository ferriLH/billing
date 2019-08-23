  <?php
  $this->load->view('parts/V_Header');
  $this->load->view('parts/V_Navigation');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	  <section class="content-header">
		  <h1>
			  <?php echo $title;?>
			  <small> <?php echo $partner[0]['namaPartner'];?></small>
		  </h1>
		  <ol class="breadcrumb">
			  <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a></li>
			  <li class="active"><?php echo $title?></li>
		  </ol>
	  </section>

    <!-- Main content -->
    <section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<?php
				$dateObjD   = DateTime::createFromFormat('!m', $dari);
				$dateObjS   = DateTime::createFromFormat('!m', $sampai);
				$dariName 	= $dateObjD->format('F');
				$sampaiName = $dateObjS->format('F');
				?>
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>TELKOMSEL</center></h2>
				<table id="tabelSharePartner1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$op=1;
					$no=1;
					$totaln1=0;
					$totaln2=0;
					$totaln3=0;
					$totaln4=0;
					$totaln5=0;
					$totaln6=0;
					$totaln7=0;
					$totalrevenue=0;
					$totalsh=0;
					$bayar=0;
					$share=0;
					foreach ($getRBT as $rbt){
						$pkode = $this->M_Sharepartner->get_kode($op,$rbt['id']);
						if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
						$traffic = $this->M_Sharepartner->getTraf($kode,$monthdari,$op);
						if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
						if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
						if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
						if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
						if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
						if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
						if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
						$getPrice = $this->M_Sharepartner->getPrice($op,$monthdari);
						if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
						if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
						if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
						if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
						if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
						if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
						if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
						$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
						if ($op==1&&$part=='68'&&$monthdari=='201012'&&$kode=='2363642')
						{
							$rev=0.500;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($op==1&&$part=='68'&&$monthdari=='201101'&&$kode=='2363642')
						{
							$rev=0.500;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($op==1&&$part=='68'&&$monthdari=='201102'&&$kode=='2363642')
						{
							$rev=0.500;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($op==1&&$part=='118'&&$monthdari=='201012'&&$kode=='2363646')
						{
							$rev=0.500;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($op==1&&$part=='118'&&$monthdari=='201101'&&$kode=='2363646')
						{
							$rev=0.500;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($op==1&&$part=='118'&&$monthdari=='201102'&&$kode=='2363646')
						{
							$rev=0.500;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($type==1)
						{
							if (($rev=='0.625'||$rev=='0.7'))
							{
								$rev=$rev;
							}
							$share=round($totalrev*$rev);
							$persen=($rev*100).'%';
						}
						//rbt mamah dedeh change
						if ($op==1&&$part=='99'&&$monthdari>='201101'&&$kode=='2363232')
						{
							$rev=0;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($op==1&&$part=='99'&&$monthdari>='201101'&&$kode=='2363233')
						{
							$rev=0;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}
						if ($op==1&&$part=='99'&&$monthdari>='201101'&&$kode=='2363234')
						{
							$rev=0;
							$share=round($totalrev.$rev);
							$persen=($rev*100).'%';
						}//end of mama dedeh rbt change

						else if ($type==2)
						{
//							$getShare = $this->M_Sharepartner->getShare($op,$part);
//							$share=round(($n1*$resshare[s1])+($n2*$resshare[s2])+($n3*$resshare[s3])+($n4*$resshare[s4])+($n5*$resshare[s5])+($n6*$resshare[s6])+($n7*$resshare[s7]));
							$share = 0;
							$persen='-';
						}
						$tmpshare=number_format($share);
						$totaln1=$totaln1+$n1;
						$totaln2=$totaln2+$n2;
						$totaln3=$totaln3+$n3;
						$totaln4=$totaln4+$n4;
						$totaln5=$totaln5+$n5;
						$totaln6=$totaln6+$n6;
						$totaln7=$totaln7+$n7;
						$totalrevenue=$totalrevenue+$totalrev;
						$totalsh=$totalsh+$share;
						$tmptotalrev=number_format($totalrev);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdTsel']?></td>
							<td><?php echo $n1?></td>
							<td><?php echo $n2?></td>
							<td><?php echo $n3?></td>
							<td><?php echo $n4?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>TOTAL SHARE</th>
                  <th>0</th>
                </tr>
                <tr>
                  <th>-4,5%</th>
                  <th>0</th>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>
    <!-- /.content -->
	   <section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>INDOSAT</center></h2>
				<table id="tabelSharePartner2" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=2;$no=1; foreach ($getRBT as $rbt){
						$pkode = $this->M_Sharepartner->get_kode($op,$rbt['id']);
						if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
						$traffic = $this->M_Sharepartner->getTraf($rbt['id'],$monthdari,$op);
						if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
						if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
						if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
						if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
						if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
						if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
						if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
						$getPrice = $this->M_Sharepartner->getPrice($op,$monthdari);
						if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
						if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
						if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
						if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
						if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
						if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
						if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
						//$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdIsat']?></td>
							<td><?php echo $n1?></td>
							<td><?php echo $n2?></td>
							<td><?php echo $n3?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>TOTAL SHARE</th>
                  <th>0</th>
                </tr>
                <tr>
                  <th>-4,5%</th>
                  <th>0</th>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>

	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>XL</center></h2>
				<table id="tabelSharePartner3" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=3;$no=1; foreach ($getRBT as $rbt){
						$pkode = $this->M_Sharepartner->get_kode($op,$rbt['id']);
						if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
						$traffic = $this->M_Sharepartner->getTraf($rbt['id'],$monthdari,$op);
						if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
						if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
						if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
						if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
						if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
						if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
						if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
						$getPrice = $this->M_Sharepartner->getPrice($op,$monthdari);
						if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
						if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
						if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
						if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
						if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
						if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
						if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
						//$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
						if ($op==3) $totalrev=($n1*$p1)+$n2+($n3*$p3);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdXL']?></td>
							<td><?php echo $n1?></td>
							<td><?php echo $n2?></td>
							<td><?php echo $n3?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>TOTAL SHARE</th>
                  <th>0</th>
                </tr>
                <tr>
                  <th>-4,5%</th>
                  <th>0</th>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>

	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>FLEXI</center></h2>
				<table id="tabelSharePartner4" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=6;$no=1; foreach ($getRBT as $rbt){
						$pkode = $this->M_Sharepartner->get_kode($op,$rbt['id']);
						if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
						$traffic = $this->M_Sharepartner->getTraf($rbt['id'],$monthdari,$op);
						if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
						if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
						if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
						if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
						if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
						if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
						if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
						$getPrice = $this->M_Sharepartner->getPrice($op,$monthdari);
						if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
						if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
						if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
						if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
						if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
						if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
						if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
						//$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdFlexi']?></td>
							<td><?php echo $n1?></td>
							<td><?php echo $n2?></td>
							<td><?php echo $n3?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>TOTAL SHARE</th>
                  <th>0</th>
                </tr>
                <tr>
                  <th>-4,5%</th>
                  <th>0</th>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>

	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>MOBILE8</center></h2>
				<table id="tabelSharePartner5" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=5;$no=1; foreach ($getRBT as $rbt){
						$pkode = $this->M_Sharepartner->get_kode($op,$rbt['id']);
						if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
						$traffic = $this->M_Sharepartner->getTraf($rbt['id'],$monthdari,$op);
						if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
						if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
						if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
						if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
						if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
						if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
						if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
						$getPrice = $this->M_Sharepartner->getPrice($op,$monthdari);
						if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
						if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
						if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
						if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
						if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
						if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
						if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
						//$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php echo $rbt['kdM8']?></td>
							<td><?php echo $n1?></td>
							<td><?php echo $n2?></td>
							<td><?php echo $n3?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>TOTAL SHARE</th>
                  <th>0</th>
                </tr>
                <tr>
                  <th>-4,5%</th>
                  <th>0</th>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>

	<section class="content container-fluid">
		<div class="box box-primary">
			<div class="box-header">
				<a href="<?php echo base_url('partner/add')?>">
					<button type="button" class="btn btn-info" style="float: right;"><i class="glyphicon glyphicon-download-alt"></i></button> <br> <br>
				</a>
			</div>
            <!-- /.box-header -->
			<div class="box-body">
				<h4><center><?php echo $dariName." until ".$sampaiName." ".$tahun?></center></h4>
				<h2><center>ESIA</center></h2>
				<table id="tabelSharePartner6" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Artis</th>
						<th>Kode</th>
						<th>Download</th>
						<th>Renew</th>
						<th>Campaign</th>
						<th>Special</th>
						<th>Micro Charging</th>
						<th>n6</th>
						<th>n7</th>
						<th>Share</th>
						<th>Total Revenue</th>
					</tr>
					</thead>
					<tbody>
					<?php $op=4;$no=1; foreach ($getRBT as $rbt){
						$pkode = $this->M_Sharepartner->get_kode($op,$rbt['id']);
						if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
						$traffic = $this->M_Sharepartner->getTraf($rbt['id'],$monthdari,$op);
						if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
						if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
						if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
						if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
						if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
						if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
						if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
						$getPrice = $this->M_Sharepartner->getPrice($op,$monthdari);
						if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
						if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
						if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
						if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
						if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
						if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
						if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
						//$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $rbt['judul']?></td>
							<td><?php echo $rbt['artis']?></td>
							<td><?php ?></td>
							<td><?php echo $n1?></td>
							<td><?php echo $n2?></td>
							<td><?php echo $n3?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
				<div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>TOTAL SHARE</th>
                  <th>0</th>
                </tr>
                <tr>
                  <th>-4,5%</th>
                  <th>0</th>
                </tr>
              </table>
            </div>
			</div>
            <!-- /.box-body -->

		</div>
	</section>

	<section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <center> <h3 class="box-title"><b>SHARE PARTNER</b></h3> <br></center>
             <center> <h4>PMM(Mobid)</h4></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>OPERATOR</th>
                  <th>$bulan</th>
                  <th>TOTAL</th>
                </tr>
                <tr>
                  <td>TELKOMSEL</td>
                  <td>3123131</td>
                  <td>25.000000</td>
                </tr>
                <tr>
                  <td>INDOSAT</td>
                  <td>331313</td>
                  <td>13131</td>
                </tr>
                <tr>
                  <td>XL</td>
                  <td>Cron job running</td>
                  <td>  </td>
                  
                </tr>
                <tr>
                  <td>FLEXI</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>MOBILE8</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>ESIA</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>GRAND</b>  </td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
