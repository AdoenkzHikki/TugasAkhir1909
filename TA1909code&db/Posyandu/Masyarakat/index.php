<?php 
    session_start();
    if(empty($_SESSION['userid']) || $_SESSION['lev']!="Masyarakat"){
        header('location:../index.php');
    }else{

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="http://localhost/posyandu/masyarakat/">                        
        <title>Sistem Informasi Posyandu Mekar Delima</title>            
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="css/styles.css">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>        
        
        <!-- APP WRAPPER -->
        <div class="app">           

            <!-- START APP CONTAINER -->
            <div class="app-container">
                <!-- START SIDEBAR -->
                <?php include "sidebar.php" ?>
                <!-- END SIDEBAR -->
                
                <!-- START APP CONTENT -->
                <div class="app-content app-sidebar-left">
                    <!-- START APP HEADER -->
                    <?php include "header.php" ?>
                    <!-- END APP HEADER  -->
                    
                    <!-- START PAGE HEADING -->
                    <?php 
                        error_reporting(0);
                        if($_GET['page']==""){
                            include 'setaktifdashboard.php';
                        }
                        else if($_GET['page']=="pendaftar"){
                            include 'setaktifpendaftar.php';
                        }
                        else if($_GET['page']=="grafik"){
                            include 'setaktifgrafik.php';
                        }
                        else if($_GET['page']=="dataanak"){
                            include 'setaktifdataanak.php';
                        }else if($_GET['page']=="detailinfo"){
                            include 'setaktifdetailinfo.php';
                        }else if($_GET['page']=="datauser"){
                            include 'setaktifdatauser.php';
                        }else if($_GET['page']=="dataimunisasi"){
                            include 'setaktifdataimunisasi.php';
                        }else if($_GET['page']=="datavitamin"){
                            include 'setaktifdatavitamin.php';
                        }else if($_GET['page']=="datauser"){
                            include 'setaktiftambahuser.php';
                        }else if($_GET['page']=="datauser"){
                            include 'setaktifubahuser.php';
                        }
                        
                    
                    ?>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <?php
                        error_reporting(0);
                        if($_GET['page']==""){
                            include 'main-content.php';
                        }
                        else if($_GET['page']=="pendaftar") {
                            include 'pendaftar-file.php';
                        }
                        else if($_GET['page']=="tambah"){
                            include 'pendaftar-file.php';
                        }
                        else if($_GET['page']=="edit"){
                            include 'pendaftar-file.php';
                        }
                        else if($_GET['page']=="dataanak") {
                            include 'dataanak.php';
                        }
                        else if($_GET['page']=="detailinfo"){
                            include "dataanak.php";
                        }
                        else if($_GET['page']=="grafik") {
                            include 'grafik.php';
                        }else if($_GET['page']=="detailgrafik"){
                            include 'grafik.php';
                        }else if($_GET['page']=="tambah-anak"){
                            include 'dataanak.php';
                        }else if($_GET['page']=="ubahpass"){
                            include 'main-content.php';
                        }else if($_GET['page']=="editdetail"){
                            include 'dataanak.php';
                        }else if($_GET['page']=="dataimunisasi"){
                            include 'dataimunisasi.php';
                        }else if($_GET['page']=="datavitamin"){
                            include 'datavitamin.php';
                        }else if($_GET['page']=="datauser"){
                            include 'datauser.php';
                        }else if($_GET['page']=="add-datauser"){
                            include 'datauser.php';
                        }else if($_GET['page']=="edit-datauser"){
                            include 'datauser.php';
                        }
                        
                        
                                                   
                    ?>
                    <!-- END PAGE CONTAINER -->
                    
                </div>
                <!-- END APP CONTENT -->
                                
            </div>
            <!-- END APP CONTAINER -->
                        
            <!-- START APP FOOTER -->
            <?php include "footer.php" ?>
            <!-- END APP FOOTER -->

            <!-- APP OVERLAY -->
            <div class="app-overlay"></div>
            <!-- END APP OVERLAY -->
        </div>        
        <!-- END APP WRAPPER -->                
        
        <!-- START SCRIPTS -->
        <script type="text/javascript" src="js/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/vendor/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/vendor/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/vendor/moment/moment.min.js"></script>       
        
        <script type="text/javascript" src="js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/vendor/bootstrap-select/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
        
        <script type="text/javascript" src="js/vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="js/vendor/form-validator/jquery.form-validator.min.js"></script>
        
        <script type="text/javascript" src="js/vendor/noty/jquery.noty.packaged.js"></script>
        
        <script type="text/javascript" src="js/vendor/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/vendor/datatables/dataTables.bootstrap.min.js"></script>
        
        <script type="text/javascript" src="js/vendor/sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/vendor/knob/jquery.knob.min.js"></script>
        
        <script type="text/javascript" src="js/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script type="text/javascript" src="js/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script type="text/javascript" src="js/vendor/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        
        <script type="text/javascript" src="js/vendor/sparkline/jquery.sparkline.min.js"></script>
        
        <script type="text/javascript" src="js/vendor/morris/raphael.min.js"></script>
        <script type="text/javascript" src="js/vendor/morris/morris.min.js"></script>
        
        <script type="text/javascript" src="js/vendor/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/vendor/rickshaw/rickshaw.min.js"></script>
        
        <script type="text/javascript" src="js/vendor/isotope/isotope.pkgd.min.js"></script>
        
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/app_plugins.js"></script>
        <script type="text/javascript" src="js/app_demo.js"></script>
        <!-- END SCRIPTS -->
        <script type="text/javascript" src="js/app_demo_dashboard.js"></script>
    </body>
</html>
                    <?php } ?>