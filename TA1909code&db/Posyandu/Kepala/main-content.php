
<?php if ($_GET['page']==""){ ?>

    <div class="container">
        <div class="block block-condensed">
            <div style="margin-top:30px">
                <h1 style="text-align:center">Selamat Datang di Sistem Informasi Posyandu</h1>
                <h1 style="text-align:center">Mekar Delima</h1> 
                
            </div>
                        <div style="margin-left:200px">
                                <div>
                                    <div class="col-md-3">
                                        
                                        <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                            <li>                                        
                                                <!-- START WIDGET -->
                                                <div onclick="window.location.href='index.php?page=pendaftar'" class="app-widget-tile app-widget-tile-success">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="icon icon-lg">
                                                                <span class="fa fa-group"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">                                                    
                                                            <div class="line">
                                                                <div class="title">Jumlah Pendaftar</div> 
                                                                        
                                                            </div>
                                                            <?php 
                                                                require '../pdo/hitung.php';
                                                                $hitung = new hitung();
                                                                $tampil = $hitung->read();
                                                                $jml = $tampil->fetchColumn();
                                                            ?>                                        
                                                            <div class="intval text-center"><?= $jml ?></div>
                                                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END WIDGET -->                                        
                                            </li> 
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                                <div>
                                    <div class="col-md-3">
                                        
                                        <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                            <li>                                        
                                                <!-- START WIDGET -->
                                                <div class="app-widget-tile app-widget-tile-danger">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="icon icon-lg">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">                                                    
                                                            <div class="line">
                                                                <div class="title">Jumlah Anak</div>         
                                                            </div>
                                                            <?php 
                                                                // require '../pdo/hitung.php';
                                                                $tampil = $hitung->read_anak()->fetch(PDO::FETCH_OBJ);
                                                                // $jml = $tampil->fetch(PDO::FETCH_OBJ);
                                                            
                                                            ?>                                        
                                                            <div class="intval text-center"><?= $tampil->jml ?></div>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END WIDGET -->                                        
                                            </li> 
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                                <div>
                                    <div class="col-md-3">
                                        
                                        <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                            <li>                                        
                                                <!-- START WIDGET -->
                                                <div class="app-widget-tile app-widget-tile-warning">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="icon icon-lg">
                                                                <span class="fa fa-child"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">                                                    
                                                            <div class="line">
                                                                <div class="title">Jumlah Balita</div>         
                                                            </div>
                                                            <?php 
                                                            
                                                            $tampil = $hitung->read_balita()->fetch(PDO::FETCH_OBJ);
                                                            
                                                            ?>                                        
                                                            <div class="intval text-center"><?= $tampil->jml ?></div>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END WIDGET -->                                        
                                            </li> 
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                                

                                
                                    
                        </div> 
        </div>           
    </div>
<?php } 
else if($_GET['page']=="ubahpass") { ?>

<!-- START PAGE HEADING -->
<div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Ubah Password</a></li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                   
                    <!-- START PAGE CONTAINER -->                    
                    <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Form Ubah Password</h2>
                                    <p>Masukan secara detail dan benar</p>
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal" method="post" name="frinput">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Password Baru</label>
                                <div class="col-md-3">
                                    <input type="password" name = "passbaru" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Konfirmasi Password Baru</label>
                                    <div class="col-md-3">
                                    <input type="password" name="konfirpass" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <input type="submit" name="btnsimpan" class="btn btn-success btn-rounded" value="Simpan"/>
                                        <input type="reset" name="btnubah" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                require '../pdo/user.php';
                                if(isset($_POST['btnsimpan'])){

                                
                                        $user = new user();
                                        $id_user = $_SESSION['userid'];
                                        $pass = $_POST['passbaru'];
                                        $konfirpass = $_POST['konfirpass'];

                                        if($konfirpass == $pass){

                                            $tambah = $user->update_pass($id_user,$pass);
                                            echo"<script>alert('Password Berhasil Diubah')</script>";
                                            
                                            echo "<script>window.location.replace('index.php')</script>";
                                            
                                        }else{
                                            echo "<script>alert('Password yang Anda masukkan belum sama')</script>";
                                           
                                        }
                                    }?>
                            
                            
                            

                            
                            
                        </div>
                        <!-- END BASIC INPUTS -->
                            <?php } ?>
