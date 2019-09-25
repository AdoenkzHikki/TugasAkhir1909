<?php if($_GET['page']=="dataimunisasi"){?>
    <div class="container"> 
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Daftar data Imunisasi Anak</h5>
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
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jenis Imunisasi</th>
                                            <th>Status</th>
                                            
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
                                            <td><?= date ('d-m-Y', strtotime($data->tgl_lahir)) ?></td>
                                            <td><?= $data->jns_kel ?></td>
                                            <td><?= $data->jenis_imunisasi ?></td>
                                            <td><?= $data->status_imunisasi ?></td>
                                            <!-- <td>
                                                <a href="index.php?page=edit-imunisasi&nik=<?= $data->nik_anak ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                                                <a href="index.php?page=dataimunisasi&delete=<?= $data->nik_anak ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                                            </td> -->
                                        </tr>
                                        <?php }?>
                                        <?php
                                            if(isset($_GET['delete'])){
                                                $nik = $_GET['delete'];
                                                $hapus = $getanak->delete($nik);
                                                echo "<script>window.location.replace('index.php?page=dataimunisasi')</script>";
                                            }
                                        
                                        ?>
                                                                                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>

<?php }
else if($_GET['page']=="edit-imunisasi"){ ?>

            
    <!-- START PAGE HEADING -->
    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="index.php?page=dataimunisasi">Data Imunisasi</a></li>
            <li class="active">Edit Data Imunisasi</li>
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
                        <input type="text" class="form-control" name="nik" value="<?= $data->nik_anak ?>" readonly> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Nama Anak</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nm_anak" value="<?= $data->nm_anak?>"readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Tanggal Lahir</label>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $data->tgl_lahir?>"readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Jenis Kelamin</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="jns_kel" value="<?= $data->jns_kel?>"readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Jenis Imunisasi</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="jenis_imunisasi" value="<?= $data->jenis_imunisasi?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Status Imunisasi</label>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="Belum Terimunisasi">Belum Terimunisasi</option>
                            <option value="Sudah Terimunisasi">Sudah Terimunisasi</option>
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
                    $nik = $_POST['nik'];
                    $id_user = $_SESSION['userid'];
                    $nm_anak = $_POST['nm_anak'];
                    $tgl_lahir =$_POST['tgl_lahir'];
                    $jns_kel = $_POST['jns_kel'];
                    $jenis_imunisasi = $_POST['jenis_imunisasi'];
                    $status_imunisasi = $_POST['status'];
                    $simpan = $getanak->update_imun($nik,$id_user,$nm_anak,$tgl_lahir,$jns_kel,$jenis_imunisasi,$status_imunisasi);

                    echo "<script>window.location.replace('index.php?page=dataimunisasi')</script>";
                }
                else if(isset($_POST['btnbatal'])){
                    echo "<script>window.location.replace('index.php?page=dataimunisasi')</script>";
                }
            ?>
            
            
        </div>
        <!-- END BASIC INPUTS -->
    </div>

<?php }?>