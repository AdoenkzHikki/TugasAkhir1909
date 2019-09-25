<?php if($_GET['page']=="datavitamin"){?>
    <div class="container"> 
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Daftar Data Vitamin</h5>
                                        <!-- <p>
                                            <button onclick="window.location.href='index.php?page=tambah-datavitamin'" type = "button" class="btn btn-sm btn-clean btn-success"><span class="fa fa-plus"></span> Tambah</button>
                                            <button onclick="window.location.href='index.php?page='" type = "button" class="btn btn-sm btn-clean btn-info"><span class="icon-printer"></span> Cetak</button>
                                        </p> -->
                                </div>
                            </div>
                            <!-- END HEADING -->
                            
                            <div class="block-content">
                                
                                <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Vitamin</th>
                                            <th>Jumlah Stok</th>
                                            <th>Keterangan</th>
                                            
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php 
                                            require '../pdo/getvitamin.php';
                                            $getvitamin = new getvitamin();
                                            $tampil = $getvitamin->read();
                                            $no = 1;
                                            while($data = $tampil->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->jns_vitamin ?></td>
                                            <td><?= $data->jml_stok ?></td>
                                            <td><?= $data->keterangan ?></td>
                                            <!-- <td>
                                                <a href="index.php?page=edit-datavitamin&id_vitamin=<?= $data->id_vitamin ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                                                <a href="index.php?page=datavitamin&delete=<?= $data->id_vitamin ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                                            </td> -->
                                        </tr>
                                        <?php }?>
                                        <?php
                                            if(isset($_GET['delete'])){
                                                $id_vitamin = $_GET['delete'];
                                                $hapus = $getvitamin->delete($id_vitamin);
                                                echo "<script>window.location.replace('index.php?page=datavitamin')</script>";
                                            }
                                        
                                        ?>
                                                                                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>
<?php } 
else if($_GET['page']=="tambah-datavitamin"){ ?>

            
                    <!-- START PAGE HEADING -->
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="index.php?page=datavitamin">Data Vitamin</a></li>
                            <li class="active">Tambah Data Vitamin</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                   
                    <!-- START PAGE CONTAINER -->                    
                    <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Input Data Vitamin</h2>
                                    <p>Masukan data vitamin dengan benar</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal" method="post" name="frinput">
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Jenis Vitamin</label>
                                    <div class="col-md-10">
                                        <input type="text" name = "jns_vitamin" class="form-control" placeholder="Jenis Vitamin">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Jumlah Stok</label>
                                    <div class="col-md-10">
                                        <input type="text" name="jml_stok" class="form-control" placeholder="Jumlah Stok">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Keterangan</label>
                                    <div class="col-md-3">
                                        <select name="keterangan" class="form-control">
                                            <option  value="Untuk Anak">Untuk Anak</option>
                                            <option value="Untuk Balita">Untuk Balita</option>
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
                                require '../pdo/getvitamin.php';
                                if(isset($_POST['btntambah'])){
                                    $getvitamin = new getvitamin();
                                    $jns_vitamin = $_POST['jns_vitamin'];
                                    $keterangan = $_POST['keterangan'];
                                    $jml_stok = $_POST['jml_stok'];
                                    $tambah = $getvitamin->create($id_vitamin,$jns_vitamin,$jml_stok,$keterangan);

                                    echo "<script>window.location.replace('index.php?page=datavitamin')</script>";

                                }
                            
                            
                            
                            ?>
                            
                            
                        </div>
                        <!-- END BASIC INPUTS -->


<?php }
else if($_GET['page']=="edit-datavitamin"){ ?>

            
    <!-- START PAGE HEADING -->
    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="index.php?page=datavitamin">Data Vitamin</a></li>
            <li class="active">Edit Data Vitamin</li>
        </ul>
    </div>
    <!-- END PAGE HEADING -->
   
    <!-- START PAGE CONTAINER -->                    
    <div class="container">
        
        <!-- BASIC INPUTS -->
        <div class="block">                        
            
            <div class="app-heading app-heading-small">                                
                <div class="title">
                    <h2>Edit Data Vitamin</h2>
                    <p>Edit secara detail dan benar</p>
                </div>                                
            </div>
            <?php
                require '../pdo/getvitamin.php';
                if(isset($_GET['id_vitamin'])){
                    $getvitamin = new getvitamin();
                    $id_vitamin = $_GET['id_vitamin'];
                    $get = $getvitamin->read_id($id_vitamin);
                    $data = $get->fetch(PDO::FETCH_OBJ);
                }
            ?>
            <form class="form-horizontal" method="post" name="frinput">
                <div class="form-group">
                    <label class="col-md-2 control-label">Jenis Vitamin</label>
                    <div class="col-md-10">
                        <input type="text" name = "jns_vitamin" class="form-control" value="<?= $data->jns_vitamin ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Jumlah Stok</label>
                    <div class="col-md-10">
                        <input type="text" name="jml_stok" class="form-control" value="<?=$data->jml_stok?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Keterangan</label>
                    <div class="col-md-3">
                        <select name="keterangan" class="form-control">
                            <option  value="Untuk Anak">Untuk Anak</option>
                            <option value="Untuk Balita">Untuk Balita</option>
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
                if(isset($_POST['btnsimpan'])){
                    
                    $jns_vitamin = $_POST['jns_vitamin'];
                    $keterangan = $_POST['keterangan'];
                    $jml_stok = $_POST['jml_stok'];
                    $simpan = $getvitamin->update($id_vitamin,$jns_vitamin,$jml_stok,$keterangan);

                    echo "<script>window.location.replace('index.php?page=datavitamin')</script>";
                }
                else if(isset($_POST['btnbatal'])){
                    echo "<script>window.location.replace('index.php?page=datavitamin')</script>";
                }
            ?>
            
            
        </div>
        <!-- END BASIC INPUTS -->
    </div>

<?php }?>