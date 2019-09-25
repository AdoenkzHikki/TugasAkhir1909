<?php 
    session_start();
    if(empty($_SESSION['userid'])){
        header("location: login.php");
    }else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>.: Sys Admin</title>

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

        <script type="text/javascript" src="../assets/tinymce/tinymce.min.js"></script>

        <script>
            tinyMCE.init({
                selector: "#richtext",
                height: 500,
                setup: function (editor) {
                    editor.on('change', function () {
                        tinymce.triggerSave();
                    });
                },
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste imagetools responsivefilemanager tiny_mce_wiris"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager tiny_mce_wiris_formulaEditor",

                external_filemanager_path:"../assets/filemanager/",
                filemanager_title:"File Manager" ,
                external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
            });
        </script>
    </head>
    <body>

        <!-- APP WRAPPER -->
        <div class="app">

            <!-- START APP CONTAINER -->
            <div class="app-container">
                <!-- START SIDEBAR -->
                <?php include 'left-menu.php'?>
                <!-- END SIDEBAR -->

                <!-- START APP CONTENT -->
                <div class="app-content app-sidebar-left">
                    <!-- START APP HEADER -->
                    <?php include 'header.php'?>
                    <!-- END APP HEADER  -->

                    <!-- START PAGE HEADING -->
                    <div class="app-heading app-heading-bordered app-heading-page">
                        <div class="icon icon-lg">
                            <span class="icon-laptop-phone"></span>
                        </div>
                        <div class="title">
                            <h1>Admin Panel</h1>
                            <p>The revolution in admin template build</p>
                        </div>
                        <!--<div class="heading-elements">
                            <a href="#" class="btn btn-danger" id="page-like"><span class="app-spinner loading"></span> loading...</a>
                        </div>-->
                    </div>
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Application</a></li>
                            <li class="active">Dashboard</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->

                    <!-- START PAGE CONTAINER -->
                    <?php include 'main-content.php'?>
                    <!-- END PAGE CONTAINER -->

                </div>
                <!-- END APP CONTENT -->

            </div>
            <!-- END APP CONTAINER -->

            <!-- START APP FOOTER -->
            <?php include 'footer.php'?>
            <!-- END APP FOOTER -->

            <!-- START APP SIDEPANEL -->
            <?php include 'sidepanel.php'?>
            <!-- END APP SIDEPANEL -->

            <!-- APP OVERLAY -->
            <div class="app-overlay"></div>
            <!-- END APP OVERLAY -->
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
        <script type="text/javascript" src="../booya/js/app_demo_dashboard.js"></script>
    </body>
</html>
    <?php } ?>