<?php

    error_reporting(0);

    if($_GET['page']=='kategori-informasi') {
?>

<!-- START PAGE CONTAINER -->
<div class="container">



<div class="block block-condensed">
    <!-- START HEADING -->
    <div class="app-heading app-heading-small">
        <div class="title">
            <h5>Data Kategori Informasi</h5>
            <p><a href="index.php?page=tambah-kategori-informasi"><span class="fa fa-plus-square-o"></span> Tambah</a></p>
        </div>
    </div>
    <!-- END HEADING -->
    
    <div class="block-content">
        
        <table class="table table-striped table-bordered datatable-extended">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori Informasi</th>
                    <th>[ Aksi ]</th>
                </tr>
            </thead>                                   
            <tbody>
                <?php 
                    require '../pdo/kategoriinformasi.php';
                    $kategori = new kategoriinformasi();
                    $tampil = $kategori->read();
                    $no = 1;
                    while($data = $tampil->fetch(PDO::FETCH_OBJ)){
  
                ?>
                <tr>
                    <td><?=  $no++ ?></td>
                    <td><?=  $data->kategori_post ?></td>
                    
                    <td>
                        <a href="index.php?page=ubah-kategori-informasi&id=<?= $data->id_kategori ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                        <a href="index.php?page=kategori-informasi&delete=<?= $data->id_kategori ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                    </td>
                </tr>   
                <?php } ?>

                <?php
                    if(isset($_GET['delete'])){
                        $id_kategori = $_GET['delete'];
                        $hapus = $kategori->delete($id_kategori);
                        echo "<script>window.location.replace('index.php?page=kategori-informasi')</script>";
                    }

                ?>
                        
            </tbody>
        </table>
        
    </div>
    
</div>

</div>
<!-- END PAGE CONTAINER -->
<?php
    }else if($_GET['page']=="tambah-kategori-informasi"){
?>
             
             <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Kategori</h2>
                                    <p>Input Data Kategori</p>
                                </div>                                
                            </div>
                                  
                            <form name="frinput" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ID</label>
                                    <div class="col-md-2">
                                        <input type="text" name="id_kategori" class="form-control" value="[AUTO]" disabled>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kategori Informasi</label>
                                    <div class="col-md-10">
                                    <input type="text" name="kategori_post" class="form-control">
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
                                require '../pdo/kategoriinformasi.php';
                                if(isset($_POST['btnsimpan'])){
                                    $kategori = new kategoriinformasi();
                                    $kategori_post = $_POST['kategori_post'];
                                    $kategori_slug = strtolower($kategori_post);
                                    $kategori_slug = str_ireplace(" ","-",$kategori_slug);
                                    $simpan = $kategori->create($kategori_post, $kategori_slug);
                                
                                    echo "<script>window.location.replace('index.php?page=kategori-informasi')</script>";
                                }
                            ?>
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>
         
                
<?php
    }else if($_GET['page']=="ubah-kategori-informasi"){
?>
        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Kategori</h2>
                                    <p>Ubah Data Kategori Informasi</p>
                                </div>                                
                            </div>
                            <?php
                                require '../pdo/kategoriinformasi.php';
                                if(isset($_GET['id'])){
                                    $kategori = new kategoriinformasi();
                                    $get = $kategori->read_id($_GET['id']);
                                    $data = $get->fetch(PDO::FETCH_OBJ);
                                }
                            ?>
                                  
                            <form name="frupdate" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ID</label>
                                    <div class="col-md-2">
                                        <input type="text" name="id_kategori" class="form-control" value="<?= $data->id_kategori ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kategori Informasi</label>
                                    <div class="col-md-10">
                                    <input type="text" name="kategori_post" class="form-control" value="<?= $data->kategori_post ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <input type="submit" name="btnubah" class="btn btn-info btn-rounded" value="Simpan"/>
                                        <input type="reset" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['btnubah'])){
                                    $id_kategori = $_POST['id_kategori'];
                                    $kategori_post = $_POST['kategori_post'];
                                    $kategori_slug = strtolower($kategori_post);
                                    $kategori_slug = str_ireplace(" ","-",$kategori_slug);
                                    $simpan = $kategori->update($id_kategori, $kategori_post, $kategori_slug);
                                
                                    echo "<script>window.location.replace('index.php?page=kategori-informasi')</script>";
                                }

                            ?>
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>

<?php }?>
