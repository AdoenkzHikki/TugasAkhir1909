<?php if($_GET['page']=="datavitamin"){?>
    <div class="container"> 
                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Daftar Data Vitamin</h5>
                                        <p>
                                            <button onclick="window.location.href='vitamin/tambah/'" type = "button" class="btn btn-sm btn-clean btn-success"><span class="fa fa-plus"></span> Tambah</button>
                                            <button onclick="window.location.href='vitamin/edit/'" type = "button" class="btn btn-sm btn-clean btn-info"><span class="fa fa-edit"></span> Ubah Stok Vitamin</button>
                                            
                                        </p>
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
                                            <th>[Aksi]</th>
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
                                            <td>
                                                <!-- <a href="vitamin/tambah-stok/<?= $data->id_vitamin ?>" style="margin-right:10px"><span class="fa fa-plus"></span> Tambah Stok </a> -->
                                                <a href="index.php?page=datavitamin&delete=<?= $data->id_vitamin ?>"><span class="fa fa-trash-o"></span> Hapus </a>
                                                
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <?php
                                            if(isset($_GET['delete'])){
                                                $id_vitamin = $_GET['delete'];
                                                $hapus = $getvitamin->delete($id_vitamin);
                                                echo"<script>alert('Data Berhasil Dihapus')</script>";
                                                echo "<script>window.location.replace('vitamin')</script>";
                                            }
                                        
                                        ?>
                                                                                
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>
<!-- <?php } 
else if($_GET['page']=="tambah-stok"){ ?>

<div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="index.php?page=datavitamin">Data Vitamin</a></li>
                            <li class="active">Tambah Data Vitamin</li>
                        </ul>
                    </div>
                    <!- END PAGE HEADING -->
                   
                    <!-- START PAGE CONTAINER -->                    
                    <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Tambah Stok Data Vitamin</h2>
                                    <p>Isi Stok Vitamin</p>
                                </div>                                
                            </div>
                                 
                        <form class="form-horizontal" method="post" name="frinput">
                                
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Vitamin</label>
                                        <div class="col-md-3">
                                            <?php
                                                $id=$_GET['id_vitamin'];
                                                include '../pdo/getvitamin.php';
                                                $getvitamin = new getvitamin();
                                                $data=$getvitamin->read_id($id)->fetch(PDO::FETCH_OBJ);
                                            ?>
                                            <input type="text" name="jns_vitamin" class="form-control" value="<?= $data->jns_vitamin ?>" readonly>
                                        </div>
                                </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="jml_stok">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="submit" name="btntambah" class="btn btn-success btn-rounded" value="Tambah"/>
                                            <input type="submit" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                        </div>
                                    </div>
                            </form>
                            <?php 
                                
                                if(isset($_POST['btntambah'])){
                                    
                                    $id_vitamin = $_GET['id_vitamin'];
                                    $jml_stok = $_POST['jml_stok'];
                                    $ubah = $getvitamin->update_masuk($id_vitamin,$jml_stok);

                                    echo"<script>alert('Data Berhasil Diubah')</script>";

                                    echo "<script>window.location.replace('vitamin')</script>";

                                }else if(isset($_POST['btnbatal'])){
                                    echo "<script>window.location.replace('vitamin')</script>";
                                }

                            ?>
                            
                            
                    </div> -->


<?php }
else if($_GET['page']=="edit-datavitamin"){ ?>

            
    <!-- START PAGE HEADING -->
    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="index.php?page=datavitamin">Data Vitamin</a></li>
                            <li class="active">Ubah stok Data Vitamin</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                   
                    <!-- START PAGE CONTAINER -->                    
                    <div class="container">
                        
                        <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Data Stok Vitamin</h2>
                                    <p>Silahkan isi Data Vitamin</p>
                                </div>                                
                            </div>
                            <!-- <script type="text/javascript" src="libs/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#kode_brg').change(function(){
                                        $.getJSON('index.php',{page:'edit-datavitamin', id_vitamin:$(this).val()}, function(json){
                                            if (json == null) {
                                                $('#stok_saat_ini').text('');
                                                // $('#nm_barang').val('');
                                                // $('#harga').val('');
                                            } else {
                                                $('#stok_saat_ini').text(json.jml_stok);
                                                // $('#nm_barang').val(json.nm_barang);
                                                // $('#harga').val(json.harga);
                                            }
                                        });
                                    });
                                });
                            </script> -->
                                <?php
                                    $con = mysqli_connect("localhost", "root","", "db_posyandu");
                                ?>
                        <form class="form-horizontal" method="post" name="frinput">
                                
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Vitamin</label>
                                        <div class="col-md-3">
                                            <select name="jns_vitamin" class="form-control" id="id_vitamin" onchange="changeValue(this.value)">
                                                <option value="">Pilih Jenis Vitamin</option>
                                                <?php 
                                                    $query=mysqli_query($con, "select * from tb_vitamin order by id_vitamin asc"); 
                                                    $result = mysqli_query($con, "select * from tb_vitamin");  
                                                    $jsArray = "var prdName = new Array();\n";
                                                    while ($row = mysqli_fetch_array($result)) {  
                                                    echo '<option name="id_vitamin"  value="' . $row['id_vitamin'] . '">' . $row['jns_vitamin'] . '</option>';  
                                                    $jsArray .= "prdName['" . $row['id_vitamin'] . "'] = {jml_stok:'" . addslashes($row['jml_stok']) . "'};\n";
                                                    }
                                                ?>
                                                </select>
                                        </div>
                                 </div>
                                    
                                    <div class="form-group">
                                            <label class="col-md-2 control-label">Stok Saat ini</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="stok_saat_ini" id="stok_saat_ini">
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah Stok Masuk</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="jml_stok_masuk">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah Stok Keluar</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="jml_stok_keluar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="submit" name="btnubah" class="btn btn-success btn-rounded" value="Simpan"/>
                                            <input type="submit" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                        </div>
                                    </div>
                            </form>
                            <script type="text/javascript"> 
                                <?php echo $jsArray; ?>
                                function changeValue(id){
                                    document.getElementById('stok_saat_ini').value = prdName[id].jml_stok;
                                    
                                };
                            </script>
                            <?php 
                                
                                if(isset($_POST['btnubah'])){
                                    
                                    $jns_vitamin = $_POST['jns_vitamin'];
                                    $jml_stok_masuk = $_POST['jml_stok_masuk'];
                                    $jml_stok_keluar = $_POST['jml_stok_keluar'];
                                    $ubah1 = $getvitamin->update_masuk($jns_vitamin,$jml_stok_masuk);
                                    $ubah = $getvitamin->update_keluar($jns_vitamin,$jml_stok_ke);

                                    echo"<script>alert('Data Berhasil Diubah')</script>";

                                    echo "<script>window.location.replace('vitamin')</script>";

                                }else if(isset($_POST['btnbatal'])){
                                    echo "<script>window.location.replace('vitamin')</script>";
                                }

                            ?>
                            
                            
                    </div>

