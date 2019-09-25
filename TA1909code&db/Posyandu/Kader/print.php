<?php
	require 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();

	
	require_once '../pdo/getanak.php';
	
	
	$getanak = new getanak();
	$tampil = $getanak->cetak();
	$da = $tampil->fetchAll(PDO::FETCH_ASSOC);
	
	
	
?>

<?php
	$html = " 
	<!DOCTYPE html>
	<html lang='en'>
			<head>
				<link rel='stylesheet' href='../bootsrap/css/bootstrap.min.css'>
			</head>
			<body style='padding:10px'>
				
				<center>
					<h5 class='text-bold'>DATA TUMBUH KEMBANG ANAK</h5>
					<h7>Posyandu Mekar Delima</h7>
					<h7>Kelurahan Pasarbatang Kabupaten Brebes</h7>
					
				</center>
				<div class='col-md-12'>
					<div style='margin-top:45px'>
						<h7 class='text-bold'>Tabel Pendaftar</h7>
						<table class='table table-bordered table-striped' style='margin-top:9px'>
							<tr>
								<td>No</td>
								<td>NIK</td>
								<td>Nama Anak</td>
								<td>Nama Ayah</td>
								<td>Nama Ibu</td>
								<td>Tanggal Lahir</td>
								<td>Jenis Kelamin</td>
								<td>RT</td>
							</tr>
							";
								foreach($da as $no => $dda){
									
									$html .= "
										<tr>
											<td>" .($no+1)."</td>	
											<td>" .$dda['nik_anak']."</td>
											<td>" .$dda['nm_anak']."</td>
											<td>" .$dda['nm_ayah']."</td>
											<td>" .$dda['nm_ibu']."</td>
											<td>" .date('d-m-Y', strtotime($dda['tgl_lahir']))."</td>
											<td>" .$dda['jns_kel']."</td>
											<td>" .$dda['rt']."</td>
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
	$dompdf->stream("data pendaftar",array("Attachment"=>0));
?>