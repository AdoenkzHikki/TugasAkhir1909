<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Sys Admin - Login</title>            
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="../booya/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../booya/favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="../booya/css/styles.css">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>        
        
        <!-- APP WRAPPER -->
        <div class="app">

            <!-- START APP CONTAINER -->
            <div class="app-container">
                
                <div class="app-login-box">                                        
                    <div class="app-login-box-user"><img src="../booya/img/user/no-image.png" alt="John Doe"></div>
                    <div class="app-login-box-title">
                        <div class="title">Sys Admin - Login </div>
                        <div class="subtitle">Masukan ID. User dan Password</div>                        
                    </div>
                    <div class="app-login-box-container">
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id_user" placeholder="ID. User">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                            </div>
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <input type="submit" name="login" class="btn btn-success btn-block" value="Log in" />
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="app-login-box-container">
                        <span>Validasi : 
                            <?php
                                include '../pdo/koneksi.php';

                                if(isset($_POST['login'])){
                                    $id_user = $_POST['id_user'];
                                    $pass = md5($_POST['pass']);
                                    
                                    if($id_user =="" || $pass == ""){
                                        echo 'ID. User atau Password Tidak Boleh Kosong !';
                                    }else{
                                        try{
                                            $sql = "select * from tbuser where id_user = :id_user and pass = :pass";
                                            $stmt = $db->prepare($sql);
                                            $stmt->bindParam(':id_user', $id_user);
                                            $stmt->bindParam(':pass', $pass);
                                            $stmt->execute();
    
                                            $count = $stmt->rowCount();
    
                                            if($count==1){
                                                session_start();
                                                $data = $stmt->fetch(PDO::FETCH_OBJ);
                                                $_SESSION['userid'] = $data->id_user;
                                                $_SESSION['username'] = $data->nama_user;
                                                $_SESSION['level'] =$data->lev_user;
    
                                                header("location: index.php");
                                                return;
                                            }else{
                                                echo "ID.User dan Password Salah !";
                                            }
                                        }catch(PDOException $e){
                                            echo $e->getMMessage();
                                        }
                                    }
                                    
                                }
                            ?>
                        </span>
                    </div>
                    <div class="app-login-box-footer">
                        &copy; Sys Admin - Login website company profile.
                    </div>
                </div>
                                
            </div>
            <!-- END APP CONTAINER -->
           
        </div>        
        <!-- END APP WRAPPER -->                
        
        <!-- START SCRIPTS -->
        <script type="text/javascript" src="../booya/js/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/moment/moment.min.js"></script>       
        
        <script type="text/javascript" src="../booya/js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/bootstrap-select/bootstrap-select.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/form-validator/jquery.form-validator.min.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/noty/jquery.noty.packaged.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/datatables/dataTables.bootstrap.min.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/knob/jquery.knob.min.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/morris/raphael.min.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/morris/morris.min.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="../booya/js/vendor/rickshaw/rickshaw.min.js"></script>
        
        <script type="text/javascript" src="../booya/js/vendor/isotope/isotope.pkgd.min.js"></script>
        
        <script type="text/javascript" src="../booya/js/app.js"></script>
        <script type="text/javascript" src="../booya/js/app_plugins.js"></script>
        <script type="text/javascript" src="../booya/js/app_demo.js"></script>
        <!-- END SCRIPTS -->
    </body>
</html>