<?php

    error_reporting(0);

    if($_GET['page']=='layanan') {
?>

<!-- START PAGE CONTAINER -->
<div class="container">



<div class="block block-condensed">
    <!-- START HEADING -->
    <div class="app-heading app-heading-small">
        <div class="title">
            <h5>Data Tentang Perusahaan</h5>
            <p><a href="index.php?page=tambah-layanan"><span class="fa fa-plus-square-o"></span> Tambah</a></p>
        </div>
    </div>
    <!-- END HEADING -->
    
    <div class="block-content">
        
        <table class="table table-striped table-bordered datatable-extended">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID. Layanan</th>
                    <th>Judul Layanan</th>
                    <th>[ Aksi ]</th>
                </tr>
            </thead>                                   
            <tbody>
                <?php
                    require '../pdo/layanan.php';
                    $layanan = new layanan();
                    $tampil = $layanan->read();
                    $no = 1;
                    while($data = $tampil->fetch(PDO::FETCH_OBJ)){
                ?>  
                <tr>
                    <td><?=  $no++ ?></td>
                    <td><?=  $data->id_layanan ?></td>
                    <td><?=  $data->nama_layanan ?></td>
                    
                    <td>
                        <a href="index.php?page=ubah-layanan&id=<?= $data->id_layanan ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                        <a href="index.php?page=layanan&delete=<?= $data->id_layanan ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                    </td>
                </tr>   
                    <?php } ?>
                    
                    <?php
                        if(isset($_GET['delete'])){
                            $id_layanan = $_GET['delete'];
                            $hapus = $layanan->delete($id_layanan);
                            echo "<script>window.location.replace('index.php?page=layanan')</script>";
                        }
                    
                    ?>                                      
            </tbody>
        </table>
        
    </div>
    
</div>

</div>
<!-- END PAGE CONTAINER -->
<?php
    }else if($_GET['page']=="tambah-layanan"){
?>
             
             <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Tentang</h2>
                                    <p>Input Data Tentang Perusahaan</p>
                                </div>                                
                            </div>
                                  
                            <form name="frinput" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ID. Layanan</label>
                                    <div class="col-md-2">
                                        <input type="text" name="id_layanan" class="form-control" value="[AUTO]" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul Layanan</label>
                                    <div class="col-md-2">
                                        <input type="text" name="nama_layanan" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Informasi Layanan</label>
                                    <div class="col-md-10">
                                        <textarea id="richtext" name="isi_layanan" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <input type="submit" name="btnsimpan" class="btn btn-info btn-rounded" value="Simpan"/>
                                        <input type="reset" name="btnubah" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php
                                require '../pdo/layanan.php';
                                if(isset($_POST['btnsimpan'])){
                                    $layanan = new layanan();
                                    $nama_layanan = $_POST['nama_layanan'];
                                    $slug_layanan = strtolower($nama_layanan);
                                    $slug_layanan = str_ireplace("","-", $slug_layanan);
                                    $isi_layanan = $_POST['isi_layanan'];
                                    $simpan = $layanan->create($nama_layanan, $slug_layanan,$isi_layanan);
                                
                                    echo "<script>window.location.replace('index.php?page=layanan')</script>";
                                }
                            ?>
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>
         
                
<?php
    }else if($_GET['page']=="ubah-layanan"){
?>
    <div class="container">
        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Tentang</h2>
                                    <p>Ubah Data Tentang Perusahaan</p>
                                </div>                                
                            </div>
                            <?php
                                require '../pdo/layanan.php';
                                if(isset($_GET['id'])){
                                    $layanan = new layanan();
                                    $get = $layanan->read_id($_GET['id']);
                                    $data = $get->fetch(PDO::FETCH_OBJ);
                                }
                            ?>
                                  
                            <form name="frupdate" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ID. Layanan</label>
                                    <div class="col-md-2">
                                        <input type="text"  name="id_layanan" class="form-control" value="<?= $data->id_layanan ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul Layanan</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nama_layanan" class="form-control" value="<?= $data->nama_layanan ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Informasi Layanan</label>
                                    <div class="col-md-10">
                                        <textarea id="richtext" name="isi_layanan" class="form-control" rows="5"><?= $data->isi_layanan ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <input type="submit" name="btnubah" class="btn btn-info btn-rounded" value="Ubah"/>
                                        <input type="reset" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php
                                require '../pdo/layanan.php';
                                if(isset($_POST['btnubah'])){
                                    $layanan = new layanan();
                                    $nama_layanan = $_POST['nama_layanan'];
                                    $slug_layanan = strtolower($nama_layanan);
                                    $slug_layanan = str_ireplace("","-", $slug_layanan);
                                    $isi_layanan = $_POST['isi_layanan'];
                                    $id_user = $_SESSION['userid'];
                                    $simpan = $layanan->update($id_layanan,$nama_layanan, $slug_layanan,$isi_layanan);
                                
                                    echo "<script>window.location.replace('index.php?page=layanan')</script>";
                                }
                            ?>
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
        </div>

<?php }?>
