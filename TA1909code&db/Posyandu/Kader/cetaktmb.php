<?php
	require 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();

	require_once '../pdo/getberat.php';
	require_once '../pdo/gettinggi.php';
	require_once '../pdo/getanak.php';
	$nik= $_GET['nik'];
	$getberat = new getberat();
	$gettinggi = new gettinggi();
	$getanak = new getanak();
	$tampilbb = $getberat->cetak_id($nik);
	$tampiltb = $gettinggi->cetak_id($nik);
	$tampila = $getanak->read_id($nik);
	$bb = $tampilbb->fetchAll(PDO::FETCH_ASSOC);
	$tb = $tampiltb->fetchAll(PDO::FETCH_ASSOC);
	$da = $tampila->fetch(PDO::FETCH_OBJ);
	
	
	
?>

<?php
	$html = " 
	<!DOCTYPE html>
	<html lang='en'>
			<head>
				<link rel='stylesheet' href='../bootsrap/css/bootstrap.min.css'>
			</head>
			<body style='padding:50px'>
				
				<center>
					<h5 class='text-bold'>DATA TUMBUH KEMBANG ANAK</h5>
					<h7>Posyandu Mekar Delima</h7>
					<h7>Kelurahan Pasarbatang Kabupaten Brebes</h7>
					
				</center>
				<div class='col-md-6'>
					<div style='margin-top:60px'>
					";
					for($i=0 ; $i<count($da) ; $i++){
						$html .= "
						<h6>Nama : ".$da->nm_anak."</h6>
						<h6>NIK : ".$da->nik_anak."</h6>
						<h6>Jenis Kelamin : ".$da->jns_kel."</h6>
						";
					}
					$html .="
					</div>					
				</div>
				<div class='col-md-12'>
					<div style='margin-top:45px'>
						<h7 class='text-bold'>Tabel Berat Badan</h7>
						<table class='table table-bordered table-striped' style='margin-top:9px'>
							<tr>
								<td>No</td>
								<td>Bulan</td>
								<td>Berat</td>
								<td>Tahun</td>
							</tr>
							";
								foreach($bb as $no => $dbb){
									
									$html .= "
										<tr>
											<td>" .($no+1)."</td>	
											<td>" .$dbb['bulan']."</td>
											<td>" .$dbb['berat']."</td>
											<td>" .$dbb['tahun']."</td>
										</tr>		
									";
								}
							$html .="
						</table>
					</div>
				</div>
				<div class='col-md-12'>
					<div style='margin-top:30px'>
						<h7 class='text-bold'>Tabel Tinggi Badan</h7>
						<table class='table table-bordered table-striped' style='margin-top:9px'>
							<tr>
								<td>No</td>
								<td>Bulan</td>
								<td>Tinggi</td>
								<td>Tahun</td>
							</tr>
							";
							
							foreach($tb as $no => $dtb){
									
								$html .= "
									<tr>
										<td>" .($no+1)."</td>	
										<td>" .$dtb['bulan']."</td>
										<td>" .$dtb['tinggi']."</td>
										<td>" .$dtb['tahun']."</td>
									</tr>		
								";
							}
						$html .="
						</table>
					</div>
				</div>

				<div class='col-md-10'>
					<div style='margin-top:70px''>
						<h6 align='right'>Kepala Posyandu</h6>
					</div>
				</div>
				<div class='col-md-10'>
					<div style='margin-top:90px'>
						<h6 align='right'>Hj. Chopipah</h6>
					</div>
				</div>
			</body>
		</html>";
		//echo $html;




	$dompdf->loadHtml($html);
	// (Opsional) Mengatur ukuran kertas dan orientasi kertas
	$dompdf->setPaper('A4', 'landscape');
	// Menjadikan HTML sebagai PDF
	$dompdf->render();
	// Output akan menghasilkan PDF (1 = download dan 0 = preview)
	$dompdf->stream("data tumbuh kembang anak",array("Attachment"=>0));
?>