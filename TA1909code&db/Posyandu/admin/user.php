<?php

    error_reporting(0);

    if($_GET['page']=='user') {
?>

<!-- START PAGE CONTAINER -->
<div class="container">



<div class="block block-condensed">
    <!-- START HEADING -->
    <div class="app-heading app-heading-small">
        <div class="title">
            <h5>Data User</h5>
            <p><a href="index.php?page=tambah-user"><span class="fa fa-plus-square-o"></span> Tambah</a></p>
        </div>
    </div>
    <!-- END HEADING -->
    
    <div class="block-content">
        
        <table class="table table-striped table-bordered datatable-extended">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID. User</th>
                    <th>Nama User</th>
                    <th>Level User</th>
                    <th>Status Login</th>
                    <th>[ Aksi ]</th>
                </tr>
            </thead>                                   
            <tbody>
                <?php
                    require '../pdo/user.php';
                    $user = new user();
                    $tampil = $user->read();
                    $no = 1;
                    while($data = $tampil->fetch(PDO::FETCH_OBJ)){
                ?>   
                <tr>
                    <td><?=  $no++ ?></td>
                    <td><?=  $data->id_user ?></td>
                    <td><?=  $data->nama_user ?></td>
                    <td><?=  $data->lev_user ?></td>
                    <td><?=  $data->status_login ?></td>
                    <td>
                        <a href="index.php?page=ubah-user&id=<?= $data->id_user ?>"><span class="fa fa-edit"></span> Ubah </a> &nbsp;
                        <a href="index.php?page=user&delete=<?= $data->id_user ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                    </td>
                </tr>   
                    <?php } ?>
                    
                    <?php
                        if(isset($_GET['delete'])){
                            $id_user = $_GET['delete'];
                            $hapus = $user->delete($id_user);
                            echo "<script>window.location.replace('index.php?page=user')</script>";
                        }
                    
                    ?>
            </tbody>
        </table>
        
    </div>
    
</div>

</div>
<!-- END PAGE CONTAINER -->
<?php
    }else if($_GET['page']=="tambah-user"){
?>
             
             <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form User</h2>
                                    <p>Input Data User</p>
                                </div>                                
                            </div>
                                  
                            <form name="frinput" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ID. User</label>
                                    <div class="col-md-2">
                                        <input type="text" name="id_user" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama User</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nama_user" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Level User</label>
                                    <div class="col-md-10">
                                        <select class="bs-select" name="lev_user">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Operator">Operator</option>                                        
                                        </select>

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
                                require '../pdo/user.php';
                                if(isset($_POST['btnsimpan'])){
                                    $user = new user();
                                    $id_user = $_POST['id_user'];
                                    $nama_user = $_POST['nama_user'];
                                    $pass = md5('123456');
                                    $lev_user = $_POST['lev_user'];
                                    $status_login = 0;
                                    $simpan = $user->create($id_user, $nama_user, $pass, $lev_user, $status_login);
                                    //header('location: index.php?page=user');
                                    echo "<script>window.location.replace('index.php?page=user')</script>";
                                }
                            ?>
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>
         
                
<?php
    }else if($_GET['page']=="ubah-user"){
?>
        <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form User</h2>
                                    <p>Ubah Data User</p>
                                </div>                                
                            </div>
                            <?php
                                require '../pdo/user.php';
                                if(isset($_GET['id'])){
                                    $user = new user();
                                    $get = $user->read_id($_GET['id']);
                                    $data = $get->fetch(PDO::FETCH_OBJ);
                                }
                            ?>
                            <form name="frubah" class="form-horizontal" method="post">
                            
                                <div class="form-group">
                                    <label class="col-md-2 control-label">ID. User</label>
                                    <div class="col-md-2">
                                        <input name="id_user" type="text" class="form-control" value="<?= $data->id_user ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama User</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nama_user" class="form-control" value="<?= $data->nama_user ?>" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Level User</label>
                                    <div class="col-md-10">
                                        <select class="bs-select"name="lev_user">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Operator">Operator</option>                                        
                                        </select>

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
                                    $id_user = $_POST['id_user'];
                                    $nama_user = $_POST['nama_user'];
                                    $lev_user = $_POST['lev_user'];
                                    $simpan = $user->update($id_user, $nama_user, $lev_user);
                                   // header('location: index.php?page=user');
                                   echo "<script>window.location.replace('index.php?page=user')</script>";
                                }

                            ?>
                        </div>
                        <!-- END BASIC INPUTS -->
                        
                    </div>
        

<?php }?>
