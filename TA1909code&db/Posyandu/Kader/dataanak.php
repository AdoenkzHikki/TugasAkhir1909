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
                                            <td><?= date('d-m-Y', strtotime($data->tgl_lahir)) ?></td>
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
else if($_GET['page']=="tambah-data"){ ?>

            
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
                                    <div class="col-md-3">
                                    <input type="text" name ="nik" class="form-control" value="<?= $_GET['nik']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Bulan</label>
                                    <div class="col-md-3">
                                        <select name="bulan" class="form-control">
                                            <option value="Bulan 1">Bulan 1</option>
                                            <option value="Bulan 2">Bulan 2</option>
                                            <option value="Bulan 3">Bulan 3</option>
                                            <option value="Bulan 4">Bulan 4</option>
                                            <option value="Bulan 5">Bulan 5</option>
                                            <option value="Bulan 6">Bulan 6</option>
                                            <option value="Bulan 7">Bulan 7</option>
                                            <option value="Bulan 8">Bulan 8</option>
                                            <option value="Bulan 9">Bulan 9</option>
                                            <option value="Bulan 10">Bulan 10</option>
                                            <option value="Bulan 11">Bulan 11</option>
                                            <option value="Bulan 12">Bulan 12</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Berat Badan</label>
                                    <div class="col-md-3">
                                        <input type="number"  name="bb" class="form-control" placeholder="BB">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tinggi Badan</label>
                                    <div class="col-md-3">
                                        <input type="number"  name="tb" class="form-control" placeholder="TB">
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
                                        <input type="submit" name="btnsimpan" class="btn btn-info btn-rounded" value="Tambah"/>
                                        <input type="submit" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                require '../pdo/getberat.php';
                                require '../pdo/gettinggi.php';
                                if(isset($_POST['btnsimpan'])){
                                    $getberat = new getberat();
                                    $gettinggi = new gettinggi();
                                    $nik = $_POST['nik'];
                                    $bulan = $_POST['bulan'];
                                    $berat = $_POST['bb'];
                                    $tinggi = $_POST['tb'];
                                    $tahun = $_POST['tahun'];
                                    if ($berat == " "){
                                        echo"<script>alert('Berat badan tidak boleh kosong')</script>";
                                    }
                                    else if ($tinggi == " "){
                                        echo"<script>alert('Tinggi badan tidak boleh kosong')</script>";
                                    }
                                    else{
                                    $tambahbb = $getberat->create($id_berat,$nik,$bulan,$berat,$tahun);
                                    $tamhbahtb = $gettinggi->create($id_tinggi,$nik,$bulan,$tinggi,$tahun);
                            
                                    echo"<script>alert('Data Berhasil Ditambah')</script>";
                                    echo "<script>window.location.replace('tumbuh/detail/$nik')</script>";
                                    }
                                }elseif(isset($_POST['btnbatal'])){
                                    $nik = $_POST['nik'];
                                    echo "<script>window.location.replace('tumbuh/detail/$nik')</script>";
                                }
                                
                            
                            ?>
                            
                        </div>
                        <!-- END BASIC INPUTS -->


<?php }
else if($_GET['page']=="editberat"){ ?>

            
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
                                    <h2>Ubah Data Berat Badan Anak</h2>
                                    <p>Masukan secara detail dan benar</p>
                                </div>                                
                            </div>
                                  
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">NIK Anak</label>
                                    <div class="col-md-3">
                                    <input type="text" name ="nik" class="form-control" value="<?= $_GET['nik']?>" readonly>
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
                                    <div class="col-md-3">
                                        <input type="text" name="bb" class="form-control" placeholder="BB">
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
                                        <input type="submit" name="btnsimpan" class="btn btn-info btn-rounded" value="Simpan"/>
                                        <input type="submit" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                require '../pdo/getberat.php';
                                
                                if(isset($_POST['btnsimpan'])){
                                    $getberat = new getberat();
                                   
                                    $nik = $_POST['nik'];
                                    $bulan = $_POST['bulan'];
                                    $berat = $_POST['bb'];
                                    $tahun = $_POST['tahun'];
                                    
                                    if($berat < 1){
                                        echo"<script>alert('Berat Badan Tidak Boleh Kurang Dari 1 Kg')</script>";
                                    }else {
                                        $ubahbb = $getberat->update($bulan,$berat,$tahun);
                                        echo"<script>alert('Data Berat Badan Berhasil Diubah')</script>";
                                        echo "<script>window.location.replace('tumbuh/detail/$nik')</script>";
                                    }

                                   
                                }elseif(isset($_POST['btnbatal'])){
                                    $nik = $_POST['nik'];
                                    echo "<script>window.location.replace('tumbuh/detail/$nik')</script>";
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
                                                        $hbb = $arraybb['berat'];
                                                        $htb = $arraytb['tinggi']/100;


                                                        $bb_ideal = $hbb/($htb*$htb);
                                                        
                                                        
                                                        if($bb_ideal < 18.5){?>
                                                            <h4>Keterangan : Berat Badan Kurang</h4>
                                                        <?php }elseif ($bb_ideal > 18.5 && $bb_ideal <= 24.99){ ?>
                                                            <h4>Keterangan : Berat Badan Ideal</h4>
                                                        <?php }elseif($bb_ideal >=25 && $bb_ideal <=29.99){?>
                                                            <h4>Keterangan : Berat Badan Lebih</h4>
                                                        <?php }elseif($bb_ideal >=30 && $bb_ideal <=39.99){?>
                                                            <h4>Keterangan : Gemuk</h4>
                                                        <?php }elseif($bb_ideal >= 40){?>
                                                            <h4>Keterangan : Sangat Gemuk</h4>
                                                        <?php }?>
                                                    
                                                    
                                                <?php }?>
                                                
                                                <button onclick="window.location.href='tumbuh'" type = "button" class="btn btn-sm btn-clean btn-danger"><span class="fa fa-chevron-left"></span> Kembali</button>
                                                <button onclick="window.location.href='tumbuh/tambah/<?= $_GET['nik']?>'" type = "button" class="btn btn-sm btn-clean btn-success"><span class="fa fa-plus"></span> Tambah</button>
                                                <!-- <button onclick="window.location.href='tumbuh/cetak/<? $_GET['nik']?>'" type = "button" class="btn btn-sm btn-clean btn-info"><span class="fa fa-print"></span> Cetak</button> -->
                                                <a href="cetaktmb.php?nik=<?= $_GET['nik']?>" class="btn btn-sm btn-clean btn-info"><span class="fa fa-print"></span>Cetak</a>
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
                                    <h3>Tabel Berat Badan</h3>
                                    <p>Bulan 1 adalah awal mulai penimbangan berat badan</p> 
                                    <button style="margin-top:20px" onclick="window.location.href='tumbuh/editberat/<?= $_GET['nik']?>'" type = "button" class="btn btn-sm btn-clean btn-warning"><span class="fa fa-edit"></span> Ubah Berat Badan</button>
                                         
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
                                    <p>Bulan 1 adalah awal mulai pengukuran berat badan</p>
                                    <button style="margin-top:20px" onclick="window.location.href='tumbuh/edittinggi/<?= $_GET['nik']?>'" type = "button" class="btn btn-sm btn-clean btn-warning"><span class="fa fa-edit"></span> Ubah Tinggi Badan</button>    
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
<?php }else if($_GET['page']=="edittinggi"){ ?>
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
                                    <h2>Ubah Data Tinggi Badan Anak</h2>
                                    <p>Masukan secara detail dan benar</p>
                                </div>                                
                            </div>
                                  
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">NIK Anak</label>
                                    <div class="col-md-3">
                                    <input type="text" name ="nik" class="form-control" value="<?= $_GET['nik']?>" readonly>
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
                                    <label class="col-md-2 control-label">Tinggi Badan</label>
                                    <div class="col-md-3">
                                        <input type="text" name="tb" class="form-control" placeholder="Tinggi Badan">
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
                                        <input type="submit" name="btnsimpan" class="btn btn-info btn-rounded" value="Simpan"/>
                                        <input type="submit" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                require '../pdo/gettinggi.php';
                                
                                if(isset($_POST['btnsimpan'])){
                                    $gettinggi = new gettinggi();
                                   
                                    $nik = $_POST['nik'];
                                    $bulan = $_POST['bulan'];
                                    $tinggi = $_POST['tb'];
                                    $tahun = $_POST['tahun'];

                                    if($tinggi < 30){
                                        echo"<script>alert('Tinggi Badan Tidak Boleh Kurang Dari 30 cm')</script>";
                                    }else{
                                        $ubahbb = $gettinggi->update($bulan,$tinggi,$tahun);
                                    
                                        echo"<script>alert('Data Tinggi Badan Berhasil Diubah')</script>";
                                        echo "<script>window.location.replace('tumbuh/detail/$nik')</script>";
                                    }
                            
                                    
                                }elseif(isset($_POST['btnbatal'])){
                                    $nik = $_POST['nik'];
                                    echo "<script>window.location.replace('tumbuh/detail/$nik')</script>";
                                }
                                
                            
                            ?>
                            
                        </div>

<?php }?>