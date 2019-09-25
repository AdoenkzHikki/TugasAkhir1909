<?php if($_GET['page']=="pendaftar"){?>
    <div class="container"> 
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Daftar Nama Pendaftar Posyandu Mekar Delima</h5>
                                        <!-- <p>
                                            <button onclick="window.location.href='index.php?page=tambah'" type = "button" class="btn btn-sm btn-clean btn-success"><span class="fa fa-plus"></span> Tambah</button>
                                            <button onclick="window.location.href='index.php?page=tambah'" type = "button" class="btn btn-sm btn-clean btn-info"><span class="icon-printer"></span> Cetak</button>
                                        </p> -->
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
                                            <td><?= $data->nm_anak ?></td>
                                            <td><?= $data->nm_ayah ?></td>
                                            <td><?= $data->nm_ibu ?></td>
                                            <td><?= $data->tgl_lahir ?></td>
                                            <td><?= $data->jns_kel ?></td>
                                            <td><?= $data->rt ?></td>
                                            <!-- <td>
                                                <a href="index.php?page=edit&nik=<?= $data->nik_anak ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                                                <a href="index.php?page=pendaftar&delete=<?= $data->nik_anak ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                                            </td> -->
                                        </tr>
                                        <?php }?>
                                        <?php
                                            if(isset($_GET['delete'])){
                                                $nik = $_GET['delete'];
                                                $hapus = $getanak->delete($nik);
                                                echo "<script>window.location.replace('index.php?page=pendaftar')</script>";
                                            }
                                        
                                        ?>
                                                                                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>
<?php } 
else if($_GET['page']=="tambah"){ ?>

            
                    <!-- START PAGE HEADING -->
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="index.php?page=pendaftar">Data Pendaftar</a></li>
                            <li class="active">Tambah Pendaftar</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                   
                    <!-- START PAGE CONTAINER -->                    
                    <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Input Data Pendaftar</h2>
                                    <p>Masukan secara detail dan benar</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal" method="post" name="frinput">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">NIK Anak</label>
                                <div class="col-md-10">
                                    <input type="text" name = "nik" class="form-control" placeholder="Nomor Induk Keluarga Anak">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Anak</label>
                                    <div class="col-md-10">
                                    <input type="text" name="nm_anak" class="form-control" placeholder="Nama Lengkap Anak">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Ayah</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nm_ayah" class="form-control" placeholder="Nama Lengkap Ayah">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Ibu</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nm_ibu" class="form-control" placeholder="Nama Lengkap Ibu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tanggal Lahir</label>
                                    <div class="col-md-3">
                                        <input type="date" name="tgl_lahir" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Jenis Kelamin</label>
                                    <div class="col-md-3">
                                        <select name="jns_kel" class="form-control">
                                            <option  value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">RT</label>
                                    <div class="col-md-10">
                                        <input type="text" name ="rt" class="form-control" placeholder="Masukan RT" >
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
                                require '../pdo/getanak.php';
                                if(isset($_POST['btntambah'])){
                                    $getanak = new getanak();
                                    $nik = $_POST['nik'];
                                    $id_user = $_SESSION['userid'];
                                    $nm_anak = $_POST['nm_anak'];
                                    $nm_ayah = $_POST['nm_ayah'];
                                    $nm_ibu = $_POST['nm_ibu'];
                                    $tgl_lahir =$_POST['tgl_lahir'];
                                    $jns_kel = $_POST['jns_kel'];
                                    $rt = $_POST['rt'];
                                    $tambah = $getanak->create($nik,$id_user,$nm_anak,$nm_ayah,$nm_ibu,$tgl_lahir,$jns_kel,$rt);

                                    echo "<script>window.location.replace('index.php?page=pendaftar')</script>";

                                }
                            
                            
                            
                            ?>
                            
                            
                        </div>
                        <!-- END BASIC INPUTS -->


<?php }
else if($_GET['page']=="edit"){ ?>

            
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
                    <p>Edit secara detail dan benar</p>
                </div>                                
            </div>
            <?php
                require '../pdo/getanak.php';
                if(isset($_GET['nik'])){
                    $getanak = new getanak();
                    $nik = $_GET['nik'];
                    $get = $getanak->read_id($nik);
                    $data = $get->fetch(PDO::FETCH_OBJ);
                }
            ?>
            <form method="post" name="frubah" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-2 control-label">NIK Anak</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nik" value="<?= $data->nik_anak ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Nama Anak</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nm_anak" value="<?= $data->nm_anak?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Nama Ayah</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nm_ayah" value="<?= $data->nm_ayah?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Nama Ibu</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nm_ibu" value="<?= $data->nm_ibu?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Tanggal Lahir</label>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $data->tgl_lahir?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Jenis Kelamin</label>
                    <div class="col-md-3">
                        <select name="jns_kel" class="form-control">
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">RT</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="rt" value="<?= $data->rt ?>">
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
                    $nik = $_POST['nik'];
                    $id_user = $_SESSION['userid'];
                    $nm_anak = $_POST['nm_anak'];
                    $nm_ayah = $_POST['nm_ayah'];
                    $nm_ibu = $_POST['nm_ibu'];
                    $tgl_lahir =$_POST['tgl_lahir'];
                    $jns_kel = $_POST['jns_kel'];
                    $rt = $_POST['rt'];
                    $simpan = $getanak->update($nik,$id_user,$nm_anak,$nm_ayah,$nm_ibu,$tgl_lahir,$jns_kel,$rt);

                    echo "<script>window.location.replace('index.php?page=pendaftar')</script>";
                }
                else if(isset($_POST['btnbatal'])){
                    echo "<script>window.location.replace('index.php?page=pendaftar')</script>";
                }
            ?>
            
            
        </div>
        <!-- END BASIC INPUTS -->
    </div>

<?php }?>