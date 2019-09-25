<?php

    error_reporting(0);

    if($_GET['page']=='tentang') {
?>

<!-- START PAGE CONTAINER -->
<div class="container">



<div class="block block-condensed">
    <!-- START HEADING -->
    <div class="app-heading app-heading-small">
        <div class="title">
            <h5>Data Tentang Perusahaan</h5>
            <p><a href="index.php?page=tambah-tentang"><span class="fa fa-plus-square-o"></span> Tambah</a></p>
        </div>
    </div>
    <!-- END HEADING -->
    
    <div class="block-content">
        
        <table class="table table-striped table-bordered datatable-extended">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID. About</th>
                    <th>Tentang Perusahaan</th>
                    <th>[ Aksi ]</th>
                </tr>
            </thead>                                   
            <tbody>
                <?php
                    require '../pdo/about.php';
                    $about = new about();
                    $tampil = $about->read();
                    $no = 1;
                    while($data = $tampil->fetch(PDO::FETCH_OBJ)){
                ?>  
                <tr>
                    <td><?=  $no++ ?></td>
                    <td><?=  $data->id_about ?></td>
                    <td><?=  $data->judul ?></td>
                    
                    <td>
                        <a href="index.php?page=ubah-tentang&id=<?= $data->id_about ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                        <a href="index.php?page=tentang&delete=<?= $data->id_about ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                    </td>
                </tr>   
                    <?php } ?>
                    
                    <?php
                        if(isset($_GET['delete'])){
                            $id_about = $_GET['delete'];
                            $hapus = $about->delete($id_about);
                            echo "<script>window.location.replace('index.php?page=tentang')</script>";
                        }
                    
                    ?>                                      
            </tbody>
        </table>
        
    </div>
    
</div>

</div>
<!-- END PAGE CONTAINER -->
<?php
    }else if($_GET['page']=="tambah-tentang"){
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
                                    <label class="col-md-2 control-label">ID. About</label>
                                    <div class="col-md-2">
                                        <input type="text" name="id_about" class="form-control" value="[AUTO]" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul</label>
                                    <div class="col-md-10">
                                        <input type="text" name="judul" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tentang Perusahaan</label>
                                    <div class="col-md-10">
                                        <textarea id="richtext" name="detail_about" class="form-control" rows="5"></textarea>
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
                                require '../pdo/about.php';
                                if(isset($_POST['btnsimpan'])){
                                    $about = new about();
                                    $judul = $_POST['judul'];
                                    $detail_about = $_POST['detail_about'];
                                    $simpan = $about->create($judul, $detail_about);
                                
                                    echo "<script>window.location.replace('index.php?page=tentang')</script>";
                                }
                            ?>
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>
         
                
<?php
    }else if($_GET['page']=="ubah-tentang"){
?>
        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Tentang</h2>
                                    <p>Ubah Data Tentang Perusahaan</p>
                                </div>                                
                            </div>
                            <?php
                                require '../pdo/about.php';
                                if(isset($_GET['id'])){
                                    $about = new about();
                                    $get = $about->read_id($_GET['id']);
                                    $data = $get->fetch(PDO::FETCH_OBJ);
                                }
                            ?>
                                  
                            <form name="frupdate" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ID</label>
                                    <div class="col-md-2">
                                        <input type="text"  name="id_about"class="form-control" value="<?= $data->id_about ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul</label>
                                    <div class="col-md-10">
                                        <input type="text" name="judul" class="form-control" value="<?= $data->judul ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tentang Perusahaan</label>
                                    <div class="col-md-10">
                                        <textarea id="richtext" name="detail_about" class="form-control" rows="5"><?= $data->detail_about ?></textarea>
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
                                if(isset($_POST['btnubah'])){
                                    $id_about = $_POST['id_about'];
                                    $judul = $_POST['judul'];
                                    $detail_about = $_POST['detail_about'];
                                    $simpan = $about->update($id_about, $judul, $detail_about);
                                   // header('location: index.php?page=user');
                                   echo "<script>window.location.replace('index.php?page=tentang')</script>";
                                }

                            ?>
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>

<?php }?>
