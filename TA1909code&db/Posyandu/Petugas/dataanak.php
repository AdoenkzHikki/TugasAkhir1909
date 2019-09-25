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
                                            <td><a href="index.php?page=detailinfo&nik=<?=$data->nik_anak?>"><?= $data->nm_anak ?></td>
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
                                
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <input type="submit" name="btnsimpan" class="btn btn-info btn-rounded" value="Simpan"/>
                                        <input type="reset" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
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
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">

                                <div class="title">
                                        <?php 
                                            require '../pdo/getanak.php';
                                            $getanak = new getanak();
                                            $nik= $_GET['nik'];
                                            $tampil = $getanak->read_id($nik);
                                            while($data=$tampil->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                    <h5>Data Tumbuh Kembang Anak</h5>
                                    <h3>Nama : <?= $data->nm_anak?></h3>
                                    <h3>NIK : <?= $data->nik_anak ?></h3>
                                    <h3>Jenis Kelamin : <?= $data->jns_kel?></h3>
                                        <?php }?>
                                    <p>
                                        <button onclick="window.location.href='index.php?page=tambah-anak&nik=<?=$_GET['nik']?>'" type = "button" class="btn btn-sm btn-clean btn-success"><span class="fa fa-plus"></span> Tambah</button>
                                        <button onclick="window.location.href='index.php?page=detailgrafik&nik=<?=$_GET['nik']?>'" type = "button" class="btn btn-sm btn-clean btn-primary"><span class="fa fa-line-chart"></span> Grafik</button>
                                        <button onclick="window.location.href='index.php?page=cetak'" type = "button" class="btn btn-sm btn-clean btn-info"><span class="icon-printer"></span> Cetak</button>
                                        <button style="margin-left:750px" onclick="window.location.href='index.php?page=dataanak'" type = "button" class="btn btn-sm btn-clean btn-danger"><span class="fa fa-chevron-left"></span> Kembali</button>

                                    </p>
                                </div>
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
                                    
                            <!-- END HEADING -->
                            
                            <div class="block-content">
                                
                                <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>BB</th>
                                            <th>TB</th>
                                            <th>Tahun</th>
                                            <th>[[Aksi]]</th>
                                            
                                            
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php 
                                            require '../pdo/getgrafik.php';
                                            $getgrafik = new getgrafik();
                                            $nik = $_GET['nik'];
                                            $tahun = $_POST['tahun'];
                                            $tampil = $getgrafik->read_id($nik,$tahun);
                                            $no = 1;
                                            while($data = $tampil->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->bulan ?></td>
                                            <td><?= $data->berat_badan ?></td>
                                            <td><?= $data->tinggi_badan ?></td>
                                            <td><?= $data->tahun?></td>
                                            <td>
                                                <a href="index.php?page=editdetail&id_anak=<?= $data->id_anak ?>"><span class="fa fa-edit"></span> Ubah </a>
                                                <a href="index.php?page=detailinfo&delete=<?= $data->id_anak ?>&nik=<?= $data->nik_anak?>"><span class="fa fa-trash-o"></span> Hapus </a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <?php
                                            if(isset($_GET['delete'])){
                                                $id_anak = $_GET['delete'];
                                                $nik = $_GET['nik'];
                                                $hapus = $getgrafik->delete($id_anak);
                                                echo "<script>window.location.replace('index.php?page=detailinfo&nik=$nik')</script>";
                                            }
                                        
                                        ?>
                                                                                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>
<?php } ?>