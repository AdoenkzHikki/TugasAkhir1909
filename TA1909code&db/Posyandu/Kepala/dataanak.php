<?php if($_GET['page']=="dataanak"){?>
    <div class="container"> 
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Daftar Nama Anak di Posyandu Mekar Delima</h5>
                                    <p> Silahkan Klik Nama Anak Untuk Melihat Detail Tumbuh Kembang Anak </p>
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
                                            <td><?= $data->nik_anak ?></td>
                                            <td><a href="tumbuh/detail/<?=$data->nik_anak?>"><?= $data->nm_anak ?></td>
                                            <td><?= $data->nm_ayah ?></td>
                                            <td><?= $data->nm_ibu ?></td>
                                            <td><?= date ('d-m-Y', strtotime ($data->tgl_lahir)) ?></td>
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
else if($_GET['page']=="tambah-anak"){ ?>

            
                    <!-- START PAGE HEADING -->
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="index.php?page=pendaftar">Data Tumbuh Kembang Anak</a></li>
                            <li class="active">Tambah Data</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                   
                    <!-- START PAGE CONTAINER -->                    
                    <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Input Data Tumbuh Kembang Anak</h2>
                                    <p>Masukan secara detail dan benar</p>
                                </div>                                
                            </div>




                            
                                  
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">NIK Anak</label>
                                    <div class="col-md-10">
                                    <input type="text" name ="nik" class="form-control" value="<?= $_GET['nik']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Bulan</label>
                                    <div class="col-md-3">
                                        <select name="bulan" class="form-control">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Berat Badan</label>
                                    <div class="col-md-10">
                                        <input type="text" name="bb" class="form-control" placeholder="BB">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tinggi Badan</label>
                                    <div class="col-md-3">
                                        <input type="text" name="tb" class="form-control" placeholder="TB">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label type ="date" class="col-md-2 control-label">Tahun</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="tahun">
                                            <option value="">Pilih Tahun</option>
                                                <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 2010; $x--) {
                                                ?>
                                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <input type="submit" name="btntambah" class="btn btn-info btn-rounded" value="Tambah"/>
                                        <input type="reset" name="btnubah" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                require '../pdo/getgrafik.php';
                                if(isset($_POST['btntambah'])){
                                    $getgrafik = new getgrafik();
                                    $nik = $_POST['nik'];
                                    $id_user = $_SESSION['userid'];
                                    $bulan = $_POST['bulan'];
                                    $bb = $_POST['bb'];
                                    $tb = $_POST['tb'];
                                    $tahun = $_POST['tahun'];
                                    $tambah = $getgrafik->create($id_anak,$id_user,$nik,$bulan,$bb,$tb,$tahun);

                                    echo "<script>window.location.replace('index.php?page=detailinfo&nik=$nik')</script>";

                                }
                            
                            
                            
                            ?>
                            
                            
                        </div>
                        <!-- END BASIC INPUTS -->


<?php }
else if($_GET['page']=="editdetail"){ ?>

            
    <!-- START PAGE HEADING -->
    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="index.php?page=pendaftar">Data Pendaftar</a></li>
            <li class="active">Edit Pendaftar</li>
        </ul>
    </div>
    <!-- END PAGE HEADING -->
   
    <!-- START PAGE CONTAINER -->                    
    <div class="container">
        
        <!-- BASIC INPUTS -->
        <div class="block">                        
            
            <div class="app-heading app-heading-small">                                
                <div class="title">
                    <h2>Edit Data Pendaftar</h2>
                    <p>Masukan secara detail dan benar</p>
                </div>                                
            </div>
            <?php
                require '../pdo/getgrafik.php';
                if(isset($_GET['id_anak'])){
                    $getgrafik = new getgrafik();
                    $id_anak = $_GET['id_anak'];
                    $get = $getgrafik->read($id_anak);
                    $data = $get->fetch(PDO::FETCH_OBJ);
                }
            ?>
            
                  
            <form method="post" class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-md-2 control-label">ID Anak</label>
                                    <div class="col-md-10">
                                    <input type="text" name ="id_anak" class="form-control" value="<?= $data->id_anak?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">NIK Anak</label>
                                    <div class="col-md-10">
                                    <input type="text" name ="nik" class="form-control" value="<?= $data->nik_anak?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Bulan</label>
                                    <div class="col-md-3">
                                        <select name="bulan" class="form-control">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Berat Badan</label>
                                    <div class="col-md-10">
                                        <input type="text" name="bb" class="form-control" value="<?= $data->berat_badan?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tinggi Badan</label>
                                    <div class="col-md-3">
                                        <input type="text" name="tb" class="form-control" value="<?= $data->tinggi_badan?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label type ="date" class="col-md-2 control-label">Tahun</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="tahun">
                                            <option value="">Pilih Tahun</option>
                                                <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 2010; $x--) {
                                                ?>
                                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <div class="col-md-10">
                                        <input type="submit" name="btnsimpan" class="btn btn-info btn-rounded" value="Simpan"/>
                                        <input type="reset" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div> -->
                            </form>

                             <?php 
                                if(isset($_POST['btnsimpan'])){
                                    $id_anak=$_POST['id_anak'];
                                    $nik = $_POST['nik'];
                                    $id_user = $_SESSION['userid'];
                                    $bulan = $_POST['bulan'];
                                    $bb = $_POST['bb'];
                                    $tb = $_POST['tb'];
                                    $tahun = $_POST['tahun'];
                                    $simpan = $getgrafik->update($id_anak,$nik,$id_user,$bulan,$bb,$tb,$tahun);

                                    echo "<script>window.location.replace('index.php?page=detailinfo&nik=$nik')</script>";
                                }
                                else if(isset($_POST['btnbatal'])){
                                    echo "<script>window.location.replace('index.php?page=detailinfo&nik=$nik')</script>";
                                }
                            ?>
            
            
        </div>
        <!-- END BASIC INPUTS -->


<?php }
else if($_GET['page']=="detailinfo"){?>
<div class="container"> 
                                <div class="block">
                                    <!-- HEADING -->
                                    <div class="app-heading app-heading-small">                                        
                                        
                                        <div class="row">
                                            <div class="col-md-9">
                                                <?php 
                                                    require '../pdo/getanak.php';
                                                    $getanak = new getanak();
                                                    $nik= $_GET['nik'];
                                                    $tampil = $getanak->read_id($nik);
                                                    while($data=$tampil->fetch(PDO::FETCH_OBJ)){
                                                ?>
                                                    <h3>Data Tumbuh Kembang Anak<br><br></h3>
                                                    <h4>Nama : <?= $data->nm_anak?></h4>
                                                    <h4>NIK  : <?= $data->nik_anak ?></h4>
                                                    <h4>Jenis Kelamin : <?= $data->jns_kel?></h4>
                                                    <?php 
                                                        include '../pdo/getberat.php';
                                                        include '../pdo/gettinggi.php';
                                                        $getberat = new getberat();
                                                        $gettinggi = new gettinggi();
                                                        $tahun = $_POST['tahun'];
                                                        $hitung_bb = $getberat->read_berat($nik,$tahun);
                                                        $hitung_tb = $gettinggi->read_tinggi($nik,$tahun);
                                                        $bb=$hitung_bb->fetchAll(PDO::FETCH_ASSOC);
                                                        $tb=$hitung_tb->fetchAll(PDO::FETCH_ASSOC);
                                                        $arraybb=$bb[count($bb)-1];
                                                        $arraytb=$tb[count($tb)-1];

                                                        $bb_ideal = $arraybb['berat']/(($arraytb['tinggi']/100)*($arraytb['tinggi']/100));
                                                        if($bb_ideal < 18.5){?>
                                                            <h4>Keterangan : Berat Badan Kurang</h4>
                                                        <?php }elseif ($bb_ideal > 18.5 && $bb_ideal <= 24.9){ ?>
                                                            <h4>Keterangan : Berat Badan Ideal</h4>
                                                        <?php }elseif($bb_ideal >=25 && $bb_ideal <=29.9){?>
                                                            <h4>Keterangan : Berat Badan Lebih</h4>
                                                        <?php }elseif($bb_ideal >=30 && $bb_ideal <=39.9){?>
                                                            <h4>Keterangan : Gemuk</h4>
                                                        <?php }elseif($bb_ideal >= 40){?>
                                                            <h4>Keterangan : Sangat Gemuk</h4>
                                                        <?php }?>
                                                    
                                                    
                                                <?php }?>
                                                <button onclick="window.location.href='tumbuh'" type = "button" class="btn btn-sm btn-clean btn-danger"><span class="fa fa-chevron-left"></span> Kembali</button>
                                                
                                            </div>
                                            <div class="col-md-3">
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
                                             
                                    </div>
                                    
                                    <!-- END HEADING -->
                                </div>
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Tabel Berat Badan</h5>    
                                </div>
                            </div>
                                    
                            <!-- END HEADING -->
                            
                            <div class="block-content">
                                
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-striped table-bordered datatable-extended">
                                            <thead>
                                                <?php 
                                                    
                                                    $tahun = $_POST['tahun']; 
                                                    $bulan = $getberat->read_id($nik,$tahun);
                                                    $array = $bulan->fetchAll(PDO::FETCH_ASSOC);
                                                ?>
                                                <tr>
                                                    <th>No</th>
                                                    <?php foreach($array as $bulan){?>
                                                        <th><?= $bulan['bulan'] ?></th>
                                                    <?php }?>
                                                    <th>Tahun</th>
                                                </tr>
                                            </thead>                                    
                                            <tbody>
                                                <td>1</td>
                                                <?php foreach($array as $isi){?>
                                                    <td><?= $isi['berat']?></td>
                                                <?php }?>     
                                                <td><?= $_POST['tahun'] ?></td>     
                                            </tbody>
                                        </table>
                                    
                                    </div>
                                    <div class="col-md-4">
                                        <canvas id="bb" width="10" height="10"></canvas>
                                    </div>

                                    <?php
                                        // $koneksi = mysqli_connect("localhost", "root", "", "db_posyandu");
                                       
                                        $koneksi = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
                                        $bb = $koneksi->prepare("select bulan,berat,tahun from tb_berat where nik_anak='$nik' and tahun='$tahun'");
                                        $bb->execute();
                                        $bb = $bb->fetchAll(PDO::FETCH_ASSOC);
                                        // $bb = array_unique($bb);
                                        
                                        $tb = $koneksi->prepare("select bulan,tinggi,tahun from tb_tinggi where nik_anak='$nik' and tahun='$tahun'");
                                        $tb->execute();
                                        $tb = $tb->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        
                                        // $data = $data->fetch(PDO::FETCH_OBJ);
                                        // $bb = mysqli_query($koneksi,"select januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember from tb_berat_badan where nik_anak='$nik' and tahun='$tahun'");
                                        // $tb = mysqli_query($koneksi,"select januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember from tb_tinggi_badan where nik_anak='$nik' and tahun='$tahun'");
                                    ?>
                                    
                                
                                </div>
                            </div>

                            
                        </div> 
                        
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                            <div class="title">
                                    <h5>Tabel Tinggi Badan</h5>    
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-striped table-bordered datatable-extended">
                                                <thead>
                                                    <?php 
                                                        
                                                        $tahun = $_POST['tahun']; 
                                                        
                                                        $bulan = $gettinggi->read_id($nik,$tahun);
                                                        $array = $bulan->fetchAll(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <tr>
                                                        <th>No</th>
                                                        <?php foreach($array as $bulan){?>
                                                            <th><?= $bulan['bulan'] ?></th>
                                                        <?php }?>
                                                        <th>Tahun</th>
                                                    </tr>
                                                </thead>                                    
                                                <tbody>
                                                    <td>1</td>
                                                    <?php foreach($array as $isi){?>
                                                        <td><?= $isi['tinggi']?></td>
                                                    <?php }?>     
                                                    <td><?= $_POST['tahun'] ?></td>     
                                                </tbody>
                                            </table>
                                        
                                        </div>
                                        <div class="col-md-4">
                                            <canvas id="tb" width="10" height="10"></canvas>
                                        </div>

                                        <?php
                                            // $koneksi = mysqli_connect("localhost", "root", "", "db_posyandu");
                                        
                                            $koneksi = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
                                            $bb = $koneksi->prepare("select bulan,berat,tahun from tb_berat where nik_anak='$nik' and tahun='$tahun'");
                                            $bb->execute();
                                            $bb = $bb->fetchAll(PDO::FETCH_ASSOC);
                                            // $bb = array_unique($bb);
                                            
                                            $tb = $koneksi->prepare("select bulan,tinggi,tahun from tb_tinggi where nik_anak='$nik' and tahun='$tahun'");
                                            $tb->execute();
                                            $tb = $tb->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            
                                            // $data = $data->fetch(PDO::FETCH_OBJ);
                                            // $bb = mysqli_query($koneksi,"select januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember from tb_berat_badan where nik_anak='$nik' and tahun='$tahun'");
                                            // $tb = mysqli_query($koneksi,"select januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember from tb_tinggi_badan where nik_anak='$nik' and tahun='$tahun'");
                                        ?>
                                    </div>
                            </div>
                            <!-- END HEADING -->
                            
                            
                            
                        </div>
                        <script src="js/Chart.js"></script>
                                    <style type="text/css">
                                            .container {
                                                width: 50%;
                                                margin: 15px auto;
                                            }
                                    </style>
                                    <script  type="text/javascript">

                                        var ctx = document.getElementById("bb").getContext("2d");
                                        var data = {
                                                    labels: [<?php foreach($bb as $bulan){echo "'".$bulan['bulan']."', ";}?>],
                                                    datasets: [
                                                    {
                                                    label: "Berat Badan ( Kg )",
                                                    fill: false,
                                                    lineTension: 0.1,
                                                    backgroundColor: "rgba(59, 100, 222, 1)",
                                                    borderColor: "rgba(59, 100, 222, 1)",
                                                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                                                                pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                                                    data : [
                                                        <?php foreach($bb as $berat){echo "'".$berat['berat']."', ";} ?>
                                                    ]
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

                                        var cty = document.getElementById("tb").getContext("2d");
                                        var data = {
                                                    labels: [<?php foreach($tb as $bulan){echo "'".$bulan['bulan']."', ";}?>],
                                                    datasets: [
                                                    {
                                                    label: "Tinggi Badan ( cm )",
                                                    fill: false,
                                                    lineTension: 0.1,
                                                    backgroundColor: "rgba(255, 0, 0, 1)",
                                                    borderColor: "rgba(255, 0, 0, 1)",
                                                    pointHoverBackgroundColor: "rgba(255, 0, 0, 1)",
                                                                pointHoverBorderColor: "rgba(255, 0, 0, 1))",
                                                    data : [
                                                        <?php foreach($tb as $tinggi){echo "'".$tinggi['tinggi']."', ";} ?>
                                                    ]
                                                    }
                                                ]
                                                };
                                                
                                        var myBarChart = new Chart(cty, {
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
<?php } ?>