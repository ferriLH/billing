<?php
//error_reporting(E_ALL^E_NOTICE);
set_time_limit(0);
$this->load->view('parts/V_Header');
$this->load->view('parts/V_Navigation');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $title;?>
<!--			<small> --><?php //echo $pencipta[0]['namaPencipta'];?><!--</small>-->
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a></li>
			<li class="active"><?php echo $title?></li>
		</ol>
		<div class="clearfix" style="float: right">
			<button type="button" class="btn btn-primary" style=""><i class="glyphicon glyphicon-download-alt"></i></button>
			<button onclick="window.print();return false;" type="button" class="btn btn-primary" style=""><i class="glyphicon glyphicon-print"></i></button>
		</div>
	</section>
	<section class="clearfix"></section>
	<!-- Main content -->
	<?php
	$totalrekap = array(0,0,0,0,0,0,0);
	$grandtot = 0;
	$dari1=$dari;
	$dari2=$monthdari;$dari3=$monthdari;$dari4=$monthdari;$dari5=$monthdari;$dari6=$monthdari;$dari7=$monthdari;
	while ($monthdari <= $monthsampai) {
		$dateObjD   = DateTime::createFromFormat('!m', $dari);
		$dariName 	= $dateObjD->format('F');
		?>
		<section class="content container-fluid">
			<div class="box box-primary">
				<div class="box-header">

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><center><?php echo $dariName." ".$tahun?></center></h4>
					<h2><center>TELKOMSEL</center></h2>
					<table id="tabelSharePencipta1<?php echo $dari;?>" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Artis</th>
							<th>Kode</th>
							<th>Download</th>
							<th>Renew</th>
							<th>Campaign</th>
							<th>Rev Share</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$op=1;
						$no=1;
						$totaln1=0;$totaln2=0;$totaln3=0;$totaln4=0;$totaln5=0;$totaln6=0;$totaln7=0;
						$totalrevenue=0;
						$totalsh=0;
						$bayar=0;
						$share=0;
						foreach ($getRBT as $rbt){
							$pkode = $this->M_Sharepencipta->get_kode($op,$rbt['id']);
							if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
							if ($op==1 && $monthdari < '201106')
							{
								$traffic = $this->M_Sharepencipta->getTraf($kode,$monthdari,$op);
								if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
								if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
								if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
								if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
								if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
								if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
								if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
								$getPrice = $this->M_Sharepencipta->getPrice($op,$monthdari);
								if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
								if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
								if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
								if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
								if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
								if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
								if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
								$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
								if ($kode=='2340401'||$kode=='10905688'||$kode=='160514099'||$kode=='424040199'&&$penc=="425")
								{
									$rev=0.09;
									$share=round($totalrev.$rev);
									$persen=($rev*100).'%';
								}

								if ($kode=='2310411'||$kode=='10906205'||$kode=='110163399'||$kode=='421041199'&&$penc=="425")
								{
									$rev=0.09;
									$share=round($totalrev.$rev);
									$persen=($rev*100).'%';
								}

								if ($type==1)
								{
									$share=round($totalrev*$rev);
								}
								else if ($type==2)
								{
									$share = 0;
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
							}else if ($op==1 && $monthdari >= '201106'){
								$totaln8=0;$totaln9=0;$totaln10=0;$totaln11=0;$totaln12=0;$totaln13=0;$totaln14=0;$totaln15=0;$totaln16=0;$totaln17=0;
								$totaln18=0;$totaln19=0;$totaln20=0;$totaln21=0;$totaln22=0;$totaln23=0;$totaln24=0;$totaln25=0;$totaln26=0;
								$traffic = $this->M_Sharepencipta->getTrafTSEL($kode,$monthdari,$op);
								if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
								if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
								if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
								if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
								if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
								if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
								if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
								if (isset($traffic[0]['n8'])) {$n8=$traffic[0]['n8'];}else{$n8=0;}
								if (isset($traffic[0]['n9'])) {$n9=$traffic[0]['n9'];}else{$n9=0;}
								if (isset($traffic[0]['n10'])) {$n10=$traffic[0]['n10'];}else{$n10=0;}
								if (isset($traffic[0]['n11'])) {$n11=$traffic[0]['n11'];}else{$n11=0;}
								if (isset($traffic[0]['n12'])) {$n12=$traffic[0]['n12'];}else{$n12=0;}
								if (isset($traffic[0]['n13'])) {$n13=$traffic[0]['n13'];}else{$n13=0;}
								if (isset($traffic[0]['n14'])) {$n14=$traffic[0]['n14'];}else{$n14=0;}
								if (isset($traffic[0]['n15'])) {$n15=$traffic[0]['n15'];}else{$n15=0;}
								if (isset($traffic[0]['n16'])) {$n16=$traffic[0]['n16'];}else{$n16=0;}
								if (isset($traffic[0]['n17'])) {$n17=$traffic[0]['n17'];}else{$n17=0;}
								if (isset($traffic[0]['n18'])) {$n18=$traffic[0]['n18'];}else{$n18=0;}
								if (isset($traffic[0]['n19'])) {$n19=$traffic[0]['n19'];}else{$n19=0;}
								if (isset($traffic[0]['n20'])) {$n20=$traffic[0]['n20'];}else{$n20=0;}
								if (isset($traffic[0]['n21'])) {$n21=$traffic[0]['n21'];}else{$n21=0;}
								if (isset($traffic[0]['n22'])) {$n22=$traffic[0]['n22'];}else{$n22=0;}
								if (isset($traffic[0]['n23'])) {$n23=$traffic[0]['n23'];}else{$n23=0;}
								if (isset($traffic[0]['n24'])) {$n24=$traffic[0]['n24'];}else{$n24=0;}
								if (isset($traffic[0]['n25'])) {$n25=$traffic[0]['n25'];}else{$n25=0;}
								if (isset($traffic[0]['n26'])) {$n26=$traffic[0]['n26'];}else{$n26=0;}
								$getPrice = $this->M_Sharepencipta->getPriceTSEL($op,$monthdari);
								if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
								if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
								if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
								if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
								if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
								if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
								if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
								if (isset($getPrice[0]['p8'])) {$p8=$getPrice[0]['p8'];}else{$p8=0;}
								if (isset($getPrice[0]['p9'])) {$p9=$getPrice[0]['p9'];}else{$p9=0;}
								if (isset($getPrice[0]['p10'])) {$p10=$getPrice[0]['p10'];}else{$p10=0;}
								if (isset($getPrice[0]['p11'])) {$p11=$getPrice[0]['p11'];}else{$p11=0;}
								if (isset($getPrice[0]['p12'])) {$p12=$getPrice[0]['p12'];}else{$p12=0;}
								if (isset($getPrice[0]['p13'])) {$p13=$getPrice[0]['p13'];}else{$p13=0;}
								if (isset($getPrice[0]['p14'])) {$p14=$getPrice[0]['p14'];}else{$p14=0;}
								if (isset($getPrice[0]['p15'])) {$p15=$getPrice[0]['p15'];}else{$p15=0;}
								if (isset($getPrice[0]['p16'])) {$p16=$getPrice[0]['p16'];}else{$p16=0;}
								if (isset($getPrice[0]['p17'])) {$p17=$getPrice[0]['p17'];}else{$p17=0;}
								if (isset($getPrice[0]['p18'])) {$p18=$getPrice[0]['p18'];}else{$p18=0;}
								if (isset($getPrice[0]['p19'])) {$p19=$getPrice[0]['p19'];}else{$p19=0;}
								if (isset($getPrice[0]['p20'])) {$p20=$getPrice[0]['p20'];}else{$p20=0;}
								if (isset($getPrice[0]['p21'])) {$p21=$getPrice[0]['p21'];}else{$p21=0;}
								if (isset($getPrice[0]['p22'])) {$p22=$getPrice[0]['p22'];}else{$p22=0;}
								if (isset($getPrice[0]['p23'])) {$p23=$getPrice[0]['p23'];}else{$p23=0;}
								if (isset($getPrice[0]['p24'])) {$p24=$getPrice[0]['p24'];}else{$p24=0;}
								if (isset($getPrice[0]['p25'])) {$p25=$getPrice[0]['p25'];}else{$p25=0;}
								if (isset($getPrice[0]['p26'])) {$p26=$getPrice[0]['p26'];}else{$p26=0;}
								$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7)+
									($n8*$p8)+($n9*$p9)+($n10*$p10)+($n11*$p11)+($n12*$p12)+($n13*$p13)+($n14*$p14)+
									($n15*$p15)+($n16*$p16)+($n17*$p17)+($n18*$p18)+($n19*$p19)+($n20*$p20)+($n21*$p21)+
									($n22*$p22)+($n23*$p23)+($n24*$p24)+($n25*$p25)+($n26*$p26);
								if ($kode=='2340401'||$kode=='10905688'||$kode=='160514099'||$kode=='424040199'&&$penc=="425")
								{
									$rev=0.09;
									$share=round($totalrev.$rev);
									$persen=($rev*100).'%';
								}

								if ($kode=='2310411'||$kode=='10906205'||$kode=='110163399'||$kode=='421041199'&&$penc=="425")
								{
									$rev=0.09;
									$share=round($totalrev.$rev);
									$persen=($rev*100).'%';
								}

								if ($type==1)
								{
									$share=round($totalrev*$rev);
								}
								else if ($type==2)
								{
									$share = 0;
								}
								$tmpshare=number_format($share);
								$totaln1=$totaln1+$n1;
								$totaln2=$totaln2+$n2;
								$totaln3=$totaln3+$n3;
								$totaln4=$totaln4+$n4;
								$totaln5=$totaln5+$n5;
								$totaln6=$totaln6+$n6;
								$totaln7=$totaln7+$n7;
								$totaln8=$totaln8+$n8;
								$totaln9=$totaln9+$n9;
								$totaln10=$totaln10+$n10;
								$totaln11=$totaln11+$n11;
								$totaln12=$totaln12+$n12;
								$totaln13=$totaln13+$n13;
								$totaln14=$totaln14+$n14;
								$totaln15=$totaln15+$n15;
								$totaln16=$totaln16+$n16;
								$totaln17=$totaln17+$n17;
								$totaln18=$totaln18+$n18;
								$totaln19=$totaln19+$n19;
								$totaln20=$totaln20+$n20;
								$totaln21=$totaln21+$n21;
								$totaln22=$totaln22+$n22;
								$totaln23=$totaln23+$n23;
								$totaln24=$totaln24+$n24;
								$totaln25=$totaln25+$n25;
								$totaln26=$totaln26+$n26;
								$totalrevenue=$totalrevenue+$totalrev;
								$totalsh=$totalsh+$share;
								$tmptotalrev=number_format($totalrev);
							}
							?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $rbt['judul']?></td>
								<td><?php echo $rbt['artis']?></td>
								<td><?php echo $rbt['kdTsel']?></td>
								<td><?php echo $n1?></td>
								<td><?php echo $n2?></td>
								<td><?php echo $n3?></td>
								<td><?php echo $tmpshare?></td>
							</tr>
							<?php
							$no++;}
						$getPajak=$this->M_Sharepencipta->getPajak($tahun);
						if (isset($getPajak[0]['besaran'])) {$resPajak=$getPajak[0]['besaran'];}else{$resPajak=0;}
						if ($monthdari>"200809") {
							$pajak = 0.02;
						}
						else if (substr($monthdari,4,1) == "9") {
							$pajak = 0.02;
						}
						else {
							$pajak = 0.045;
						}
						$bayar=$totalsh;
						//$bayar=$totalsh-($totalsh*$respajak[besaran]);
						//$bayar=$totalsh-($totalsh*$pajak);
						$besarpajak=$resPajak*100;
						//$besarpajak=$pajak*100;
						$bayar=round($bayar);
						$tmptotalsh=number_format($totalsh);
						$tmpbayar=number_format($bayar);
						$tmptotalrevenue=number_format($totalrevenue);
						$tgl=date("Y-m-d");
						?>

						</tbody>
						<tfoot>
							<tr>
								<td class="text-bold text-right" colspan="4">Total</td>
								<td><?php echo $totaln1?></td>
								<td><?php echo $totaln2?></td>
								<td><?php echo $totaln3?></td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">Total Share</td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">-4,5%</td>
								<td><?php echo $tmpbayar?></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
				<?php
				//			$grandtot = 0;
				//$totalrekap = array();
				$rows=$op.$monthdari;
				//$rekap[$rows]=$tmpbayar;
				$rekap[$rows]=$tmptotalsh;
				$totalrekap[$op]=$totalrekap[$op]+$bayar;
				$tmptotalrekap[$op]=number_format($totalrekap[$op]);
				$grandtot=$grandtot+$bayar;
				?>
			</div>
		</section>
		<section class="content container-fluid">
			<div class="box box-primary">
				<div class="box-header">

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><center><?php echo $dariName." ".$tahun?></center></h4>
					<h2><center>INDOSAT</center></h2>
					<table id="tabelSharePencipta2<?php echo $dari;?>" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Artis</th>
							<th>Kode</th>
							<th>Download</th>
							<th>Renew</th>
							<th>Campaign</th>
							<th>Rev Share</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$op=2;
						$no=1;
						$totaln1=0;$totaln2=0;$totaln3=0;$totaln4=0;$totaln5=0;$totaln6=0;$totaln7=0;
						$totalrevenue=0;
						$totalsh=0;
						$bayar=0;
						$share=0;
						foreach ($getRBT as $rbt){
							$pkode = $this->M_Sharepencipta->get_kode($op,$rbt['id']);
							if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
							$traffic = $this->M_Sharepencipta->getTraf($kode,$monthdari,$op);
							if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
							if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
							if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
							if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
							if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
							if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
							if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
							$getPrice = $this->M_Sharepencipta->getPrice($op,$monthdari);
							if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
							if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
							if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
							if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
							if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
							if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
							if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
							$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
							if ($kode=='2340401'||$kode=='10905688'||$kode=='160514099'||$kode=='424040199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($kode=='2310411'||$kode=='10906205'||$kode=='110163399'||$kode=='421041199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($type==1)
							{
								$share=round($totalrev*$rev);
							}
							else if ($type==2)
							{
								$share = 0;
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
								<td><?php echo $rbt['kdIsat']?></td>
								<td><?php echo $n1?></td>
								<td><?php echo $n2?></td>
								<td><?php echo $n3?></td>
								<td><?php echo $tmpshare?></td>
							</tr>
							<?php
							$no++;}
						$getPajak=$this->M_Sharepencipta->getPajak($tahun);
						if (isset($getPajak[0]['besaran'])) {$resPajak=$getPajak[0]['besaran'];}else{$resPajak=0;}
						if ($monthdari>"200809") {
							$pajak = 0.02;
						}
						else if (substr($monthdari,4,1) == "9") {
							$pajak = 0.02;
						}
						else {
							$pajak = 0.045;
						}
						$bayar=$totalsh;
						//$bayar=$totalsh-($totalsh*$respajak[besaran]);
						//$bayar=$totalsh-($totalsh*$pajak);
						$besarpajak=$resPajak*100;
						//$besarpajak=$pajak*100;
						$bayar=round($bayar);
						$tmptotalsh=number_format($totalsh);
						$tmpbayar=number_format($bayar);
						$tmptotalrevenue=number_format($totalrevenue);
						$tgl=date("Y-m-d");
						?>
						</tbody>
						<tfoot>
							<tr>
								<td class="text-bold text-right" colspan="4">Total</td>
								<td><?php echo $totaln1?></td>
								<td><?php echo $totaln2?></td>
								<td><?php echo $totaln3?></td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">Total Share</td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">-4,5%</td>
								<td><?php echo $tmpbayar?></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
				<?php
				//$grandtot = 0;
				//$totalrekap = array();
				$rows=$op.$monthdari;
				//$rekap[$rows]=$tmpbayar;
				$rekap[$rows]=$tmptotalsh;
				$totalrekap[$op]=$totalrekap[$op]+$bayar;
				$tmptotalrekap[$op]=number_format($totalrekap[$op]);
				$grandtot=$grandtot+$bayar;
				?>
			</div>
		</section>

		<section class="content container-fluid">
			<div class="box box-primary">
				<div class="box-header">

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><center><?php echo $dariName." ".$tahun?></center></h4>
					<h2><center>XL</center></h2>
					<table id="tabelSharePencipta3<?php echo $dari;?>" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Artis</th>
							<th>Kode</th>
							<th>Download</th>
							<th>Renew</th>
							<th>Campaign</th>
							<th>Rev Share</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$op=3;
						$no=1;
						$totaln1=0;$totaln2=0;$totaln3=0;$totaln4=0;$totaln5=0;$totaln6=0;$totaln7=0;
						$totalrevenue=0;
						$totalsh=0;
						$bayar=0;
						$share=0;
						foreach ($getRBT as $rbt){
							$pkode = $this->M_Sharepencipta->get_kode($op,$rbt['id']);
							if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
							$traffic = $this->M_Sharepencipta->getTraf($kode,$monthdari,$op);
							if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
							if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
							if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
							if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
							if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
							if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
							if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
							$getPrice = $this->M_Sharepencipta->getPrice($op,$monthdari);
							if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
							if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
							if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
							if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
							if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
							if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
							if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
							$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
							if ($op==3){
								$totalrev=($n1*$p1)+$n2+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
							}
							if ($kode=='2340401'||$kode=='10905688'||$kode=='160514099'||$kode=='424040199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($kode=='2310411'||$kode=='10906205'||$kode=='110163399'||$kode=='421041199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($type==1)
							{
								$share=round($totalrev*$rev);
							}
							else if ($type==2)
							{
								$share = 0;
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
								<td><?php echo $rbt['kdIsat']?></td>
								<td><?php echo $n1?></td>
								<td><?php echo $n2?></td>
								<td><?php echo $n3?></td>
								<td><?php echo $tmpshare?></td>
							</tr>
							<?php
							$no++;}
						$getPajak=$this->M_Sharepencipta->getPajak($tahun);
						if (isset($getPajak[0]['besaran'])) {$resPajak=$getPajak[0]['besaran'];}else{$resPajak=0;}
						if ($monthdari>"200809") {
							$pajak = 0.02;
						}
						else if (substr($monthdari,4,1) == "9") {
							$pajak = 0.02;
						}
						else {
							$pajak = 0.045;
						}
						$bayar=$totalsh;
						//$bayar=$totalsh-($totalsh*$respajak[besaran]);
						//$bayar=$totalsh-($totalsh*$pajak);
						$besarpajak=$resPajak*100;
						//$besarpajak=$pajak*100;
						$bayar=round($bayar);
						$tmptotalsh=number_format($totalsh);
						$tmpbayar=number_format($bayar);
						$tmptotalrevenue=number_format($totalrevenue);
						$tgl=date("Y-m-d");
						?>
						</tbody>
						<tfoot>
							<tr>
								<td class="text-bold text-right" colspan="4">Total</td>
								<td><?php echo $totaln1?></td>
								<td><?php echo $totaln2?></td>
								<td><?php echo $totaln3?></td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">Total Share</td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">-4,5%</td>
								<td><?php echo $tmpbayar?></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
				<?php
				//$grandtot = 0;
				//$totalrekap = array();
				$rows=$op.$monthdari;
				//$rekap[$rows]=$tmpbayar;
				$rekap[$rows]=$tmptotalsh;
				$totalrekap[$op]=$totalrekap[$op]+$bayar;
				$tmptotalrekap[$op]=number_format($totalrekap[$op]);
				$grandtot=$grandtot+$bayar;
				?>
			</div>
		</section>
		<section class="content container-fluid">
			<div class="box box-primary">
				<div class="box-header">

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><center><?php echo $dariName." ".$tahun?></center></h4>
					<h2><center>FLEXI</center></h2>
					<table id="tabelSharePencipta4<?php echo $dari;?>" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Artis</th>
							<th>Kode</th>
							<th>Download</th>
							<th>Renew</th>
							<th>Campaign</th>
							<th>Rev Share</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$op=6;
						$no=1;
						$totaln1=0;$totaln2=0;$totaln3=0;$totaln4=0;$totaln5=0;$totaln6=0;$totaln7=0;
						$totalrevenue=0;
						$totalsh=0;
						$bayar=0;
						$share=0;
						foreach ($getRBT as $rbt){
							$pkode = $this->M_Sharepencipta->get_kode($op,$rbt['id']);
							if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
							$traffic = $this->M_Sharepencipta->getTraf($kode,$monthdari,$op);
							if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
							if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
							if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
							if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
							if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
							if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
							if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
							$getPrice = $this->M_Sharepencipta->getPrice($op,$monthdari);
							if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
							if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
							if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
							if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
							if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
							if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
							if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
							$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
							if ($kode=='2340401'||$kode=='10905688'||$kode=='160514099'||$kode=='424040199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($kode=='2310411'||$kode=='10906205'||$kode=='110163399'||$kode=='421041199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($type==1)
							{
								$share=round($totalrev*$rev);
							}
							else if ($type==2)
							{
								$share = 0;
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
								<td><?php echo $rbt['kdIsat']?></td>
								<td><?php echo $n1?></td>
								<td><?php echo $n2?></td>
								<td><?php echo $n3?></td>
								<td><?php echo $tmpshare?></td>
							</tr>
							<?php
							$no++;}
						$getPajak=$this->M_Sharepencipta->getPajak($tahun);
						if (isset($getPajak[0]['besaran'])) {$resPajak=$getPajak[0]['besaran'];}else{$resPajak=0;}
						if ($monthdari>"200809") {
							$pajak = 0.02;
						}
						else if (substr($monthdari,4,1) == "9") {
							$pajak = 0.02;
						}
						else {
							$pajak = 0.045;
						}
						$bayar=$totalsh;
						//$bayar=$totalsh-($totalsh*$respajak[besaran]);
						//$bayar=$totalsh-($totalsh*$pajak);
						$besarpajak=$resPajak*100;
						//$besarpajak=$pajak*100;
						$bayar=round($bayar);
						$tmptotalsh=number_format($totalsh);
						$tmpbayar=number_format($bayar);
						$tmptotalrevenue=number_format($totalrevenue);
						$tgl=date("Y-m-d");
						?>
						</tbody>
						<tfoot>
							<tr>
								<td class="text-bold text-right" colspan="4">Total</td>
								<td><?php echo $totaln1?></td>
								<td><?php echo $totaln2?></td>
								<td><?php echo $totaln3?></td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">Total Share</td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">-4,5%</td>
								<td><?php echo $tmpbayar?></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
				<?php
				//$grandtot = 0;
				//$totalrekap = array();
				$rows=$op.$monthdari;
				//$rekap[$rows]=$tmpbayar;
				$rekap[$rows]=$tmptotalsh;
				$totalrekap[$op]=$totalrekap[$op]+$bayar;
				$tmptotalrekap[$op]=number_format($totalrekap[$op]);
				$grandtot=$grandtot+$bayar;
				?>
			</div>
		</section>

		<section class="content container-fluid">
			<div class="box box-primary">
				<div class="box-header">

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><center><?php echo $dariName." ".$tahun?></center></h4>
					<h2><center>MOBILE8</center></h2>
					<table id="tabelSharePencipta5<?php echo $dari;?>" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Artis</th>
							<th>Kode</th>
							<th>Download</th>
							<th>Renew</th>
							<th>Campaign</th>
							<th>Rev Share</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$op=5;
						$no=1;
						$totaln1=0;$totaln2=0;$totaln3=0;$totaln4=0;$totaln5=0;$totaln6=0;$totaln7=0;
						$totalrevenue=0;
						$totalsh=0;
						$bayar=0;
						$share=0;
						foreach ($getRBT as $rbt){
							$pkode = $this->M_Sharepencipta->get_kode($op,$rbt['id']);
							if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
							$traffic = $this->M_Sharepencipta->getTraf($kode,$monthdari,$op);
							if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
							if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
							if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
							if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
							if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
							if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
							if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
							$getPrice = $this->M_Sharepencipta->getPrice($op,$monthdari);
							if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
							if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
							if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
							if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
							if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
							if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
							if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
							$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
							if ($kode=='2340401'||$kode=='10905688'||$kode=='160514099'||$kode=='424040199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($kode=='2310411'||$kode=='10906205'||$kode=='110163399'||$kode=='421041199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($type==1)
							{
								$share=round($totalrev*$rev);
							}
							else if ($type==2)
							{
								$share = 0;
							}
							$tmpshare=number_format($share);
							$totaln1=$totaln1+$n1;
							$totaln2=$totaln2+$n2;
							$totaln3=$totaln3+$n3;
							$tmptotalrev=number_format($totalrev);
							?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $rbt['judul']?></td>
								<td><?php echo $rbt['artis']?></td>
								<td><?php echo $rbt['kdIsat']?></td>
								<td><?php echo $n1?></td>
								<td><?php echo $n2?></td>
								<td><?php echo $n3?></td>
								<td><?php echo $tmpshare?></td>
							</tr>
							<?php
							$no++;}
						$getPajak=$this->M_Sharepencipta->getPajak($tahun);
						if (isset($getPajak[0]['besaran'])) {$resPajak=$getPajak[0]['besaran'];}else{$resPajak=0;}
						if ($monthdari>"200809") {
							$pajak = 0.02;
						}
						else if (substr($monthdari,4,1) == "9") {
							$pajak = 0.02;
						}
						else {
							$pajak = 0.045;
						}
						$bayar=$totalsh;
						//$bayar=$totalsh-($totalsh*$respajak[besaran]);
						//$bayar=$totalsh-($totalsh*$pajak);
						$besarpajak=$resPajak*100;
						//$besarpajak=$pajak*100;
						$bayar=round($bayar);
						$tmptotalsh=number_format($totalsh);
						$tmpbayar=number_format($bayar);
						$tmptotalrevenue=number_format($totalrevenue);
						$tgl=date("Y-m-d");
						?>
						</tbody>
						<tfoot>
							<tr>
								<td class="text-bold text-right" colspan="4">Total</td>
								<td><?php echo $totaln1?></td>
								<td><?php echo $totaln2?></td>
								<td><?php echo $totaln3?></td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">Total Share</td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">-4,5%</td>
								<td><?php echo $tmpbayar?></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
				<?php
				//$grandtot = 0;
				//$totalrekap = array();
				$rows=$op.$monthdari;
				//$rekap[$rows]=$tmpbayar;
				$rekap[$rows]=$tmptotalsh;
				$totalrekap[$op]=$totalrekap[$op]+$bayar;
				$tmptotalrekap[$op]=number_format($totalrekap[$op]);
				$grandtot=$grandtot+$bayar;
				?>
			</div>
		</section>
		<section class="content container-fluid">
			<div class="box box-primary">
				<div class="box-header">

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><center><?php echo $dariName." ".$tahun?></center></h4>
					<h2><center>ESIA</center></h2>
					<table id="tabelSharePencipta6<?php echo $dari;?>" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Artis</th>
							<th>Kode</th>
							<th>Download</th>
							<th>Renew</th>
							<th>Campaign</th>
							<th>Rev Share</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$op=4;
						$no=1;
						$totaln1=0;$totaln2=0;$totaln3=0;$totaln4=0;$totaln5=0;$totaln6=0;$totaln7=0;
						$totalrevenue=0;
						$totalsh=0;
						$bayar=0;
						$share=0;
						foreach ($getRBT as $rbt){
							$pkode = $this->M_Sharepencipta->get_kode($op,$rbt['id']);
							if (isset($pkode[0]['kode'])) {$kode = $pkode[0]['kode'];}else{$kode=0;}
							$traffic = $this->M_Sharepencipta->getTraf($kode,$monthdari,$op);
							if (isset($traffic[0]['n1'])) {$n1=$traffic[0]['n1'];}else{$n1=0;}
							if (isset($traffic[0]['n2'])) {$n2=$traffic[0]['n2'];}else{$n2=0;}
							if (isset($traffic[0]['n3'])) {$n3=$traffic[0]['n3'];}else{$n3=0;}
							if (isset($traffic[0]['n4'])) {$n4=$traffic[0]['n4'];}else{$n4=0;}
							if (isset($traffic[0]['n5'])) {$n5=$traffic[0]['n5'];}else{$n5=0;}
							if (isset($traffic[0]['n6'])) {$n6=$traffic[0]['n6'];}else{$n6=0;}
							if (isset($traffic[0]['n7'])) {$n7=$traffic[0]['n7'];}else{$n7=0;}
							$getPrice = $this->M_Sharepencipta->getPrice($op,$monthdari);
							if (isset($getPrice[0]['p1'])) {$p1=$getPrice[0]['p1'];}else{$p1=0;}
							if (isset($getPrice[0]['p2'])) {$p2=$getPrice[0]['p2'];}else{$p2=0;}
							if (isset($getPrice[0]['p3'])) {$p3=$getPrice[0]['p3'];}else{$p3=0;}
							if (isset($getPrice[0]['p4'])) {$p4=$getPrice[0]['p4'];}else{$p4=0;}
							if (isset($getPrice[0]['p5'])) {$p5=$getPrice[0]['p5'];}else{$p5=0;}
							if (isset($getPrice[0]['p6'])) {$p6=$getPrice[0]['p6'];}else{$p6=0;}
							if (isset($getPrice[0]['p7'])) {$p7=$getPrice[0]['p7'];}else{$p7=0;}
							$totalrev=($n1*$p1)+($n2*$p2)+($n3*$p3)+($n4*$p4)+($n5*$p5)+($n6*$p6)+($n7*$p7);
							if ($kode=='2340401'||$kode=='10905688'||$kode=='160514099'||$kode=='424040199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($kode=='2310411'||$kode=='10906205'||$kode=='110163399'||$kode=='421041199'&&$penc=="425")
							{
								$rev=0.09;
								$share=round($totalrev.$rev);
								$persen=($rev*100).'%';
							}

							if ($type==1)
							{
								$share=round($totalrev*$rev);
							}
							else if ($type==2)
							{
								$share = 0;
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
								<td><?php echo $rbt['kdIsat']?></td>
								<td><?php echo $n1?></td>
								<td><?php echo $n2?></td>
								<td><?php echo $n3?></td>
								<td><?php echo $tmpshare?></td>
							</tr>
							<?php
							$no++;}
						$getPajak=$this->M_Sharepencipta->getPajak($tahun);
						if (isset($getPajak[0]['besaran'])) {$resPajak=$getPajak[0]['besaran'];}else{$resPajak=0;}
						if ($monthdari>"200809") {
							$pajak = 0.02;
						}
						else if (substr($monthdari,4,1) == "9") {
							$pajak = 0.02;
						}
						else {
							$pajak = 0.045;
						}
						$bayar=$totalsh;
						//$bayar=$totalsh-($totalsh*$respajak[besaran]);
						//$bayar=$totalsh-($totalsh*$pajak);
						$besarpajak=$resPajak*100;
						//$besarpajak=$pajak*100;
						$bayar=round($bayar);
						$tmptotalsh=number_format($totalsh);
						$tmpbayar=number_format($bayar);
						$tmptotalrevenue=number_format($totalrevenue);
						$tgl=date("Y-m-d");
						?>
						</tbody>
						<tfoot>
							<tr>
								<td class="text-bold text-right" colspan="4">Total</td>
								<td><?php echo $totaln1?></td>
								<td><?php echo $totaln2?></td>
								<td><?php echo $totaln3?></td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">Total Share</td>
								<td><?php echo $tmptotalsh?></td>
							</tr>
							<tr>
								<td class="text-bold text-right" colspan="7">-4,5%</td>
								<td><?php echo $tmpbayar?></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
				<?php
				//$grandtot = 0;
				//$totalrekap = array();
				$rows=$op.$monthdari;
				//$rekap[$rows]=$tmpbayar;
				$rekap[$rows]=$tmptotalsh;
				$totalrekap[$op]=$totalrekap[$op]+$bayar;
				$tmptotalrekap[$op]=number_format($totalrekap[$op]);
				$grandtot=$grandtot+$bayar;
				?>
			</div>
		</section>
		<script>
            $(function () {
                $('#tabelSharePencipta1<?php echo $dari;?>').DataTable({
                    'paging'			: true,
                    'lengthChange'	: true,
                    'searching'   	: true,
                    'ordering'    	: true,
                    'info'        	: true,
                    'autoWidth'   	: true,
                    'dom'				: 'Bfrtip',
                    'buttons'			: [
                        { extend: 'copyHtml5', footer: true },
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true },
                        { extend: 'print', footer: true },
                    ]
                });
                $('#tabelSharePencipta2<?php echo $dari;?>').DataTable({
                    'paging'			: true,
                    'lengthChange'	: true,
                    'searching'   	: true,
                    'ordering'    	: true,
                    'info'        	: true,
                    'autoWidth'   	: true,
                    'dom'				: 'Bfrtip',
                    'buttons'			: [
                        { extend: 'copyHtml5', footer: true },
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true },
                        { extend: 'print', footer: true },
                    ]
                });
                $('#tabelSharePencipta3<?php echo $dari;?>').DataTable({
                    'paging'			: true,
                    'lengthChange'	: true,
                    'searching'   	: true,
                    'ordering'    	: true,
                    'info'        	: true,
                    'autoWidth'   	: true,
                    'dom'				: 'Bfrtip',
                    'buttons'			: [
                        { extend: 'copyHtml5', footer: true },
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true },
                        { extend: 'print', footer: true },
                    ]
                });
                $('#tabelSharePencipta4<?php echo $dari;?>').DataTable({
                    'paging'			: true,
                    'lengthChange'	: true,
                    'searching'   	: true,
                    'ordering'    	: true,
                    'info'        	: true,
                    'autoWidth'   	: true,
                    'dom'				: 'Bfrtip',
                    'buttons'			: [
                        { extend: 'copyHtml5', footer: true },
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true },
                        { extend: 'print', footer: true },
                    ]
                });
                $('#tabelSharePencipta5<?php echo $dari;?>').DataTable({
                    'paging'			: true,
                    'lengthChange'	: true,
                    'searching'   	: true,
                    'ordering'    	: true,
                    'info'        	: true,
                    'autoWidth'   	: true,
                    'dom'				: 'Bfrtip',
                    'buttons'			: [
                        { extend: 'copyHtml5', footer: true },
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true },
                        { extend: 'print', footer: true },
                    ]
                });
                $('#tabelSharePencipta6<?php echo $dari;?>').DataTable({
                    'paging'			: true,
                    'lengthChange'	: true,
                    'searching'   	: true,
                    'ordering'    	: true,
                    'info'        	: true,
                    'autoWidth'   	: true,
                    'dom'				: 'Bfrtip',
                    'buttons'			: [
                        { extend: 'copyHtml5', footer: true },
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true },
                        { extend: 'print', footer: true },
                    ]
                });
            });
		</script>
		<?php
		$monthdari = $monthdari+ 1;
		$dari = $dari+1;
	}
	?>

	<!-- /.content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<center> <h3 class="box-title"><b>SHARE PARTNER</b></h3> <br></center>
						<center> <h4> <?php echo $pencipta[0]['namaPencipta'];?></h4></center>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="sumSharePencipta" class="table table-bordered table-responsive">
							<thead>
							<tr>
								<th>OPERATOR</th>
								<?php
								while ($dari1<=$sampai)
								{
									$dateObjD   = DateTime::createFromFormat('!m', $dari1);
									$dari1Name 	= $dateObjD->format('F');
									echo "<th>".$dari1Name."</th>";
									$dari1++;
								}
								?>
								<th>TOTAL</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>TELKOMSEL</td>
								<?php
								$j=1;
								while ($dari2<=$monthsampai)
								{
									$rows="1".$dari2;
									echo "<td>".$rekap[$rows]."</td>";
									$dari2++;
									$j++;
								}
								echo "<td>$tmptotalrekap[1]</td>";
								?>
							</tr>
							<tr>
								<td>INDOSAT</td>
								<?php
								while ($dari3<=$monthsampai)
								{
									$rows="2".$dari3;
									echo "<td>".$rekap[$rows]."</td>";
									$dari3++;
								}
								echo "<td>$tmptotalrekap[2]</td>";
								?>
							</tr>
							<tr>
								<td>XL</td>
								<?php
								while ($dari4<=$monthsampai)
								{
									$rows="3".$dari4;
									echo "<td>".$rekap[$rows]."</td>";
									$dari4++;
								}
								echo "<td>$tmptotalrekap[3]</td>";
								?>
							</tr>
							<tr>
								<td>FLEXI</td>
								<?php
								while ($dari5<=$monthsampai)
								{
									$rows="6".$dari5;
									echo "<td>".$rekap[$rows]."</td>";
									$dari5++;
								}
								echo "<td>$tmptotalrekap[6]</td>";
								?>
							</tr>
							<tr>
								<td>MOBILE8</td>
								<?php
								while ($dari6<=$monthsampai)
								{
									$rows="5".$dari6;
									echo "<td>".$rekap[$rows]."</td>";
									$dari6++;
								}
								echo "<td>$tmptotalrekap[5]</td>";
								?>
							</tr>
							<tr>
								<td>ESIA</td>
								<?php
								while ($dari7<=$monthsampai)
								{
									$rows="4".$dari7;
									echo "<td>".$rekap[$rows]."</td>";
									$dari7++;
								}
								echo "<td>$tmptotalrekap[4]</td>";
								?>
							</tr>
							</tbody>
							<tfooter>
								<tr>
									<?php
									$tmpgrandtot=number_format($grandtot);
									echo "<td><b>GRAND</td><td class='text-right' colspan=".$j.">".$tmpgrandtot."</b></td>";
									?>
								</tr>
							</tfooter>
						</table>
						<script>
                            $(function () {
                                $('#sumSharePencipta').DataTable({
                                    dom		: 'Bfrtip',
                                    buttons	: [
                                        { extend: 'copyHtml5', footer: true },
                                        { extend: 'excelHtml5', footer: true },
                                        { extend: 'csvHtml5', footer: true },
                                        { extend: 'print', footer: true },s
                                    ]
                                });
                            });
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('parts/V_Footer');
?>