<?php }elseif ($_GET['page'] == "tambah-datavitamin"){?>

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
                                    <h2>Data Vitamin Masuk</h2>
                                    <p>Masukan Data Vitamin</p>
                                </div>                                
                            </div>
                                 
                        <form class="form-horizontal" method="post" name="frinput">
                                
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Vitamin</label>
                                        <div class="col-md-3">
                                            <input type="text" name="jns_vitamin" class="form-control" placeholder="Jenis Vitamin">
                                        </div>
                                </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="jml_stok" placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Keterangan</label>
                                        <div class="col-md-3">
                                            <select name="ket" class="form-control">
                                                <option value="Untuk Anak">Untuk Anak</option>
                                                <option value="Untuk Balita">Untuk Balita</option>      
                                            </select>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="submit" name="btntambah" class="btn btn-success btn-rounded" value="Tambah"/>
                                            <input type="submit" name="btnbatal" class="btn btn-danger btn-rounded" value="Batal"/>
                                        </div>
                                    </div>
                            </form>
                            <?php 
                                require '../pdo/getvitamin.php';
                                if(isset($_POST['btntambah'])){
                                    $getvitamin = new getvitamin();
                                    $jns_vitamin = $_POST['jns_vitamin'];
                                    $id_user = $_SESSION['userid'];
                                    $jml_stok = $_POST['jml_stok'];
                                    $keterangan = $_POST['ket'];
                                    $tambah = $getvitamin->create($id_vitamin,$id_user,$jns_vitamin,$jml_stok,$keterangan);

                                    echo"<script>alert('Data Berhasil Ditambah')</script>";

                                    echo "<script>window.location.replace('vitamin')</script>";

                                }else if(isset($_POST['btnbatal'])){
                                    echo "<script>window.location.replace('vitamin')</script>";
                                }

                            ?>
                            
                            
                    </div>
<?php }?>