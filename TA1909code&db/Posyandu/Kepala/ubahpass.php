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
                                        <input type="submit" name="btnsimpan" class="btn btn-info btn-rounded" value="Simpan"/>
                                        <input type="reset" name="btnubah" class="btn btn-danger btn-rounded" value="Batal"/>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                require '../pdo/getanak.php';
                                if(isset($_POST['btnsimpan'])){
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
                                    $message = "wrong answer";
                                    

                                    echo "<script>window.location.replace('index.php?page=pendaftar')</script>";
                                    echo "<script type='text/javascript'>alert('$message');</script>";

                                }
                            
                            
                            
                            ?>
                            
                            
                        </div>
                        <!-- END BASIC INPUTS -->