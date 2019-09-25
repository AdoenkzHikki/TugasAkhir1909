<?php

    error_reporting(0);

    if($_GET['page']=='informasi') {
?>

<!-- START PAGE CONTAINER -->
<div class="container">



    <div class="block block-condensed">
    <!-- START HEADING -->
    <div class="app-heading app-heading-small">
        <div class="title">
            <h5>Data Informasi Perusahaan</h5>
            <p><a href="index.php?page=tambah-informasi"><span class="fa fa-plus-square-o"></span> Tambah</a></p>
        </div>
    </div>
    <!-- END HEADING -->
    
    <div class="block-content">
        
        <table class="table table-striped table-bordered datatable-extended">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID. Post</th>
                    <th>Tgl. Post</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>[ Aksi ]</th>
                </tr>
            </thead>                                   
            <tbody>
                <?php 
                    require "../pdo/informasi.php";
                    $informasi = new informasi();
                    $tampil = $informasi->read();
                    $no = 1;
                    while($data = $tampil->fetch(PDO::FETCH_OBJ)){
  
                ?>  
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->id_post ?></td>
                    <td><?= date_format(date_create($data->tgl_post, 'd-m-Y')); ?></td>
                    <td><?= $data->judul ?></td>
                    <td><?= $data->status_aktif ?></td>
                    <td>
                        <a href="index.php?page=ubah-informasi&id=<?= $data->id_post ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                        <a href="index.php?page=informasi&delete=<?= $data->id_post ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                    </td>
                </tr>
                    <?php } ?>  

                <?php
                    if(isset($_GET['delete'])){
                        $id_post = $_GET['delete'];
                        $hapus = $informasi->delete($id_post);
                        echo "<script>window.location.replace('index.php?page=informasi')</script>";
                    }

                ?>  
                                                    
            </tbody>
        </table>
        
    </div>
    
    </div>

</div>
<!-- END PAGE CONTAINER -->
<?php
    }else if($_GET['page']=="tambah-informasi"){
?>
             
             <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Informasi</h2>
                                    <p>Input Data Informasi</p>
                                </div>                                
                            </div>
                                  
                            <form name="frinput" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tgl. Post</label>
                                    <div class="col-md-2">
                                    <div class="input-group bs-datepicker">
                                            <input type="text" name="tgl_post" class="form-control">
                                            <span class="input-group-addon">
                                                <span class="icon-calendar-full"></span>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kategori Informasi</label>
                                    <div class="col-md-10">
                                        <select class="bs-select" data-live-search="true" name="id_kategori">
                                        <?php 
                                            require '../pdo/kategoriinformasi.php';
                                            $kategori = new kategoriinformasi();
                                            $tampil = $kategori->read();
                                            $no = 1;
                                            while($combo = $tampil->fetch(PDO::FETCH_OBJ)){
  
                                        ?>
                                            <option value="<?= $combo->$id_kategori ?>"><?= $combo->kategori_post ?></option>
                                        <?php } ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul</label>
                                    <div class="col-md-10">
                                        <input type="text" name="judul" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Foto Header</label>
                                    <div class="col-md-10">
                                        <input type="file" name="foto_header" class="form-control" accept="image/jpeg">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Isi informasi</label>
                                    <div class="col-md-10">
                                        <textarea id="richtext" name="isi_post" class="form-control" rows="5"></textarea>
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
                                require "../pdo/informasi.php";
                                require "upload.php";
                                if(isset($_POST['btnsimpan'])){
                                    $foto_tmp   = $_FILES['foto_header']['tmp_name'];
                                    $foto_name  = $_FILES['foto_header']['name'];
                                    $foto_type  = $_FILES['foto_header']['type'];
                                    $foto_size  = $_FILES['foto_header']['size'];


                                    upload_foto($foto_name,$foto_type);

                                    echo "<script>window.location.replace('index.php?page=informasi')</script>";


                                }
                            ?>
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>
         
                
<?php
    }else if($_GET['page']=="ubah-informasi"){
?>
        <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Informasi</h2>
                                    <p>Ubah Data Informasi</p>
                                </div>                                
                            </div>
                            <?php
                                require '../pdo/informasi.php';
                                if(isset($_GET['id'])){
                                    $informasi = new informasi();
                                    $get = $informasi->read_id($_GET['id']);
                                    $data = $get->fetch(PDO::FETCH_OBJ);
                                }
                            ?>
                                  
                            <form name="frupdate" method="post" enctype="multipart/form-data"class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tgl. Post</label>
                                    <div class="col-md-2">
                                    <div class="input-group bs-datepicker">
                                            <input type="texts" name="tgl_post" class="form-control" value="<?= $data->tgl_post ?>">
                                            <span class="input-group-addon">
                                                <span class="icon-calendar-full"></span>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kategori Informasi</label>
                                    <div class="col-md-10">
                                    <select class="bs-select" data-live-search="true" name="id_kategori">
                                        <option value="<?= $data->id_kategori ?>"><?= $data->kategori_post ?></option>
                                        <?php 
                                            require '../pdo/kategoriinformasi.php';
                                            $kategori = new kategoriinformasi();
                                            $tampil = $kategori->read();
                                            $no = 1;
                                            while($combo = $tampil->fetch(PDO::FETCH_OBJ)){
  
                                        ?>
                                            <option value="<?= $combo->$id_kategori ?>"><?= $combo->kategori_post ?></option>
                                        <?php } ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul</label>
                                    <div class="col-md-10">
                                        <input type="text" name="judul" class="form-control" value="<?= $data->judul ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Foto Header</label>
                                    <div class="col-md-10">
                                        <input type="file" name="foto_header" class="form-control"><br>
                                        <img src="../media/thumbs/<?= $data->thumbs ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Isi informasi</label>
                                    <div class="col-md-10">
                                        <textarea id="richtext" name="isi_informasi" class="form-control" rows="5"><?= $data->isi_post ?></textarea>
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
                                require "../pdo/informasi.php";
                                require "upload.php";
                                if(isset($_POST['btnubah'])){
                                    $foto_tmp   = $_FILES['foto_header']['tmp_name'];
                                    $foto_name  = $_FILES['foto_header']['name'];
                                    $foto_type  = $_FILES['foto_header']['type'];
                                    $foto_size  = $_FILES['foto_header']['size'];

                                    upload_foto($foto_name,$foto_type);

                                    echo "<script>window.location.replace('index.php?page=informasi')</script>";


                                }
                            ?>

                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>

<?php }?>
