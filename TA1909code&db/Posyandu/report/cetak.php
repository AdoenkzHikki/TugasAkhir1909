<?php
    /**
     * spl_autoload akan meload semua class yang ada di folder PDO
     */
    require 'lib/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    spl_autoload_register(function($class){
        require_once 'pdo/' . $class . '.php';
    });

    

    /**
     * Function untuk inisialisasi Class Secara Bayangan
     * Berdasarkan Parameter yang di berikan
     * 
     * Contoh jika ingin memanggil method read di class Kelas: 
     * Standar Code     : $kelas = new Kelas();
     *                    $kelas->read();
     * with _getClass   : _getClass('Kelas')->read();
     */
    function _getClass($class_name){
        if(file_exists('pdo/'.$class_name.'.php')){
            $obj = new $class_name;
            return $obj;
        }else{
            echo "<p style='color:red; font-size:38px'>Nama Class tidak ditemukan di folder PDO ! , Mohon periksa parameter di _getClass !</p>";
        }
    }

    /**
     * Mengcek apakah file cetak.php di panggil lewat form
     * dengan method post atau di panggil langsung lewat url
     */
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $req_type = explode('|', $_GET['req']);
        if($req_type[0] == 'spp'){
            if($req_type[1] == 'kelas'){ //Laporan Perkelas
                /**
                 * Getting Data from input form
                 */
                $id_ta = $_POST['ta'];
                $kelas = $_POST['kelas'];
                $semester = $_POST['semester'];
                $smt_output = strtolower($semester);
                /**
                 * Inisialisasi Array
                 */
                $bulan = array();
                $siswa = array();
                $output = array();
                /**
                 * Execute Query From DB
                 * and get data saved to variable $data
                 */
                $data = _getClass('TransaksiBulanan')->read_lap_kelas($id_ta, $kelas)->fetchAll(PDO::FETCH_ASSOC);
                /**
                 * Prepare HTML Output
                 */
                $html = "
                <!DOCTYPE html>
                <html lang='en'>
                    <head>
                        <link href='css/bootstrap.min.css?version=4.4.0' rel='stylesheet'>
                    </head>
                    <body >
                        <center><h2 style='padding-bottom:15px'>Laporan SPP Kelas $kelas</h2></center>
                        <center><h4 style='padding-bottom:15px'>Semester $smt_output</h4></center>
                        <table class='table'>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tagihan</th>
                        
                ";
                /**
                 * Memfilter data yang memiliki nama sama dan di jadikan 
                 * menjadi satu array
                 */
                for($i = 0; $i<count($data); $i++){
                    $nm_siswa = $data[$i]['nama_siswa'];
                    if(count($siswa)==0){
                        $siswa[$i] = $nm_siswa;
                        $output[$i]['nominal'] = $data[$i]['nominal_iuran'];
                    }else{
                        for($j = 0 ; $j < count($siswa); $j++){
                            if($siswa[$j]==$nm_siswa){
                                continue;
                            }else{
                                $siswa[$i-1] = $nm_siswa;
                                $output[$i-1]['nominal'] = $data[$i]['nominal_iuran'];
                            }
                        }
                    }
                }
                /**
                 * Mengextract Nama Bulan dan memasukan ke dalam array
                 * Sesuai berdasarkan nama siswa 
                 */
                for($i = 0; $i < count($data); $i++){
                    $list_bulan = explode(',', $data[$i]['detail_bulan']);
                    for($h = 0; $h < count($siswa); $h++){
                        if($data[$i]['nama_siswa']==$siswa[$h]){
                            for($j = 0; $j < count($list_bulan); $j++){
                                for($k=1; $k<12; $k++){
                                    if($list_bulan[$j]=='Januari'){
                                        $bulan[$h][1] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][1] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='Februari'){
                                        $bulan[$h][2] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][2] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='Maret'){
                                        $bulan[$h][3] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][3] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='April'){
                                        $bulan[$h][4] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][4] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='Mei'){
                                        $bulan[$h][5] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][5] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='April'){
                                        $bulan[$h][6] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][6] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='Juli'){
                                        $bulan[$h][7] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][7] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='Agustus'){
                                        $bulan[$h][8] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][8] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='September'){
                                        $bulan[$h][9] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][9] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='Oktober'){
                                        $bulan[$h][10] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][10] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='November'){
                                        $bulan[$h][11] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][11] = $data[$i]['tgl_transaksi'];
                                    }elseif($list_bulan[$j]=='Desember'){
                                        $bulan[$h][12] = $list_bulan[$j];
                                        $output[$h]['tgl_trans'][12] = $data[$i]['tgl_transaksi'];
                                    }
                                    
                                }
                            }
                        }
                        
                    }
                    
                    
                }
                /**
                 * Menentukan Semester Genap / Gasal
                 */
                if($semester == 'genap'){
                    $html .= "
                        <th>Juli</th>
                        <th>Agustus</th>
                        <th>Sepetember</th>
                        <th>Oktober</th>
                        <th>November</th>
                        <th>Desember</th>
                    </tr>
                    ";
                    for($i = 0; $i < count($siswa); $i++){
                        $html .= "
                            <tr>
                                <td>".($i+1)."</td>
                                <td>".$siswa[$i]."</td>
                                <td>".$data[$i]['nominal_iuran']."</td>
                        ";
                        if(isset($bulan[$i][7])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][7]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][8])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][8]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][9])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][9]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][10])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][10]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][11])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][11]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][12])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][12]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        $html .= "
                            </tr>
                        ";
                    }
                }elseif($semester == 'gasal'){
                    $html .= "
                        <th>Januari</th>
                        <th>Februari</th>
                        <th>Maret</th>
                        <th>April</th>
                        <th>Mei</th>
                        <th>Juni</th>
                    </tr>
                    ";
                    for($i = 0; $i < count($siswa); $i++){
                        $html .= "
                            <tr>
                                <td>".($i+1)."</td>
                                <td>".$siswa[$i]."</td>
                                <td>".$data[$i]['nominal_iuran']."</td>
                        ";
                        if(isset($bulan[$i][1])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][1]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][2])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][2]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][3])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][3]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][4])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][4]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][5])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][5]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        if(isset($bulan[$i][6])){
                            $html .= "
                                <td>
                                    ".$output[$i]['nominal']."
                                    <br>
                                    ".$output[$i]['tgl_trans'][6]."
                                </td>
                            ";
                        }else{
                            $html .= "
                                <td>
                                    0 <br> -
                                </td>
                            ";
                        }
                        $html .= "
                            </tr>
                        ";
                    }
                }
                
                

                $html .= "
                            </table>
                        </body>
                    </html>
                ";

                // echo $html;

                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('Laporan_'.date('d-m-Y').'.pdf', array("Attachment"=>0));
            }elseif($req_type[1]=='siswa'){ //Laporan Per Siswa
                $id_ta = $_POST['ta'];
                $nis = $_POST['nis'];
                $data = _getClass('TransaksiBulanan')->read_lap_siswa($id_ta, $nis)->fetchAll(PDO::FETCH_ASSOC);
                $html = "
                <!DOCTYPE html>
                <html lang='en'>
                    <head>
                        <link href='css/bootstrap.min.css?version=4.4.0' rel='stylesheet'>
                    </head>
                    <body style='padding:50px'>
                        <center><h2 style='padding-bottom:15px'>Laporan SPP</h2></center>
                        <p style=''>Nama : ".$data[0]['nama_siswa']."</p>
                        <p style='padding-bottom:15px'>Kelas  : ".$data[0]['xkelas']."</p>
                        <table class='table'>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Detail Bulan</th>
                                <th>Jml Bulan</th>
                                <th>Nominal Tagihan</th>
                                <th>Total</th>
                                <th>Petugas</th>
                            </tr>
                        
                ";
                for($i = 0; $i < count($data); $i++){
                    $html .= "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>".$data[$i]['no_transaksi']."</td>
                            <td>".$data[$i]['detail_bulan']."</td>
                            <td>".$data[$i]['jml_bulan']."</td>
                            <td>".$data[$i]['nominal_iuran']."</td>
                            <td>".$data[$i]['total']."</td>
                            <td>".$data[$i]['nama_operator']."</td>
                        </tr>
                    ";
                }

                $html .= "
                            </table>
                        </body>
                    </html>
                ";
                // echo $html;
                // echo json_encode($data);

                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'potrait');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('Laporan_'.date('d-m-Y').'.pdf', array("Attachment"=>0));
            }elseif($req_type[1]=='periode'){ //Laporan Per Periode
                /**
                 * Getting Data from input Form
                 */
                $tgl_awal = $_POST['tgl_awal'];
                $tgl_akhir = $_POST['tgl_akhir'];
                /**
                 * Convert data to SQL Format Date
                 */
                $tgl_awal = date('Y-m-d', strtotime($tgl_awal));
                $tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));
                $output_tgl_awal = date('d/m/Y', strtotime($tgl_awal));
                $output_tgl_akhir = date('d/m/Y', strtotime($tgl_akhir));
                /**
                 * Execute and extract SQL Query
                 */
                $data = _getClass('TransaksiBulanan')->read_lap_periode($tgl_awal, $tgl_akhir)->fetchAll(PDO::FETCH_ASSOC);

                $html = "
                <!DOCTYPE html>
                <html lang='en'>
                    <head>
                        <link href='css/bootstrap.min.css?version=4.4.0' rel='stylesheet'>
                    </head>
                    <body style='padding:50px'>
                        <center><h2 style='padding-bottom:15px'>Laporan SPP</h2></center>
                        <p style=''>Periode : ".$output_tgl_awal." - ".$output_tgl_akhir."</p>
                        <table class='table'>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Bulan</th>
                                <th>Total</th>
                            </tr>
                        
                ";

                for($i = 0; $i<count($data); $i++){
                    $tgl_trans = 
                    $html .= "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>
                                ".$data[$i]['no_transaksi']."<br>
                                ".date('d M Y', strtotime($data[$i]['tgl_transaksi']))."<br>
                                ".$data[$i]['nama_operator']."
                            </td>
                            <td>
                                ".$data[$i]['nama_siswa']."<br>
                                ".$data[$i]['nis']."
                            </td>
                            <td>
                                ".$data[$i]['xkelas']."
                            </td>
                            <td>
                                ".$data[$i]['jml_bulan']." bulan<br>
                                ".str_replace(',', ' ', $data[$i]['detail_bulan'])."
                            </td>
                            <td>
                                ".$data[$i]['total']."<br>
                                "."Jml Bayar : ".$data[$i]['jml_bayar']."<br>
                                "."Kembalian : ".($data[$i]['jml_bayar']-$data[$i]['total'])."
                            </td>
                        </tr>
                    ";
                }

                $html .= "
                            </table>
                        </body>
                    </html>
                ";

                // echo json_encode($data);
                // echo $html;

                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('Laporan_SPP_Periode'.$tgl_awal.' sampai '.$tgl_akhir.'.pdf', array("Attachment"=>0));
            }else{
                echo "Wrong Command!";
            }
        }elseif($req_type[0] == 'lain'){
            if($req_type[1] == 'siswa'){
                $id_ta = $_POST['ta'];
                $nis = $_POST['nis'];
                $id_il = $_POST['keterangan'];

                $data = _getClass('TransaksiLain2')->read_lap_siswa($id_ta, $nis, $id_il)->fetchAll(PDO::FETCH_ASSOC);
                $html = "
                <!DOCTYPE html>
                <html lang='en'>
                    <head>
                        <link href='css/bootstrap.min.css?version=4.4.0' rel='stylesheet'>
                    </head>
                    <body style='padding:50px'>
                        <center><h2 style='padding-bottom:15px'>Laporan Lain-Lain</h2></center>
                        <p style=''>Nama : ".$data[0]['nama_siswa']."</p>
                        <p >Kelas  : ".$data[0]['xkelas']."</p>
                        <p style='padding-bottom:15px'>Keterangan  : ".$data[0]['keterangan']."</p>
                        <table class='table'>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Tgl Transaksi</th>
                                <th>Nominal Tagihan</th>
                                <th>Dibayarkan</th>
                                <th>Petugas</th>
                            </tr>
                ";
                for($i = 0; $i < count($data); $i++){
                    $html .= "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>".$data[$i]['no_transaksi']."</td>
                            <td>".$data[$i]['tgl_transaksi']."</td>
                            <td>".$data[$i]['nominal_iuran']."</td>
                            <td>".$data[$i]['dibayarkan']."</td>
                            <td>".$data[$i]['nama_operator']."</td>
                        </tr>
                    ";
                }
                $html .= "
                            </table>
                        </body>
                    </html>
                ";
                // echo $html;
                // echo json_encode($data);
                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('Laporan_Lain2_Siswa'.date('d-m-Y').'.pdf', array("Attachment"=>0));
            }elseif($req_type[1]=='periode'){
                $tgl_awal = $_POST['tgl_awal'];
                $tgl_akhir = $_POST['tgl_akhir'];

                $tgl_awal = date('Y-m-d', strtotime($tgl_awal));
                $tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));
                $output_tgl_awal = date('d/m/Y', strtotime($tgl_awal));
                $output_tgl_akhir = date('d/m/Y', strtotime($tgl_akhir));
                
                $data = _getClass('TransaksiLain2')->read_lap_periode($tgl_awal, $tgl_akhir)->fetchAll(PDO::FETCH_ASSOC);

                $html = "
                <!DOCTYPE html>
                <html lang='en'>
                    <head>
                        <link href='css/bootstrap.min.css?version=4.4.0' rel='stylesheet'>
                    </head>
                    <body style='padding:50px'>
                        <center><h2 style='padding-bottom:15px'>Laporan Lain-Lain</h2></center>
                        <p style=''>Periode : ".$output_tgl_awal." - ".$output_tgl_akhir."</p>
                        <table class='table'>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Uraian</th>
                                <th>Total</th>
                            </tr>
                        
                ";

                for($i = 0; $i<count($data); $i++){
                    $tgl_trans = 
                    $html .= "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>
                                ".$data[$i]['no_transaksi']."<br>
                                ".date('d M Y', strtotime($data[$i]['tgl_transaksi']))."<br>
                                ".$data[$i]['nama_operator']."
                            </td>
                            <td>
                                ".$data[$i]['nama_siswa']."<br>
                                ".$data[$i]['nis']."
                            </td>
                            <td>
                                ".$data[$i]['xkelas']."
                            </td>
                            <td>
                                ".$data[$i]['keterangan']."<br>
                                ".number_format($data[$i]['nominal_iuran'],0,',','.')."
                            </td>
                            <td>
                                ".$data[$i]['total']."<br>
                                "."Jml Bayar : ".$data[$i]['jml_bayar']."<br>
                                "."Kembalian : ".($data[$i]['jml_bayar']-$data[$i]['total'])."
                            </td>
                        </tr>
                    ";
                }

                $html .= "
                            </table>
                        </body>
                    </html>
                ";
                // echo $html;
                // echo json_encode($data);

                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('Laporan_Lain2_Periode'.$tgl_awal.' sampai '.$tgl_akhir.'.pdf', array("Attachment"=>0));
            }elseif($req_type[1]=='kelas'){
                $id_ta = $_POST['ta'];
                $kelas = $_POST['kelas'];
                $id_il = $_POST['keterangan'];
                $data = _getClass('TransaksiLain2')->read_lap_kelas($kelas, $id_ta, $id_il)->fetchAll(PDO::FETCH_ASSOC);

                $html = "
                <!DOCTYPE html>
                <html lang='en'>
                    <head>
                        <link href='css/bootstrap.min.css?version=4.4.0' rel='stylesheet'>
                    </head>
                    <body style='padding:50px'>
                        <center><h2 style='padding-bottom:15px'>Laporan Lain-Lain</h2></center>
                        <p >Kelas  : ".$data[0]['xkelas']."</p>
                        <p style='padding-bottom:15px'>Keterangan  : ".$data[0]['keterangan']."</p>
                        <table class='table'>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Siswa</th>
                                <th>Nominal Tagihan</th>
                                <th>Dibayarkan</th>
                                <th>Petugas</th>
                            </tr>
                ";

                for($i = 0; $i < count($data); $i++){
                    $html .= "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>
                                ".$data[$i]['no_transaksi']."<br>
                                ".date('d M Y', strtotime($data[$i]['tgl_transaksi']))."<br>
                            </td>
                            <td>".$data[$i]['nama_siswa']."</td>
                            <td>".$data[$i]['nominal_iuran']."</td>
                            <td>".$data[$i]['dibayarkan']."</td>
                            <td>".$data[$i]['nama_operator']."</td>
                        </tr>
                    ";
                }

                $html .= "
                            </table>
                        </body>
                    </html>
                ";

                // echo $html;
                // echo json_encode($data);

                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('Laporan_Lain2_Kelas.'.'pdf', array("Attachment"=>0));
            }elseif($req_type[1]=='tunggakan'){
                $id_ta = $_POST['ta'];
                $kelas = $_POST['kelas'];
                $id_il = $_POST['keterangan'];

                $data = _getClass('TransaksiLain2')->read_lap_tunggakan($kelas, $id_ta, $id_il)->fetchAll(PDO::FETCH_ASSOC);

                $html = "
                <!DOCTYPE html>
                <html lang='en'>
                    <head>
                        <link href='css/bootstrap.min.css?version=4.4.0' rel='stylesheet'>
                    </head>
                    <body style='padding:50px'>
                        <center><h2 style='padding-bottom:15px'>Laporan Tunggakan Lain-Lain</h2></center>
                        <p >Kelas  : ".$data[0]['xkelas']."</p>
                        <p style='padding-bottom:15px'>Keterangan  : ".$data[0]['keterangan']."</p>
                        <table class='table'>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Nominal Tagihan</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Terlambat</th>
                            </tr>
                ";

                for($i = 0; $i<count($data); $i++){
                    $html .= "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>
                                ".$data[$i]['nama_siswa']."<br>
                                ".$data[$i]['nis']."
                            </td>
                            <td>
                                ".number_format($data[$i]['nominal_iuran'],0,',','.')."
                            </td>
                            <td>
                                ".date('d M Y', strtotime($data[$i]['tgl_jatuh_tempo']))."
                            </td>
                            <td>
                                ".$data[$i]['terlambat']."
                            </td>
                        </tr>
                    ";
                }

                $html .= "
                            </table>
                        </body>
                    </html>
                ";

                // echo $html;
                // echo json_encode($data);

                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('Laporan_Lain2_Tunggakan.'.'pdf', array("Attachment"=>0));
            }else{
                echo "Wrong Command!";
            }
        }else{
            echo "Wrong Command!";
        }
    }else{
        echo "Wrong Command!";
    }
?>