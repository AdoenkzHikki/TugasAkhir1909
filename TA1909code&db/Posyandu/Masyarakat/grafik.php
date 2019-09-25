<?php if($_GET['page']=="grafik") {?>
    <div class="container"> 
        <div class="block block-condensed">
        
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Daftar Nama Anak di Posyandu Mekar Delima</h5>
                                    <p> Silahkan Klik Nama Anak Untuk Melihat Grafik Tumbuh Kembang Anak </p>
                                </div>
                            </div>
                            <!-- END HEADING -->
                            
                            <div class="block-content">
                                
                                <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK Anak</th>
                                            <th>Nama Anak</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>RT</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php 
                                            require '../pdo/getanak.php';
                                            $getanak = new getanak();
                                            $tampil = $getanak->read();
                                            $no = 1;
                                            while($data = $tampil->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nik ?></td>
                                            <td><a href="index.php?page=detailgrafik"><?= $data->nm_anak ?></td>
                                            <td><?= $data->nm_ayah ?></td>
                                            <td><?= $data->nm_ibu ?></td>
                                            <td><?= $data->tgl_lahir ?></td>
                                            <td><?= $data->jns_kel ?></td>
                                            <td><?= $data->rt ?></td>
                                        </tr>
                                        <?php }?>
                                                                                
                                    </tbody>
                                </table>
                            </div>
                                
         </div>
                            
    </div>

<?php } 
else if($_GET['page']=="detailgrafik") {?>
    <div class="container">
                        <div class="block">                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h5>Grafik Tumbuh Kembang Anak</h5> 
                                    <?php 
                                            require '../pdo/getanak.php';
                                            $getanak = new getanak();
                                            $nik= $_SESSION['userid'];
                                            $tampil = $getanak->read_id($nik);
                                            while($data=$tampil->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                    <h3>Nama : <?= $data->nm_anak?></h3>
                                    <h3>NIK : <?= $data->nik_anak ?></h3>
                                    <h3>Jenis Kelamin : <?= $data->jns_kel?></h3>
                                                                      
                                    <p>
                                    <button onclick="window.location.href='tumbuh/detail/<?= $data->nik_anak ?>'" type = "button" class="btn btn-sm btn-clean btn-danger"><span class="fa fa-chevron-left"></span> Kembali</button>
                                    </p>
                                            <?php } ?>
                                    <form method="post">
                                        <div style="margin-top:20px" class="title">
                                            <h3> Pilih Tahun : </h3>
                                            <select name="tahun" class="form-control">
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                            </select>
                                        </div>
                                        <div style="margin-top:44px" class="title">
                                            <input style="margin-left:10px" type="submit" name="btnpilih" class="btn btn-info btn" value="Pilih"/>
                                        </div>
                                    </form>
                                </div>                                
                            </div>                                    

                            <script src="js/Chart.js"></script>
                            <style type="text/css">
                                    .container {
                                        width: 50%;
                                        margin: 15px auto;
                                    }
                            </style>
                        

                        <canvas id="demobar" width="10" height="10"></canvas>
                        
                        <?php
                            $koneksi = mysqli_connect("localhost", "root", "", "db_posyandu");
                            $nik = $_SESSION['userid'];
                            $tahun = $_POST['tahun'];
                            
                            $bb = mysqli_query($koneksi,"select januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember from tb_berat_badan where nik_anak='$nik' and tahun='$tahun'");
                            $tb = mysqli_query($koneksi,"select januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember from tb_tinggi_badan where nik_anak='$nik' and tahun='$tahun'");

                        ?>

                        <script  type="text/javascript">

                            var ctx = document.getElementById("demobar").getContext("2d");
                            var data = {
                                        labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
                                        datasets: [
                                        {
                                        label: "Berat Badan ( Kg )",
                                        fill: false,
                                        lineTension: 0.1,
                                        backgroundColor: "rgba(59, 100, 222, 1)",
                                        borderColor: "rgba(59, 100, 222, 1)",
                                        pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                                                    pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                                        data : [<?php while ($p = mysqli_fetch_array($bb)) { echo '"' . $p['januari'] . '","'.$p['februari'].'","'.$p['maret'].'","'.$p['april'].'","'.$p['mei'].'","'.$p['juni'].'","'.$p['juli'].'","'.$p['agustus'].'","'.$p['september'].'","'.$p['oktober'].'","'.$p['november'].'","'.$p['desember'].'"';}?>]
                                        },
                                    {
                                        label: "Tinggi Badan ( cm )",
                                        fill: false,
                                        lineTension: 0.1,
                                        backgroundColor: "rgba(201, 29, 29, 1)",
                                        borderColor: "rgba(201, 29, 29, 1)",
                                        pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
						                pointHoverBorderColor: "rgba(201, 29, 29, 1)",
                                        data: [<?php while ($p = mysqli_fetch_array($tb)) { echo '"' . $p['januari'] . '","'.$p['februari'].'","'.$p['maret'].'","'.$p['april'].'","'.$p['mei'].'","'.$p['juni'].'","'.$p['juli'].'","'.$p['agustus'].'","'.$p['september'].'","'.$p['oktober'].'","'.$p['november'].'","'.$p['desember'].'"';}?>]
                                        }
                                    ]
                                    };
                                    

                            var myBarChart = new Chart(ctx, {
                                        type: 'line',
                                        data: data,
                                        options: {
                                        barValueSpacing: 20,
                                        scales: {
                                        yAxes: [{
                                            ticks: {
                                                min: 0,
                                            }
                                        }],
                                        xAxes: [{
                                                    gridLines: {
                                                        color: "rgba(0, 0, 0, 0)",
                                                    }
                                                }]
                                        }
                                    }
                                    });
                        </script>
                        </div>

                                                                        
                        
    </div>
<?php }?>